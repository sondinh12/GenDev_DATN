@extends('client.layout.master')

@section('title', 'Đơn hàng của tôi')

@section('content')
<div class="container py-5">
    <h3 class="mb-4"><i class="fa fa-box me-2 text-primary"></i>Đơn hàng của tôi</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($orders->count())
    <div class="table-responsive shadow-sm">
        <table class="table table-bordered text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Ngày đặt</th>
                    <th>Phương thức</th>
                    <th>Thanh toán</th>
                    <th>Trạng thái</th>
                    <th>Tổng tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $i => $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
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
                                'pending' => 'warning text-dark ',
                                'processing' => 'info',
                                'shipped' => 'primary',
                                'completed' => 'success',
                                'cancelled' => 'danger',
                                default => 'dark'
                            };
                        @endphp
                        <span class="badge bg-{{ $statusClass }}">{{ ucfirst($order->status) }}</span>
                    </td>
                    <td>{{ number_format($order->total + $order->shipping_fee, 0, ',', '.') }} đ</td>
                    <td>
                        <a href="{{ route('client.orders.show', $order->id) }}" class="btn btn-sm btn-outline-info">
                            <i class="fa fa-eye me-1"></i> Xem
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $orders->links() }}
    </div>

    @else
        <div class="alert alert-info text-center">
            Bạn chưa có đơn hàng nào.
        </div>
    @endif
</div>
@endsection
