<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Order;
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

    public function cancel(Order $order)
    {
        // Kiểm tra quyền
        if (Auth::id()  !== $order->user_id) {
            abort(403, 'Bạn không có quyền thao tác đơn hàng này.');
        }

        // Chỉ cho phép hủy nếu trạng thái là 'pending'
        if ($order->status !== 'pending') {
            return back()->with('error', 'Chỉ có thể hủy đơn hàng khi đang chờ xử lý.');
        }

        // Nếu đã thanh toán thì không cho phép hủy
        if ($order->payment_status === 'paid') {
            return back()->with('error', 'Đơn hàng đã thanh toán, vui lòng liên hệ bộ phận hỗ trợ để hủy.');
        }

        // // Trả lại hàng về kho
        // foreach ($order->orderDetails as $detail) {
        //     if ($detail->variant) {
        //         $detail->variant->increment('quantity', $detail->quantity);
        //     } elseif ($detail->product) {
        //         $detail->product->increment('quantity', $detail->quantity);
        //     }
        // }

        // Cập nhật trạng thái đơn hàng
        $order->status = 'cancelled';
        $order->payment_status = 'cancelled';
        $order->save();

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
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Bạn không có quyền.');
        }

        if ($order->status !== 'shipped') {
            return back()->with('error', 'Chỉ có thể hoàn thành đơn đã giao.');
        }

        $order->status = 'completed';
        $order->save();

        return back()->with('success', 'Đã xác nhận hoàn thành đơn hàng.');
    }
}
