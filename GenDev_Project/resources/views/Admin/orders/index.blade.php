@extends('Admin.layouts.master-without-page-title')

@section('title', 'Quản lý Đơn hàng')

@section('content')
<div class="container-fluid py-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @elseif(session('notification'))
        <div class="alert alert-warning">{{ session('notification') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <h5 class="mb-0">Danh sách đơn hàng</h5>
            <form method="GET" class="d-flex flex-wrap gap-2">
                <input type="text" name="search" class="form-control" placeholder="Tên hoặc SĐT..." value="{{ request('search') }}">
                <input type="date" name="from" class="form-control" value="{{ request('from') }}">
                <input type="date" name="to" class="form-control" value="{{ request('to') }}">
                <button class="btn btn-primary"><i class="fas fa-search"></i> Lọc</button>
            </form>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Khách hàng</th>
                        <th>SĐT</th>
                        <th>Địa chỉ</th>
                        <th>Tổng tiền</th>
                        <th>Thanh toán</th>
                        <th>Trạng thái TT</th>
                        <th>Trạng thái đơn</th>
                        <th>Ngày đặt</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ number_format($order->total, 0, ',', '.') }} đ</td>
                        <td>{{ strtoupper($order->payment) }}</td>
                        <td>
                            @php
                                $paymentClass = match ($order->payment_status) {
                                    'paid' => 'success',
                                    'unpaid' => 'warning',
                                    'cancelled' => 'danger',
                                    default => 'secondary'
                                };
                                $paymentLabel = match ($order->payment_status) {
                                    'paid' => 'Đã thanh toán',
                                    'unpaid' => 'Chưa thanh toán',
                                    'cancelled' => 'Đã huỷ',
                                    default => 'Không rõ'
                                };
                            @endphp
                            <span class="badge bg-{{ $paymentClass }}">{{ $paymentLabel }}</span>
                        </td>
                        <td>
                            @php
                                $statusClass = [
                                    'pending' => 'secondary',
                                    'processing' => 'info',
                                    'shipping' => 'warning',
                                    'shipped' => 'primary',
                                    'completed' => 'success',
                                    'cancelled' => 'danger',
                                    'returned' => 'dark'
                                ];
                                $statusLabel = [
                                    'pending' => 'Chờ xác nhận',
                                    'processing' => 'Đang xử lý',
                                    'shipping' => 'Đang giao',
                                    'shipped' => 'Đã giao',
                                    'completed' => 'Hoàn thành',
                                    'cancelled' => 'Đã huỷ',
                                    'returned' => 'Hoàn hàng'
                                ];
                            @endphp
                            <span class="badge bg-{{ $statusClass[$order->status] ?? 'secondary' }}">
                                {{ $statusLabel[$order->status] ?? ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> Xem
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-muted">Không có đơn hàng nào.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-content-center">
            {{ $orders->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection
