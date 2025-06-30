<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|staff']);
    }

    // Hiển thị danh sách đơn hàng
    public function index(Request $request)
    {
        $orders = Order::with('user')
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('Admin.orders.index', compact('orders'));
    }

    public function updateBoth(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,completed,cancelled',
            'payment_status' => 'required|in:unpaid,paid,cancelled',
        ]);

        $newStatus = $request->status;
        $newPayment = $request->payment_status;

        // Không được thay đổi nếu đơn đã hoàn thành
        if ($order->status === 'completed') {
            return back()->with('error', 'Đơn hàng đã hoàn tất, không thể chỉnh sửa.');
        }

        // Nếu trạng thái thanh toán là cancelled thì đơn hàng cũng phải cancelled
        if ($newPayment === 'cancelled' && $newStatus !== 'cancelled') {
            return back()->with('error', 'Trạng thái đơn hàng phải là "Đã hủy" khi thanh toán bị hủy.');
        }

        // Nếu đơn hàng là cancelled thì trạng thái thanh toán phải là cancelled
        if ($newStatus === 'cancelled' && $newPayment !== 'cancelled') {
            return back()->with('error', 'Trạng thái thanh toán phải là "Đã hủy" khi đơn hàng bị hủy.');
        }

        // Không thể hoàn tất nếu chưa thanh toán
        if ($newStatus === 'completed' && $newPayment !== 'paid') {
            return back()->with('error', 'Không thể hoàn tất đơn hàng nếu chưa thanh toán.');
        }

        // Không thể quay lại trạng thái trước đó
        $steps = ['pending' => 1, 'processing' => 2, 'shipped' => 3, 'completed' => 4];
        if (
            isset($steps[$newStatus], $steps[$order->status]) &&
            $steps[$newStatus] < $steps[$order->status]
        ) {
            return back()->with('error', 'Không thể quay lại trạng thái trước đó.');
        }

        // Nếu hợp lệ thì cập nhật
        $order->update([
            'status' => $newStatus,
            'payment_status' => $newPayment,
        ]);

        return back()->with('success', 'Cập nhật đơn hàng thành công.');
    }

    // Xem chi tiết đơn hàng
    public function show($id)
    {
        $order = Order::with(['user', 'coupon', 'ship', 'orderDetails.product', 'orderDetails.variant', 'orderDetails.attributes'])->findOrFail($id);
        return view('Admin.orders.show', compact('order'));
    }
}
