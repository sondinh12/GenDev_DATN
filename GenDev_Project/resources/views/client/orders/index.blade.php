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

    {{-- Tabs lọc --}}
    <ul class="nav nav-tabs mb-4" role="tablist">
        @php
            $currentStatus = request('status');
            $tabs = [
                'all' => 'Tất cả đơn',
                'pending' => 'Chờ xác nhận',
                'processing' => 'Đang xử lý',
                'shipped' => 'Đã giao',
                'completed' => 'Hoàn thành',
                'cancelled' => 'Đã huỷ',
            ];
        @endphp
        @foreach($tabs as $key => $label)
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ ($currentStatus === $key || ($key === 'all' && !$currentStatus)) ? 'active' : '' }}"
               href="{{ route('client.orders.index', $key !== 'all' ? ['status' => $key] : []) }}">
               {{ $label }}
            </a>
        </li>
        @endforeach
    </ul>

    {{-- Helper --}}
    @php
        function getStatusLabel($status) {
            return match($status) {
                'pending' => 'Chờ xác nhận',
                'processing' => 'Đang xử lý',
                'shipped' => 'Đã giao',
                'completed' => 'Hoàn thành',
                'cancelled' => 'Đã hủy',
                default => ucfirst($status),
            };
        }
    @endphp

    @if($orders->count())
        @foreach($orders as $order)
        <div class="order-card border rounded p-3 shadow-sm mb-4 bg-white">
            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="fw-bold text-muted">#{{ $order->id }} • {{ $order->created_at->format('d/m/Y H:i') }}</div>
                @php
                    $statusClass = match($order->status) {
                        'pending' => 'warning text-dark',
                        'processing' => 'info',
                        'shipped' => 'primary',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        default => 'secondary'
                    };
                @endphp
<span class="order-status {{ $order->status }}">{{ getStatusLabel($order->status) }}</span>
            </div>

            {{-- Sản phẩm (giới hạn 2) --}}
            @foreach($order->orderDetails->take(2) as $detail)
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="d-flex">
                    <img src="{{ asset('storage/'.$detail->product->image) }}" alt="Ảnh" class="product-image me-3">
                    <div>
                        <div class="fw-semibold">{{ $detail->product->name }}</div>
                        @if($detail->variant && $detail->variant->variantAttributes->count())
                            <div class="small text-muted">
                                @foreach($detail->variant->variantAttributes as $attr)
                                    {{ $attr->attribute->name ?? '' }}: {{ $attr->value->value ?? '' }}@if(!$loop->last), @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="text-end">
                    <div class="text-muted">x{{ $detail->quantity }}</div>
                    <div class="fw-bold">{{ number_format($detail->price, 0, ',', '.') }} đ</div>
                </div>
            </div>
            @endforeach

            {{-- Nếu còn sản phẩm chưa hiển thị --}}
            @if($order->orderDetails->count() > 2)
            <div class="text-end mb-3">
                <a href="{{ route('client.orders.show', $order->id) }}" class="text-decoration-none small">
                    Xem thêm {{ $order->orderDetails->count() - 2 }} sản phẩm...
                </a>
            </div>
            @endif

            {{-- Tổng tiền + Action --}}
            <div class="d-flex justify-content-between align-items-center border-top pt-3 mt-2">
                <div class="fw-bold text-muted">
                    Tổng tiền:
                    <span class="text-danger fs-5">
                        {{ number_format($order->total + $order->shipping_fee, 0, ',', '.') }} đ
                    </span>
                </div>
                <div class="d-flex gap-2">
                    @if($order->status === 'cancelled' || ($order->status === 'pending' && $order->payment_status === 'unpaid' ))
                        <a href="{{ route('order.retry', $order->id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-redo-alt me-1"></i> Mua lại
                        </a>
                    @endif
                    <a href="{{ route('client.orders.show', $order->id) }}" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
                </div>
            </div>
        </div>
        @endforeach

        <div class="d-flex justify-content-center mt-4">
            {{ $orders->links() }}
        </div>
    @else
        <div class="alert alert-info text-center">Bạn chưa có đơn hàng nào.</div>
    @endif
</div>
@endsection

@push('styles')
<style>
.order-card {
    transition: all 0.2s ease;
}
.order-card:hover {
    box-shadow: 0 0 12px rgba(0,0,0,0.05);
}
.product-image {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border: 1px solid #eee;
    border-radius: 4px;
}
.order-status {
    padding: 4px 12px;
    font-size: 0.875rem;
    font-weight: 600;
    border-radius: 8px;
    display: inline-block;
    text-align: center;
    min-width: 80px;
    text-transform: uppercase;
}

.order-status.cancelled {
    background-color: #eb5757;
    color: #fff;
    border: none;
}
.order-status.pending {
    background-color: #f5c542;
    color: #333;
}
.order-status.processing {
    background-color: #2d9cdb;
    color: #fff;
}
.order-status.shipped {
    background-color: #9b51e0;
    color: #fff;
}
.order-status.completed {
    background-color: #27ae60;
    color: #fff;
}

</style>
@endpush
