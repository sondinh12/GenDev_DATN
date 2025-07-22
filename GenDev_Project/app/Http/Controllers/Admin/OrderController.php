<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderStatusLog;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|staff']);
    }

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
