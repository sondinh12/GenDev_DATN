@extends('client.layout.master')
@section('title', 'Chi tiết đơn hàng')

@push('styles')
<style>
    .info-box {
        border: 1px solid #dee2e6;
        border-left: 4px solid #0d6efd;
        background-color: #f8f9fa;
        padding: 16px;
        border-radius: 8px;
        height: 100%;
    }

    .order-summary {
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        padding: 20px;
    }

    .product-item {
        border-bottom: 1px solid #dee2e6;
        padding-bottom: 12px;
        margin-bottom: 12px;
    }

    .product-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
</style>
@endpush

@section('content')
<div class="container py-4">
    <div>
        <a href="{{ route('client.orders.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Quay lại đơn hàng của tôi
        </a>
    </div>
    <br>

    @php
        $statusVi = [
            'pending' => 'Chờ xử lý',
            'processing' => 'Đang xử lý',
            'shipped' => 'Đang giao hàng',
            'completed' => 'Hoàn tất',
            'cancelled' => 'Đã hủy',
        ][$order->status] ?? ucfirst($order->status);

        $paymentStatusClass = match($order->payment_status) {
            'paid' => 'success',
            'unpaid' => 'warning',
            'cancelled' => 'danger',
            default => 'secondary',
        };

        $paymentStatusText = match($order->payment_status) {
            'paid' => 'Đã thanh toán',
            'unpaid' => 'Chưa thanh toán',
            'cancelled' => 'Đã hủy',
            default => ucfirst($order->payment_status),
        };

        $tamTinh = $order->total - $order->shipping_fee;
        $discount = 0;

        if ($order->coupon) {
            if ($order->coupon->discount_type === 'fixed') {
                $discount = $order->coupon->discount_amount;
            } elseif ($order->coupon->discount_type === 'percent') {
                $discount = $tamTinh * $order->coupon->discount_amount / 100;
                if ($order->coupon->max_coupon > 0) {
                    $discount = min($discount, $order->coupon->max_coupon);
                }
            }
        }
    @endphp

    <h5 class="mb-4">
        Chi tiết đơn hàng #{{ $order->id }} -
        <span class="text-danger text-uppercase">{{ $statusVi }}</span>
    </h5>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- THÔNG TIN --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="info-box">
                <h6 class="fw-bold mb-2">ĐỊA CHỈ NGƯỜI NHẬN</h6>
                <p class="mb-1">{{ strtoupper($order->name) }}</p>
                <p class="mb-1">Địa chỉ: {{ $order->address }}, {{ $order->ward }}, {{ $order->city }}</p>
                <p class="mb-0">Điện thoại: {{ $order->phone }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box border-info">
                <h6 class="fw-bold mb-2">HÌNH THỨC GIAO HÀNG</h6>
                <p class="mb-1">{{ $order->ship->name ?? 'FAST Giao Tiết Kiệm' }}</p>
                <p class="mb-1">Ngày đặt hàng: {{ $order->created_at->format('H:i d/m/Y') }}</p>
                <p class="mb-0">Phí vận chuyển: {{ number_format($order->shipping_fee, 0, ',', '.') }} đ</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box border-success">
                <h6 class="fw-bold mb-2">HÌNH THỨC THANH TOÁN</h6>
                <p class="mb-0">
                    @switch($order->payment)
                        @case('cod')
                            Thanh toán khi nhận hàng
                            @break
                        @case('banking')
                            Chuyển khoản ngân hàng
                            @break
                        @default
                            {{ ucfirst($order->payment) }}
                    @endswitch
                </p>
                <span class="badge bg-{{ $paymentStatusClass }} mt-2">
                    {{ $paymentStatusText }}
                </span>
            </div>
        </div>
    </div>

    {{-- SẢN PHẨM --}}
    <div class="order-summary mb-4">
        <h6 class="fw-bold border-bottom pb-2 mb-3">Sản phẩm</h6>
        @foreach($order->orderDetails as $detail)
        <div class="product-item d-flex justify-content-between">
            <div class="d-flex">
                <img src="{{ asset('storage/'.$detail->product->image) }}" alt="" width="80" height="80" class="me-3 rounded border">
                <div>
                    <div class="fw-semibold">{{ $detail->product->name }}</div>
                    @if($detail->variant && $detail->variant->variantAttributes->count())
                    <div class="text-muted small mt-1">
                        @foreach($detail->variant->variantAttributes as $attr)
                            {{ $attr->attribute->name ?? '' }}: {{ $attr->value->value ?? '' }}@if(!$loop->last), @endif
                        @endforeach
                    </div>
                    @endif
                    <div class="text-muted small mt-1">SKU: {{ $detail->variant->sku ?? '---' }}</div>
                </div>
            </div>
            <div class="text-end">
                <div class="text-muted">x{{ $detail->quantity }}</div>
                <div class="fw-bold">{{ number_format($detail->price, 0, ',', '.') }} đ</div>
            </div>
        </div>
        @endforeach

        <div class="text-end mt-4">
            <div>Tạm tính: <strong>{{ number_format($tamTinh + $discount, 0, ',', '.') }} đ</strong></div>

            @if($order->coupon)
                <div>Mã giảm giá: <strong>{{ $order->coupon->coupon_code }}</strong></div>
                <div class="text-success">Giảm: -{{ number_format($discount, 0, ',', '.') }} đ</div>
            @endif

            <div>Phí vận chuyển: <strong>{{ number_format($order->shipping_fee, 0, ',', '.') }} đ</strong></div>

            <div class="fs-5 fw-bold text-danger">
                Tổng cộng: {{ number_format($order->total, 0, ',', '.') }} đ
            </div>
        </div>
    </div>

    {{-- Hành động --}}
    <div class="d-flex gap-2">
        @if($order->status === 'pending')
            <form action="{{ route('client.orders.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn hủy đơn hàng này không?');">
                @csrf
                @method('PUT')
                <button class="btn btn-outline-danger">
                    <i class="fa fa-times me-1"></i> Hủy đơn hàng
                </button>
            </form>
        @endif

        @if($order->status === 'shipped')
            <form action="{{ route('client.orders.complete', $order->id) }}" method="POST" onsubmit="return confirm('Bạn xác nhận đã nhận hàng và muốn hoàn thành đơn này?');">
                @csrf
                @method('PUT')
                <button class="btn btn-outline-success">
                    <i class="fa fa-check me-1"></i> Đã nhận hàng
                </button>
            </form>
        @endif
    </div>
</div>
@endsection