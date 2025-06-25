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
    public function index()
    {
        $orders = Order::with(['user', 'product', 'variant', 'orderDetail', 'coupon'])->orderBy('id', 'desc')->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    // Xem chi tiết đơn hàng
    public function show($id)
    {
        $order = Order::with(['user', 'product', 'variant', 'orderDetail.attributes', 'coupon'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }
}
