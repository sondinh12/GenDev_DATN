@extends('Admin.layouts.master-without-page-title')

@section('title', 'Chi tiết Đơn hàng')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h3 class="mb-3">🧾 Chi tiết đơn hàng #{{ $order->id }}
                <span class="badge bg-info ms-2">{{ $order->status_text }}</span>
            </h3>
            <section class="mb-4">
                <h5 class="fw-bold mb-2">Thông tin khách hàng</h5>
                <table class="table table-borderless mb-0">
                    <tr>
                        <th class="w-25">Tên:</th>
                        <td>{{ $order->user->name ?? $order->name }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $order->email }}</td>
                    </tr>
                    <tr>
                        <th>Điện thoại:</th>
                        <td>{{ $order->phone }}</td>
                    </tr>
                    <tr>
                        <th>Địa chỉ:</th>
                        <td>{{ $order->address }}</td>
                    </tr>
                    <tr>
                        <th>Thành phố:</th>
                        <td>{{ $order->city }}</td>
                    </tr>
                    <tr>
                        <th>Phường/Xã:</th>
                        <td>{{ $order->ward }}</td>
                    </tr>
                    <tr>
                        <th>Mã bưu điện:</th>
                        <td>{{ $order->postcode }}</td>
                    </tr>
                </table>
            </section>
            <section class="mb-4">
                <h5 class="fw-bold mb-2">Thông tin vận chuyển & thanh toán</h5>
                <table class="table table-borderless mb-0">
                    <tr>
                        <th class="w-25">Phương thức thanh toán:</th>
                        <td>{{ $order->payment }}</td>
                    </tr>
                    <tr>
                        <th>Đơn vị vận chuyển:</th>
                        <td>{{ $order->ship->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Phí ship:</th>
                        <td>{{ number_format($order->shipping_fee, 0, ',', '.') }} đ</td>
                    </tr>
                    <tr>
                        <th>Mã giảm giá:</th>
                        <td>{{ $order->coupon->coupon_code ?? '-' }}</td>
                    </tr>
                </table>
            </section>
            <section class="mb-4">
                <h5 class="fw-bold mb-2">Danh sách sản phẩm</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Biến thể</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Ghi chú</th>
                                <th>Thuộc tính</th>
                            </tr>
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
            <section class="mb-4">
                <h5 class="fw-bold mb-2">Tổng kết</h5>
                <table class="table table-borderless mb-0">
                    <tr>
                        <th class="w-25">Tổng tiền:</th>
                        <td>{{ number_format($order->total, 0, ',', '.') }} đ</td>
                    </tr>
                    <tr>
                        <th>Phí ship:</th>
                        <td>{{ number_format($order->shipping_fee, 0, ',', '.') }} đ</td>
                    </tr>
                    <tr>
                        <th>Mã giảm giá:</th>
                        <td>{{ $order->coupon->coupon_code ?? '-' }}</td>
                    </tr>
                </table>
            </section>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Quay lại
                danh sách</a>
        </div>
    </div>
</div>
@endsection