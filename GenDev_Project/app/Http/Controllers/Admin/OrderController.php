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


        // Không thể thay đổi nếu đã hoàn tất hoặc đã hủy
        if (in_array($current, ['completed', 'cancelled'])) {
            return back()->with('error', 'Đơn hàng đã hoàn tất hoặc đã hủy, không thể cập nhật.');
        }

        // Trạng thái được phép cập nhật tiếp theo
        $allowedTransitions = [
            'pending' => ['processing', 'cancelled'],
            'processing' => ['shipped', 'cancelled'],
            'shipped' => ['completed', 'cancelled'],
        ];

        if (!in_array($new, $allowedTransitions[$current] ?? [])) {
            return back()->with('error', 'Chỉ được chuyển sang trạng thái kế tiếp hoặc hủy.');
        }

        // Nếu chuyển sang 'processing': kiểm tra thanh toán nếu banking/momo, đồng thời trừ kho
        if ($new === 'processing') {
            if (in_array($order->payment, ['banking', 'momo']) && $order->payment_status !== 'paid') {
                return back()->with('error', 'Vui lòng thanh toán trước khi xử lý đơn hàng.');
            }

            foreach ($order->orderDetails as $detail) {
                $variant = $detail->variant;
                if ($variant && $variant->quantity >= $detail->quantity) {
                    $variant->quantity -= $detail->quantity;
                    $variant->save();
                } else {
                    return back()->with('error', 'Không đủ hàng trong kho để xử lý đơn hàng.');
                }
            }
        }

        // Nếu chuyển sang cancelled: cộng lại hàng
        if ($new === 'cancelled') {
            foreach ($order->orderDetails as $detail) {
                $variant = $detail->variant;
                if ($variant) {
                    $variant->quantity += $detail->quantity;
                    $variant->save();
                }
            }
        }

        // Nếu chuyển sang completed: bắt buộc phải đã thanh toán
        if ($new === 'completed') {
            if ($order->payment_status !== 'paid') {
                return back()->with('error', 'Đơn hàng phải được thanh toán trước khi hoàn tất.');
            }
        }

        $order->status = $new;
        $order->save();


        return back()->with('success', 'Cập nhật đơn hàng thành công.');
    }

    // Xem chi tiết đơn hàng
    public function show($id)
    {
        $order = Order::with(['user', 'coupon', 'ship', 'orderDetails.product', 'orderDetails.variant', 'orderDetails.attributes'])->findOrFail($id);
        return view('Admin.orders.show', compact('order'));
    }
}
