@extends('client.layout.master')
@section('content')

<div class="container py-4">
    <h3>Chi tiết đơn hàng #{{ $order->id }}</h3>
@if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <section class="mb-4">
                <h5 class="fw-bold mb-2">Thông tin khách hàng</h5>
                <table class="table table-borderless mb-0">
                    <tr><th class="w-25">Họ và tên:</th><td>{{ $order->user->name ?? $order->name }}</td></tr>
                    <tr><th>Email:</th><td>{{ $order->email }}</td></tr>
                    <tr><th>Số điện thoại:</th><td>{{ $order->phone }}</td></tr>
                    <tr><th>Địa chỉ:</th><td>{{ $order->address }}</td></tr>
                    <tr><th>Thành phố:</th><td>{{ $order->city }}</td></tr>
                    <tr><th>Phường/Xã:</th><td>{{ $order->ward }}</td></tr>
                    <tr><th>Mã bưu chính:</th><td>{{ $order->postcode }}</td></tr>
                </table>
            </section>

            {{-- Giao hàng & thanh toán --}}
            <section class="mb-4">
                <h5 class="fw-bold mb-2">Thông tin giao hàng</h5>
                <table class="table table-borderless mb-0">
                    <tr><th class="w-25">Phương thức thanh toán:</th><td>{{ strtoupper($order->payment) }}</td></tr>
                    <tr><th>Đơn vị giao hàng:</th><td>{{ $order->ship->name ?? '-' }}</td></tr>
                    <tr><th>Phí giao hàng:</th><td>{{ number_format($order->shipping_fee, 0, ',', '.') }} đ</td></tr>
                    <tr><th>Mã giảm giá:</th><td>{{ $order->coupon->coupon_code ?? '-' }}</td></tr>
                </table>
            </section>

            {{-- Sản phẩm --}}
            <section class="mb-4">
                <h5 class="fw-bold mb-2">Danh sách sản phẩm</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr><th>STT</th><th>Sản phẩm</th><th>Biến thể</th><th>Giá</th><th>Số lượng</th><th>Ghi chú</th><th>Thuộc tính</th></tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderDetails as $i => $detail)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $detail->product->name ?? '-' }}</td>
                                <td>{{ $detail->variant->id ?? '-' }}</td>
                                <td>{{ number_format($detail->price, 0, ',', '.') }} đ</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>{{ $detail->note ?? '-' }}</td>
                                <td>
                                    @if($detail->attributes && count($detail->attributes))
                                    <ul class="mb-0 ps-3">
                                        @foreach($detail->attributes as $attr)
                                        <li>{{ $attr->attribute_name }}: {{ $attr->attribute_value }}</li>
                                        @endforeach
                                    </ul>
                                    @else
                                    <span class="text-muted">Không có</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

            {{-- Tổng kết --}}
            <section class="mb-4">
                <h5 class="fw-bold mb-2">Tổng kết đơn hàng</h5>
                <table class="table table-borderless mb-0">
                    <tr><th class="w-25">Tổng tiền hàng:</th><td>{{ number_format($order->total, 0, ',', '.') }} đ</td></tr>
                    <tr><th>Phí giao hàng:</th><td>{{ number_format($order->shipping_fee, 0, ',', '.') }} đ</td></tr>
                    <tr><th>Mã giảm giá:</th><td>{{ $order->coupon->coupon_code ?? '-' }}</td></tr>
                </table>
            </section>
@if($order->status === 'pending')
<form action="{{ route('client.orders.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn hủy đơn hàng này không?');">
    @csrf
    @method('PUT')
    <button class="btn btn-danger mt-3">
        <i class="fa fa-times me-1"></i> Hủy đơn hàng
    </button>
</form>
@endif

            <a href="{{ route('client.orders.index') }}" class="btn btn-secondary mt-3">
                <i class="fas fa-arrow-left"></i> Quay lại danh sách
            </a>
        </div>
    </div>
</div>
@endsection
