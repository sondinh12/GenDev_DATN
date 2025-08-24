<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderStatusLog;
use Illuminate\Support\Facades\Auth;

class ClientOrderController extends Controller
{
    // Client\OrderController
    public function index(Request $request)
    {
        $status = $request->get('status');

        $orders = Order::where('user_id', Auth::id())
            ->when($status && $status !== 'all', function ($query) use ($status) {
                if ($status === 'unpaid') {
                    $query->where('payment_status', 'unpaid');
                } else {
                    $query->where('status', $status);
                }
            })
            ->latest()
            ->paginate(10);

        return view('client.orders.index', compact('orders'));
    }


    public function show(Order $order)
    {
        // Đảm bảo người dùng chỉ xem được đơn hàng của chính mình
        if (Auth::id() !== $order->user_id) {
            abort(403, 'Bạn không có quyền truy cập đơn hàng này.');
        }

        $order->load([
            'orderDetails.product',
            'orderDetails.variant.attributes', // nếu có
        ]);

        return view('client.orders.show', compact('order'));
    }

    public function cancel(Request $request, Order $order)
    {
        // 1. Kiểm tra quyền
        if (Auth::id() !== $order->user_id) {
            abort(403, 'Bạn không có quyền thao tác đơn hàng này.');
        }

        // 2. Chỉ cho phép hủy nếu trạng thái là 'pending'
        if ($order->status !== 'pending') {
            return back()->with('error', 'Chỉ có thể hủy đơn hàng khi đang chờ xử lý.');
        }

        // 3. Nếu đã thanh toán online, yêu cầu nhập lý do và STK để hoàn tiền
        if ($order->payment_status === 'paid' && $order->payment === 'banking') {
            $validated = $request->validate([
                'reason' => 'required|string|max:1000',
                'bank_account' => 'required|string|max:255',
            ]);
        } else {
            $validated = [
                'reason' => 'Người dùng hủy đơn hàng',
                'bank_account' => null,
            ];
        }

        // 4. Cập nhật tồn kho
        foreach ($order->orderDetails as $detail) {
            if ($detail->variant) {
                $detail->variant->increment('quantity', $detail->quantity);
            } else {
                $detail->product->increment('quantity', $detail->quantity);
            }
        }

        // 5. Lưu trạng thái cũ
        $oldStatus = $order->status;

        // 6. Cập nhật trạng thái đơn hàng
        $order->status = 'cancelled';
        // 7. Trạng thái thanh toán
        $oldPaymentStatus = $order->payment_status;

        if ($order->payment === 'banking' && $oldPaymentStatus === 'paid') {
            // Đã thanh toán online → chuyển sang "đang hoàn tiền"
            $order->payment_status = 'refund';
        } else {
            // COD/chưa thanh toán → đánh dấu "cancelled"
            $order->payment_status = 'cancelled';
        }
        $order->save();
        // 7. Ghi log trạng thái
        $order->orderStatusLogs()->create([
            'changed_by' => Auth::id(),
            'type'       => 'order',
            'old_status' => $oldStatus,
            'new_status' => 'cancelled',
            'note'       => $validated['reason'],
            'changed_at' => now(),
        ]);

        // Nếu chuyển thanh toán sang refund → ghi log thanh toán (type = payment)
        if ($oldPaymentStatus === 'paid' && $order->payment_status === 'refund') {
            $order->orderStatusLogs()->create([
                'changed_by'          => Auth::id(),
                'type'                => 'payment',
                'old_status'          => $oldPaymentStatus,  // paid
                'new_status'          => 'refund',
                'note'                =>  $validated['reason'],
                'refund_bank_account' => $validated['bank_account'],
                'changed_at'          => now(),
            ]);
        }

        return back()->with('success', 'Đơn hàng đã được hủy thành công.');
    }

