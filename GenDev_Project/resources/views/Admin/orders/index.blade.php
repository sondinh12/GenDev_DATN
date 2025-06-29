@extends('Admin.layouts.master-without-page-title')

@section('title', 'Quản lý Đơn hàng')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">🧾 Danh sách đơn hàng</h4>
    </div>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Khách hàng</th>
                            <th>Email</th>
                            <th>Điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Mã giảm giá</th>
                            <th>Phí ship</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name ?? $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->coupon->coupon_code ?? '-' }}</td>
                            <td>{{ number_format($order->shipping_fee, 0, ',', '.') }} đ</td>
                            <td>{{ number_format($order->total, 0, ',', '.') }} đ</td>
                            <td>
                                <span class="badge bg-info">{{ $order->status_text }}</span>
                            </td>
                            <td>{{ $order->created_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Xem chi tiết
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="11" class="text-center py-4 text-muted">
                                <i class="fas fa-file-invoice fa-2x mb-2"></i>
                                <p>Không có đơn hàng nào.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-3 d-flex justify-content-center">
        {{ $orders->links() }}
    </div>
</div>
@endsection