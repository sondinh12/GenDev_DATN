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
        // $order->payment_status = 'cancelled';
        $order->save();

        // 7. Ghi log trạng thái
        OrderStatusLog::create([
            'order_id' => $order->id,
            'changed_by' => Auth::id(),
            'old_status' => $oldStatus,
            'new_status' => 'cancelled',
            'note' => $validated['reason'],
            'refund_bank_account' => $validated['bank_account'],
            'changed_at' => now(),
        ]);

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
            'old_status' => $oldStatus,
            'new_status' => 'completed',
            'note' => 'Người dùng xác nhận đã nhận hàng',
            'changed_at' => now(),
        ]);

        return back()->with('success', 'Đã xác nhận hoàn thành đơn hàng.');
    }
    public function return(Request $request, Order $order)
    {
        // 1. Kiểm tra đơn hàng thuộc về người dùng đang đăng nhập
        if ($order->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Bạn không có quyền truy cập đơn hàng này.');
        }

        // 2. Validate input
        $validated = $request->validate([
            'reason' => 'required|string|max:1000',
            'bank_account' => 'nullable|string|max:255',
        ]);

        // 3. Ghi log trạng thái đơn hàng
        OrderStatusLog::create([
            'order_id' => $order->id,
            'changed_by' => Auth::id(),
            'old_status' => $order->status,
            'new_status' => 'return_requested', // trạng thái mới tùy bạn định nghĩa trong hệ thống
            'note' => $validated['reason'],
            'refund_bank_account' => $validated['bank_account'] ?? null,
            'changed_at' => now(),
        ]);

        // 4. Cập nhật trạng thái đơn hàng (tuỳ logic, có thể để admin duyệt sau)
        $order->update([
            'status' => 'return_requested',
        ]);

        return redirect()->route('client.orders.index')->with('success', 'Đã gửi yêu cầu hoàn hàng thành công.');
    }
}
