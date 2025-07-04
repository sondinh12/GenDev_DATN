<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ClientOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderDetails')
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
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
}
