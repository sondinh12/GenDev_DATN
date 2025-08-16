<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderStatusLog;

class OrderController extends Controller
{
    // Bỏ middleware role cứng

    public function index(Request $request)
    {
        $orders = Order::when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%');
        })
            ->when($request->from, fn($q) => $q->whereDate('created_at', '>=', $request->from))
            ->when($request->to, fn($q) => $q->whereDate('created_at', '<=', $request->to))
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('Admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipping,shipped,cancelled',
        ]);

        $current = $order->status;
        $new = $request->status;

        if ($new === 'completed' || $new === 'returned') {
            return back()->with('error', 'Không thể chuyển đơn sang trạng thái hoàn tất hoặc hoàn hàng từ giao diện admin.');
        }

        if ($current === 'cancelled' || $current === 'returned') {
            return back()->with('error', 'Đơn hàng đã bị hủy hoặc hoàn hàng, không thể cập nhật.');
        }

        $allowedTransitions = [
            'pending' => ['processing', 'cancelled'],
            'processing' => ['shipping', 'cancelled'],
            'shipping' => ['shipped', 'cancelled'],
            'shipped' => ['cancelled'],
        ];

        if (!in_array($new, $allowedTransitions[$current] ?? [])) {
            return back()->with('error', 'Chỉ được chuyển sang trạng thái kế tiếp hoặc hủy.');
        }

        if ($new === 'processing') {
            if (in_array($order->payment, ['banking', 'momo']) && $order->payment_status !== 'paid') {
                return back()->with('error', 'Đơn thanh toán online chưa được thanh toán.');
            }
        }

        if ($new === 'shipped' && $order->payment === 'cod') {
            $order->payment_status = 'paid';
        }

        if ($new === 'cancelled') {
            foreach ($order->orderDetails as $detail) {
                if ($detail->variant) {
                    $detail->variant->increment('quantity', $detail->quantity);
                } else {
                    $detail->product->increment('quantity', $detail->quantity);
                }
            }
        }

        OrderStatusLog::create([
            'order_id'   => $order->id,
            'type' => 'order',
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

    public function updatePaymentStatus(Request $request, Order $order)
    {
        // Chỉ cho phép chọn đúng 2 trạng thái này ở form, nhưng vẫn validate chặt chẽ
        $request->validate([
            'payment_status'       => 'required|in:refund,refunded',
            'payment_note'         => 'nullable|string|max:500',
            'refund_bank_account'  => 'nullable|string|max:255',
        ]);

        $old = $order->payment_status;
        $new = $request->payment_status;

        // 1) Nếu trạng thái không thay đổi
        if ($old === $new) {
            return back()->with('notification', 'Trạng thái thanh toán không thay đổi.');
        }

        // 2) Nếu đơn đã "ĐÃ HOÀN TIỀN" thì khóa không cho đổi gì nữa
        if ($old === 'refunded') {
            return back()->with('error', 'Đơn hàng đã ở trạng thái "Đã hoàn tiền" và không thể thay đổi.');
        }

        // 3) Ràng buộc DUY NHẤT: chỉ cho phép từ refund -> refunded
        if (!($old === 'refund' && $new === 'refunded')) {
            return back()->with('error', 'Chỉ được phép chuyển từ "Đang hoàn tiền" sang "Đã hoàn tiền".');
        }

        // 5) Cập nhật & log
        $order->payment_status = 'refunded';
        $order->save();

        $order->orderStatusLogs()->create([
            'changed_by'           => Auth::id(),
            'type'                 => 'payment',
            'old_status'           => $old,
            'new_status'           => 'refunded',
            'note'                 => $request->payment_note,
            'refund_bank_account'  => $request->refund_bank_account,
            'changed_at'           => now(),
        ]);

        return back()->with('success', 'Cập nhật trạng thái thanh toán sang "Đã hoàn tiền" thành công.');
    }

    public function show($id)
    {
        $order = Order::with([
            'user',
            'coupon',
            'ship',
            'orderDetails.product',
            'orderDetails.variant.variantAttributes.attribute',
            'orderDetails.variant.variantAttributes.value',
            'orderStatusLogs.changedBy'
        ])->findOrFail($id);

        return view('Admin.orders.show', compact('order'));
    }
}
