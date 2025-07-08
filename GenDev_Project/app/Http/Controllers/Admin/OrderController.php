<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use App\Models\OrderStatusLog;
use Illuminate\Support\Facades\Auth;

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

    // public function updatePaymentStatus(Request $request, $id)
    // {
    //     $order = Order::findOrFail($id);

    //     // Không cho cập nhật nếu đã hoàn thành hoặc đã hủy
    //     if (in_array($order->status, ['completed', 'cancelled']) || in_array($order->payment_status, ['paid', 'cancelled'])) {
    //         return redirect()->back()->with('error', 'Không thể cập nhật trạng thái khi đơn hàng đã hoàn tất hoặc đã hủy.');
    //     }

    //     // Xác nhận trạng thái hợp lệ
    //     $validator = Validator::make($request->all(), [
    //         'payment_status' => 'required|in:paid,unpaid,cancelled',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $newStatus = $request->payment_status;

    //     // Nếu cập nhật thành "cancelled" thì đơn hàng cũng bị hủy
    //     if ($newStatus === 'cancelled') {
    //         $order->status = 'cancelled';
    //     }

    //     $order->payment_status = $newStatus;
    //     $order->save();

    //     return redirect()->back()->with('success', 'Cập nhật trạng thái thanh toán thành công.');
    // }
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,cancelled',
        ]);

        $current = $order->status;
        $new = $request->status;

        if ($new === 'completed') {
            return back()->with('error', 'Không thể chuyển đơn sang trạng thái hoàn tất.');
        }

        if ($current === 'cancelled') {
            return back()->with('error', 'Đơn hàng đã bị hủy, không thể cập nhật.');
        }

        $allowedTransitions = [
            'pending' => ['processing', 'cancelled'],
            'processing' => ['shipped', 'cancelled'],
            'shipped' => ['cancelled'],
        ];

        if (!in_array($new, $allowedTransitions[$current] ?? [])) {
            return back()->with('error', 'Chỉ được chuyển sang trạng thái kế tiếp hoặc hủy.');
        }

        // Kiểm tra điều kiện trước khi chuyển trạng thái
        if ($new === 'processing') {
            if (in_array($order->payment, ['banking', 'momo']) && $order->payment_status !== 'paid') {
                return back()->with('error', 'Đơn thanh toán online chưa được thanh toán.');
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

        if ($new === 'shipped' && $order->payment === 'cod') {
            $order->payment_status = 'paid';
        }

        if ($new === 'cancelled') {
            foreach ($order->orderDetails as $detail) {
                $variant = $detail->variant;
                if ($variant) {
                    $variant->quantity += $detail->quantity;
                    $variant->save();
                }
            }
        }

        // Lưu log thay đổi trạng thái
        OrderStatusLog::create([
            'order_id'   => $order->id,
            'changed_by' => Auth::id() ?? 1,
            'old_status' => $current,
            'new_status' => $new,
            'note'       => $request->input('note'),
            'changed_at' => now(),
        ]);

        $order->status = $new;
        $order->save();


        return back()->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
    }

    // Xem chi tiết đơn hàng
    public function show($id)
    {
        $order = Order::with(['user', 'coupon', 'ship', 'orderDetails.product', 'orderDetails.variant', 'orderDetails.attributes'])->findOrFail($id);
        $order = Order::with(['orderStatusLogs.changedBy'])->findOrFail($id);

        return view('Admin.orders.show', compact('order'));
    }
}
