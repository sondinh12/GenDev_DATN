@extends('Admin.layouts.master-without-page-title')

@section('title', 'Chi tiết Đơn hàng')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">🧾 Chi tiết đơn hàng #{{ $order->id }}</h5>
                    <span
                        class="badge {{ $order->status == 1 ? 'bg-success' : ($order->status == 2 ? 'bg-danger' : 'bg-secondary') }}">
                        @if($order->status == 1)
                        Đang xử lý
                        @elseif($order->status == 2)
                        Đã hủy
                        @else
                        Hoàn thành
                        @endif
                    </span>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-2">Thông tin khách hàng</h6>
                    <ul class="list-unstyled mb-4">
                        <li><strong>Tên:</strong> {{ $order->name }}</li>
                        <li><strong>Email:</strong> {{ $order->email }}</li>
                        <li><strong>Điện thoại:</strong> {{ $order->phone }}</li>
                        <li><strong>Địa chỉ:</strong> {{ $order->address }}</li>
                    </ul>
                    <h6 class="fw-bold mb-2">Sản phẩm</h6>
                    <ul class="list-unstyled mb-4">
                        <li><strong>Tên sản phẩm:</strong> {{ $order->product->name ?? '-' }}</li>
                        <li><strong>Biến thể:</strong> {{ $order->variant->id ?? '-' }}</li>
                        <li><strong>Mã giảm giá:</strong> {{ $order->coupon->coupon_code ?? '-' }}</li>
                    </ul>
                    <h6 class="fw-bold mb-2">Chi tiết đơn hàng</h6>
                    <ul class="list-unstyled mb-4">
                        <li><strong>Số tiền:</strong> {{ number_format($order->orderDetail->amount ?? 0, 0, ',', '.') }}
                            đ</li>
                        <li><strong>Ghi chú:</strong> {{ $order->orderDetail->note ?? '-' }}</li>
                        <li><strong>Thuộc tính:</strong>
                            @if(isset($order->orderDetail->attributes) && count($order->orderDetail->attributes))
                            <ul class="mb-0">
                                @foreach($order->orderDetail->attributes as $attr)
                                <li>{{ $attr->attribute_name }}: {{ $attr->attribute_value }}</li>
                                @endforeach
                            </ul>
                            @else
                            <span class="text-muted">Không có</span>
                            @endif
                        </li>
                    </ul>
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
                        Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection