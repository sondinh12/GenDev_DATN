@extends('Admin.layouts.master-without-page-title')

@section('title', 'Chi tiết đơn hàng')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        {{-- Flash Message --}}
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-1"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @elseif(session('notification'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="fas fa-info-circle me-1"></i> {{ session('notification') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="col-lg-10">
            <h3 class="mb-3">🧾 Chi tiết đơn hàng #{{ $order->id }}</h3>

            {{-- Trạng thái thanh toán --}}
            <section class="mb-4">
                <h5 class="fw-bold mb-2">Trạng thái thanh toán</h5>
                <div class="d-flex align-items-center justify-content-between">
                    @php
                    $paymentClass = match($order->payment_status) {
                    'paid' => 'success',
                    'unpaid' => 'warning',
                    'cancelled' => 'danger',
                    default => 'secondary',
                    };
                    @endphp
                    <span class="badge bg-{{ $paymentClass }}">{{ ucfirst($order->payment_status) }}</span>

                    @if(!in_array($order->payment_status, ['cancelled', 'paid']))
                    <form action="{{ route('admin.orders.update-payment-status', $order->id) }}"
                        onsubmit="return confirm('Bạn có chắc chắn muốn cập nhật trạng thái thanh toán?')"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <select name="payment_status" class="form-select form-select-sm d-inline-block w-auto me-2">
                            <option value="unpaid" {{ $order->payment_status == 'unpaid' ? 'selected' : '' }}>Chưa thanh
                                toán</option>
                            <option value="paid">Đã thanh toán</option>
                            <option value="cancelled">Đã hủy</option>
                        </select>
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-sync"></i> Cập nhật
                        </button>
                    </form>
                    @endif
                </div>
            </section>

            {{-- Trạng thái đơn hàng --}}
            <section class="mb-4">
                <h5 class="fw-bold mb-2">Trạng thái đơn hàng</h5>
                <div class="d-flex align-items-center justify-content-between">
                    @php
                    $statusClass = match($order->status) {
                    'pending' => 'secondary',
                    'processing' => 'info',
                    'shipped' => 'primary',
                    'completed' => 'success',
                    'cancelled' => 'danger',
                    default => 'dark',
                    };
                    @endphp
                    <span class="badge bg-{{ $statusClass }}">{{ ucfirst($order->status) }}</span>

                    @if(!in_array($order->status, ['completed', 'cancelled']))
                    <form action="{{ route('admin.orders.update-status', $order->id) }}"
                        onsubmit="return confirm('Bạn có chắc chắn muốn cập nhật trạng thái đơn hàng?')" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select form-select-sm d-inline-block w-auto me-2">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý
                            </option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang xử lý
                            </option>
                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Đang giao
                            </option>
                            <option value="completed">Hoàn tất</option>
                            <option value="cancelled">Đã hủy</option>
                        </select>
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-sync"></i> Cập nhật
                        </button>
                    </form>
                    @endif
                </div>
            </section>

            {{-- Thông tin khách hàng --}}
            <section class="mb-4">
                <h5 class="fw-bold mb-2">Thông tin khách hàng</h5>
                <table class="table table-borderless mb-0">
                    <tr>
                        <th class="w-25">Họ và tên:</th>
                        <td>{{ $order->user->name ?? $order->name }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $order->email }}</td>
                    </tr>
                    <tr>
                        <th>Số điện thoại:</th>
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
                        <th>Mã bưu chính:</th>
                        <td>{{ $order->postcode }}</td>
                    </tr>
                </table>
            </section>

            {{-- Giao hàng & thanh toán --}}
            <section class="mb-4">
                <h5 class="fw-bold mb-2">Thông tin giao hàng</h5>
                <table class="table table-borderless mb-0">
                    <tr>
                        <th class="w-25">Phương thức thanh toán:</th>
                        <td>{{ strtoupper($order->payment) }}</td>
                    </tr>
                    <tr>
                        <th>Đơn vị giao hàng:</th>
                        <td>{{ $order->ship->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Phí giao hàng:</th>
                        <td>{{ number_format($order->shipping_fee, 0, ',', '.') }} đ</td>
                    </tr>
                    <tr>
                        <th>Mã giảm giá:</th>
                        <td>{{ $order->coupon->coupon_code ?? '-' }}</td>
                    </tr>
                </table>
            </section>

            {{-- Sản phẩm --}}
            <section class="mb-4">
                <h5 class="fw-bold mb-2">Danh sách sản phẩm</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
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
                                <td>
                                    <img src="{{asset('storage/'.$detail->product->image)}}"
                                        alt="{{ $detail->product->name }}" width="100">
                                </td>
                                <td>{{ number_format($detail->price, 0, ',', '.') }} đ</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>{{ $detail->note ?? '-' }}</td>
                                <td>
                                    @if($detail->variant && $detail->variant->variantAttributes->count())
                                    @foreach($detail->variant->variantAttributes as $attr)
                                    <span class="badge bg-info text-dark me-1">
                                        {{ $attr->attribute->name ?? '' }}: {{ $attr->value->value ?? '' }}
                                    </span>
                                    @endforeach
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
            @php
                $discount = 0;
                if (isset($order->coupon)) {
                    if ($order->coupon->discount_type === 'fixed') {
                        $discount = $order->coupon->discount_amount;
                    } elseif ($order->coupon->discount_type === 'percent') {
                        $discount = $order->total * $order->coupon->discount_amount / 100;
                        if ($order->coupon->max_coupon > 0) {
                        $discount = min($discount, $order->coupon->max_coupon);
                        }
                    }
                }
            @endphp

            <section class="mb-4">
                <h5 class="fw-bold mb-2">Tổng kết đơn hàng</h5>
                <table class="table table-borderless mb-0">
                    <tr>
                        <th class="w-25">Tổng phụ:</th>
                        <td>{{ number_format($order->total, 0, ',', '.') }} đ</td>
                    </tr>
                    <tr>
                        <th>Giảm giá:</th>
                        <td>
                            @if($discount > 0)
                            -{{ number_format($discount, 0, ',', '.') }} đ
                            @else
                            0 đ
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Phí giao hàng:</th>
                        <td>{{ number_format($order->shipping_fee, 0, ',', '.') }} đ</td>
                    </tr>
                    <tr>
                        <th class="w-25">Tổng tiền:</th>
                        <td>
                            {{ number_format(max(0, $order->total - $discount) + $order->shipping_fee, 0, ',', '.') }} đ
                        </td>
                    </tr>
                </table>
            </section>

            <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">
                <i class="fas fa-arrow-left"></i> Quay lại danh sách
            </a>
        </div>
    </div>
</div>
@endsection
<script>
    setTimeout(() => {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
        }
    }, 5000);
</script>