    public function retry($orderId)
    {
        $order = Order::with('orderDetails.variant')->findOrFail($orderId);

        if ($order->user_id !== Auth::id()) {
            abort(403, 'Bạn không có quyền với đơn hàng này.');
        }

        if (!in_array($order->status, ['cancelled', 'pending']) || $order->payment_status === 'paid') {
            return back()->with('error', 'Không thể mua lại đơn hàng này.');
        }

        foreach ($order->orderDetails as $detail) {
            $variant = $detail->variant;

            if (!$variant) continue;

            $cartItem = Cart::firstOrNew([
                'user_id'    => Auth::id(),
                'variant_id' => $variant->id,
            ]);

            // Cộng dồn số lượng nếu đã có trong giỏ
            $cartItem->quantity = ($cartItem->exists ? $cartItem->quantity : 0) + $detail->quantity;
            $cartItem->save();
        }

        return redirect()->route('client.cart.index')->with('success', 'Sản phẩm đã được thêm lại vào giỏ hàng.');
    }
    public function markAsCompleted(Order $order)
    {
        // 1. Kiểm tra quyền người dùng
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Bạn không có quyền.');
        }

        // 2. Kiểm tra trạng thái đơn hàng
        if ($order->status !== 'shipped') {
            return back()->with('error', 'Chỉ có thể hoàn thành đơn đã giao.');
        }

        // 3. Cập nhật trạng thái đơn hàng
        $oldStatus = $order->status;
        $order->status = 'completed';
        $order->save();

        // 4. Ghi log thay đổi trạng thái
        OrderStatusLog::create([
            'order_id' => $order->id,
            'changed_by' => Auth::id(),
            'type' => 'order',
            'old_status' => $oldStatus,
            'new_status' => 'completed',
            'note' => 'Người dùng xác nhận đã nhận hàng',
            'changed_at' => now(),
        ]);

        return back()->with('success', 'Đã xác nhận hoàn thành đơn hàng.');
    }
    public function return(Request $request, Order $order)
    {
        // 1) Chỉ chủ đơn mới được yêu cầu hoàn
        if ((int)$order->user_id !== (int)Auth::id()) {
            return back()->with('error', 'Bạn không có quyền truy cập đơn hàng này.');
        }

        // 2) Chỉ cho phép khi đang giao
        if ($order->status !== 'shipping') {
            return back()->with('error', 'Chỉ có thể yêu cầu hoàn hàng khi đơn đang giao.');
        }

        // 3) Validate (nếu đã thanh toán online thì bắt buộc STK)
        $rules = [
            'reason'       => 'required|string|max:1000',
            'bank_account' => 'nullable|string|max:255',
        ];
        if ($order->payment === 'banking' && $order->payment_status === 'paid') {
            $rules['bank_account'] = 'required|string|max:255';
        }
        $data = $request->validate($rules);

        // 4) Ghi log trạng thái đơn (type = order)
        $order->orderStatusLogs()->create([
            'changed_by' => Auth::id(),
            'type'       => 'order',
            'old_status' => $order->status,          // shipping
            'new_status' => 'return_requested',
            'note'       => $data['reason'],
            'changed_at' => now(),
        ]);

        // 5) Nếu đã thanh toán online → chuyển payment_status sang refund + ghi log payment
        if ($order->payment === 'banking' && $order->payment_status === 'paid') {
            $order->orderStatusLogs()->create([
                'changed_by'          => Auth::id(),
                'type'                => 'payment',
                'old_status'          => 'paid',
                'new_status'          => 'refund',
                'note'                => $data['reason'],
                'refund_bank_account' => $data['bank_account'] ?? null,
                'changed_at'          => now(),
            ]);

            $order->update(['payment_status' => 'refund']);
        }

        // 6) Cập nhật trạng thái đơn → return_requested
        $order->update(['status' => 'return_requested']);

        return redirect()
            ->route('client.orders.index')
            ->with('success', 'Đã gửi yêu cầu hoàn hàng thành công.');
    }
}
