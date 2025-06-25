@extends('Admin.layouts.master-without-page-title')

@section('title', 'Quản lý Đơn hàng')

@section('content')
<div class="container-fluid py-4">
     <!-- Flash Message -->
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @elseif(session('notification'))
            <div class="alert alert-warning">{{ session('notification') }}</div>
            @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Danh sách đơn hàng</h5>
            <form method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Tìm theo tên...">
                <button class="btn btn-primary">Tìm</button>
            </form>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên khách</th>
                        <th>Tổng tiền</th>
                        <th>Phương thức thanh toán</th>
                        <th>Trạng thái thanh toán</th>
                        <th>Trạng thái đơn hàng</th>
                        <th>Thời gian</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ number_format($order->total, 0, ',', '.') }} đ</td>
                        <td>{{ strtoupper($order->payment) }}</td>
<td>
                            @php
                                $paymentClass = match($order->payment_status) {
                                    'paid' => 'success',
                                    'unpaid' => 'warning',
                                    'cancelled' => 'danger',
                                    default => 'secondary'
                                };
                            @endphp
                            <span class="badge bg-{{ $paymentClass }}">{{ ucfirst($order->payment_status) }}</span>
                        </td>
                        <td>
                           @php
    $statusClass = match($order->status) {
        'pending' => 'secondary',
        'processing' => 'info',
        'completed' => 'success',
        'cancelled' => 'danger',
        default => 'dark'
    };
@endphp


    <span class="badge bg-{{ $statusClass }}">
        {{ ucfirst($order->status) }}
    </span>

                            </span>
                        </td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <!-- Nút cập nhật trạng thái -->
                           @if($order->status !== 'completed' && $order->status !== 'cancelled')
    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editStatusModal-{{ $order->id }}">
        <i class="fas fa-edit"></i> Sửa
    </button>
@endif


                        </td>
                    </tr>
<!-- Modal Cập Nhật Trạng Thái và Thanh Toán -->
<div class="modal fade" id="editStatusModal-{{ $order->id }}" tabindex="-1" aria-labelledby="editStatusModalLabel-{{ $order->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Một form xử lý cả hai trạng thái -->
            <form action="{{ route('admin.orders.update-both', $order->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="editStatusModalLabel-{{ $order->id }}">Cập nhật đơn hàng #{{ $order->id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>

                <div class="modal-body">
                    <!-- Trạng thái đơn hàng -->
                    <div class="form-group mb-3">
                        <label for="status-{{ $order->id }}">Trạng thái đơn hàng</label>
                        <select name="status" id="status-{{ $order->id }}" class="form-control">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Đang giao</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn tất</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                        </select>
                    </div>

                    <!-- Trạng thái thanh toán -->
                    <div class="form-group">
                        <label for="payment_status-{{ $order->id }}">Trạng thái thanh toán</label>
                        <select name="payment_status" id="payment_status-{{ $order->id }}" class="form-control">
                            <option value="unpaid" {{ $order->payment_status == 'unpaid' ? 'selected' : '' }}>Chưa thanh toán</option>
                            <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Đã thanh toán</option>
                            <option value="cancelled" {{ $order->payment_status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </form>

        </div>
    </div>
</div>




                    @empty
                    <tr><td colspan="6" class="text-muted">Không có đơn hàng nào.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-center">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection
