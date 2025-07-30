@extends('Admin.layouts.master-without-page-title')

@section('title', 'Chi tiết đơn hàng')

@section('content')
    <div class="container-fluid py-4" style="background: #f8fafc;">
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
    </div>

 <div class="col-lg-10">
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between">
                <h3 class="mb-0">
                    <i class="fas fa-file-invoice-dollar me-2"></i>Chi tiết đơn hàng #{{ $order->id }}
                </h3>
                <a href="{{ route('orders.index') }}" class="btn btn-flat-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
            </div>
            <div class="card-body">
                @php

                    $statusOrder = ['pending', 'processing', 'shipping', 'shipped', 'completed', 'cancelled', 'return_requested'];

                    $statusClass = [
                        'pending' => 'secondary',
                        'processing' => 'info',
                        'shipping' => 'warning',
                        'shipped' => 'primary',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        'return_requested' => 'warning',
                    ];
                    $statusLabels = [
                        'pending' => 'Chờ xử lý',
                        'processing' => 'Đang xử lý',
                        'shipping' => 'Đang giao',
                        'shipped' => 'Đã giao',
                        'completed' => 'Hoàn thành',
                        'cancelled' => 'Đã hủy',

                        'return_requested' => 'Hoàn hàng',
                    ];
                    $currentIndex = array_search($order->status, $statusOrder);
                @endphp

                {{-- Trạng thái thanh toán --}}
                <h5 class="fw-bold mb-2">Trạng thái thanh toán</h5>
                <span class="badge bg-{{ $statusClass[$order->payment_status] ?? 'secondary' }} p-2 mb-2">
                    {{ ucfirst($order->payment_status) }}
                </span>

                {{-- Trạng thái đơn hàng --}}
                <h5 class="fw-bold mt-3">Trạng thái đơn hàng</h5>
                <span class="badge bg-{{ $statusClass[$order->status] ?? 'dark' }} p-2 mb-2">
                    {{ $statusLabels[$order->status] ?? ucfirst($order->status) }}
                </span>


                @if (!in_array($order->status, ['shipped', 'cancelled', 'completed', 'return_requested']))

                    <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('PUT')
                        <div class="d-flex flex-column flex-md-row align-items-start gap-2">
                            <select name="status" class="form-select form-select-sm w-auto">
                                @foreach($statusOrder as $key => $status)
                                    @if(
                                        ($key === $currentIndex + 1) ||
                                        ($status === 'cancelled' && $order->status !== 'cancelled')
                                    )
                                        <option value="{{ $status }}">{{ $statusLabels[$status] }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="text" name="note" class="form-control form-control-sm w-50"
                                   placeholder="Ghi chú (nếu có)">
                            <button class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-sync"></i> Cập nhật
                            </button>
                        </div>
                    </form>
                @endif

                {{-- Số tài khoản hoàn tiền nếu applicable --}}
                @if ($order->payment_status === 'paid' && in_array($order->status, ['cancelled', 'return_requested']))

                    @php
                        $refundLog = $order->orderStatusLogs()
                            ->whereNotNull('refund_bank_account')
                            ->orderByDesc('changed_at')
                            ->first();
                    @endphp
                    @if($refundLog && $refundLog->refund_bank_account)
                        <div class="alert alert-info mt-3">
                            <strong>Số tài khoản hoàn tiền:</strong> {{ $refundLog->refund_bank_account }}
                        </div>
                    @endif
                @endif


                        {{-- Thông tin khách hàng --}}
                        <div class="card mb-4 border-start border-4 border-primary">
                            <div class="card-header bg-light fw-bold"><i class="fas fa-user me-2"></i>Thông tin khách hàng
                            </div>
                            <div class="card-body p-3">
                                <div class="row mb-2">
                                    <div class="col-sm-4 fw-bold">Họ và tên:</div>
                                    <div class="col-sm-8">{{ $order->user->name ?? $order->name }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 fw-bold">Email:</div>
                                    <div class="col-sm-8">{{ $order->email }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 fw-bold">Số điện thoại:</div>
                                    <div class="col-sm-8">{{ $order->phone }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 fw-bold">Địa chỉ:</div>
                                    <div class="col-sm-8">{{ $order->address }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 fw-bold">Thành phố:</div>
                                    <div class="col-sm-8">{{ $order->city }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 fw-bold">Phường/Xã:</div>
                                    <div class="col-sm-8">{{ $order->ward }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 fw-bold">Mã bưu chính:</div>
                                    <div class="col-sm-8">{{ $order->postcode }}</div>
                                </div>
                            </div>
                        </div>

                        {{-- Giao hàng & thanh toán --}}
                        <div class="card mb-4 border-start border-4 border-info">
                            <div class="card-header bg-light fw-bold"><i class="fas fa-shipping-fast me-2"></i>Thông tin
                                giao hàng</div>
                            <div class="card-body p-3">
                                <div class="row mb-2">
                                    <div class="col-sm-4 fw-bold">Phương thức thanh toán:</div>
                                    <div class="col-sm-8">{{ strtoupper($order->payment) }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 fw-bold">Đơn vị giao hàng:</div>
                                    <div class="col-sm-8">{{ $order->ship->name ?? '-' }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 fw-bold">Phí giao hàng:</div>
                                    <div class="col-sm-8">{{ number_format($order->shipping_fee, 0, ',', '.') }} đ</div>
                                </div>
                                @if($order->shipping_discount > 0)
        <div class="row mb-2">
            <div class="col-sm-4 fw-bold">Giảm phí vận chuyển:</div>
            <div class="col-sm-8 text-success">-{{ number_format($order->shipping_discount, 0, ',', '.') }} đ</div>
        </div>

        <div class="col-lg-10">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between">
                    <h3 class="mb-0"><i class="fas fa-file-invoice-dollar me-2"></i>Chi tiết đơn hàng
                        #{{ $order->id }}
                    </h3>
                    <a href="{{ route('orders.index') }}" class="btn btn-flat-secondary btn-sm"><i
                            class="fas fa-arrow-left"></i> Quay lại</a>
                </div>
                <div class="card-body">
                    {{-- Trạng thái thanh toán & đơn hàng --}}
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="fw-bold mb-2">Trạng thái thanh toán</h5>
                            @php
                                $paymentClass = match ($order->payment_status) {
                                    'paid' => 'success',
                                    'unpaid' => 'warning',
                                    'cancelled' => 'danger',
                                    default => 'secondary',
                                };

                                $paymentLabels = [
                                    'paid' => 'Đã thanh toán',
                                    'unpaid' => 'Chưa thanh toán',
                                    'cancelled' => 'Đã hủy',
                                ];
                            @endphp
                            <span class="badge bg-{{ $paymentClass }} p-2 mb-2">
                                {{ $paymentLabels[$order->payment_status] ?? ucfirst($order->payment_status) }}
                            </span>
                        </div>

                        <div class="col-md-6">
                            <h5 class="fw-bold mb-2">Trạng thái đơn hàng</h5>

                            @php
                                $statusOrder = ['pending', 'processing', 'shipped', 'completed', 'cancelled'];
                                $statusClass = [
                                    'pending' => 'secondary',
                                    'processing' => 'info',
                                    'shipped' => 'primary',
                                    'completed' => 'success',
                                    'cancelled' => 'danger',
                                ];
                                $statusLabels = [
                                    'pending' => 'Chờ xử lý',
                                    'processing' => 'Đang xử lý',
                                    'shipped' => 'Đã giao',
                                    'completed' => 'Hoàn thành',
                                    'cancelled' => 'Đã hủy',
                                ];
                                $currentIndex = array_search($order->status, $statusOrder);
                            @endphp

                            {{-- Hiển thị trạng thái hiện tại --}}
                            <span class="badge bg-{{ $statusClass[$order->status] ?? 'dark' }} p-2 mb-2">
                                {{ $statusLabels[$order->status] ?? ucfirst($order->status) }}
                            </span>

                            {{-- Nếu chưa hoàn thành hoặc huỷ thì cho cập nhật --}}
                            @if (!in_array($order->status, ['shipped', 'cancelled', 'completed']))
                                <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST"
                                    class="mt-2">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex flex-column flex-md-row align-items-start gap-2">
                                        <select name="status" class="form-select form-select-sm w-auto">
                                            @foreach ($statusOrder as $key => $status)
                                                {{-- Chỉ cho chuyển đến trạng thái tiếp theo và huỷ, không cho hoàn thành thủ công --}}
                                                @if (($key > $currentIndex && $status !== 'completed') || ($status === 'cancelled' && $order->status !== 'cancelled'))
                                                    <option value="{{ $status }}">{{ $statusLabels[$status] }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <input type="text" name="note" class="form-control form-control-sm w-50"
                                            placeholder="Ghi chú (nếu có)">
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-sync"></i> Cập nhật
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        @php

                                            $statusOrder = [
                                                'pending',
                                                'processing',
                                                'shipping',
                                                'shipped',
                                                'completed',
                                                'cancelled',
                                                'return_requested',
                                            ];

                                            $statusClass = [
                                                'pending' => 'secondary',
                                                'processing' => 'info',
                                                'shipping' => 'warning',
                                                'shipped' => 'primary',
                                                'completed' => 'success',
                                                'cancelled' => 'danger',
                                                'return_requested' => 'warning',
                                            ];
                                            $statusLabels = [
                                                'pending' => 'Chờ xử lý',
                                                'processing' => 'Đang xử lý',
                                                'shipping' => 'Đang giao',
                                                'shipped' => 'Đã giao',
                                                'completed' => 'Hoàn thành',
                                                'cancelled' => 'Đã hủy',
                                                'return_requested' => 'Hoàn hàng',
                                            ];
                                            $currentIndex = array_search($order->status, $statusOrder);
                                        @endphp

                                        {{-- Trạng thái thanh toán --}}
                                        <h5 class="fw-bold mb-2">Trạng thái thanh toán</h5>
                                        <span
                                            class="badge bg-{{ $statusClass[$order->payment_status] ?? 'secondary' }} p-2 mb-2">
                                            {{ ucfirst($order->payment_status) }}
                                        </span>

                                        {{-- Trạng thái đơn hàng --}}
                                        <h5 class="fw-bold mt-3">Trạng thái đơn hàng</h5>
                                        <span class="badge bg-{{ $statusClass[$order->status] ?? 'dark' }} p-2 mb-2">
                                            {{ $statusLabels[$order->status] ?? ucfirst($order->status) }}
                                        </span>


                                        @if (!in_array($order->status, ['shipped', 'cancelled', 'completed', 'return_requested']))

                                            <form action="{{ route('admin.orders.update-status', $order->id) }}"
                                                method="POST" class="mt-2">
                                                @csrf
                                                @method('PUT')
                                                <div class="d-flex flex-column flex-md-row align-items-start gap-2">
                                                    <select name="status" class="form-select form-select-sm w-auto">
                                                        @foreach ($statusOrder as $key => $status)
                                                            @if ($key === $currentIndex + 1 || ($status === 'cancelled' && $order->status !== 'cancelled'))
                                                                <option value="{{ $status }}">
                                                                    {{ $statusLabels[$status] }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <input type="text" name="note"
                                                        class="form-control form-control-sm w-50"
                                                        placeholder="Ghi chú (nếu có)">
                                                    <button class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-sync"></i> Cập nhật
                                                    </button>
                                                </div>
                                            </form>
                                        @endif

                                        {{-- Số tài khoản hoàn tiền nếu applicable --}}

                                        @if ($order->payment_status === 'paid' && in_array($order->status, ['cancelled', 'return_requested']))

                                            @php
                                                $refundLog = $order
                                                    ->orderStatusLogs()
                                                    ->whereNotNull('refund_bank_account')
                                                    ->orderByDesc('changed_at')
                                                    ->first();
                                            @endphp
                                            @if ($refundLog && $refundLog->refund_bank_account)
                                                <div class="alert alert-info mt-3">
                                                    <strong>Số tài khoản hoàn tiền:</strong>
                                                    {{ $refundLog->refund_bank_account }}
                                                </div>
                                            @endif
                                        @endif


                                        {{-- Thông tin khách hàng --}}
                                        <div class="card mb-4 border-start border-4 border-primary">
                                            <div class="card-header bg-light fw-bold"><i class="fas fa-user me-2"></i>Thông
                                                tin khách hàng
                                            </div>
                                            <div class="card-body p-3">
                                                <div class="row mb-2">
                                                    <div class="col-sm-4 fw-bold">Họ và tên:</div>
                                                    <div class="col-sm-8">{{ $order->user->name ?? $order->name }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-4 fw-bold">Email:</div>
                                                    <div class="col-sm-8">{{ $order->email }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-4 fw-bold">Số điện thoại:</div>
                                                    <div class="col-sm-8">{{ $order->phone }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-4 fw-bold">Địa chỉ:</div>
                                                    <div class="col-sm-8">{{ $order->address }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-4 fw-bold">Thành phố:</div>
                                                    <div class="col-sm-8">{{ $order->city }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-4 fw-bold">Phường/Xã:</div>
                                                    <div class="col-sm-8">{{ $order->ward }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-4 fw-bold">Mã bưu chính:</div>
                                                    <div class="col-sm-8">{{ $order->postcode }}</div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Giao hàng & thanh toán --}}
                                        <div class="card mb-4 border-start border-4 border-info">
                                            <div class="card-header bg-light fw-bold"><i
                                                    class="fas fa-shipping-fast me-2"></i>Thông tin
                                                giao hàng</div>
                                            <div class="card-body p-3">
                                                <div class="row mb-2">
                                                    <div class="col-sm-4 fw-bold">Phương thức thanh toán:</div>
                                                    <div class="col-sm-8">{{ strtoupper($order->payment) }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-4 fw-bold">Đơn vị giao hàng:</div>
                                                    <div class="col-sm-8">{{ $order->ship->name ?? '-' }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-4 fw-bold">Phí giao hàng:</div>
                                                    <div class="col-sm-8">
                                                        {{ number_format($order->shipping_fee, 0, ',', '.') }} đ</div>
                                                </div>
                                                @if ($order->shipping_discount > 0)
                                                    <div class="row mb-2">
                                                        <div class="col-sm-4 fw-bold">Giảm phí vận chuyển:</div>
                                                        <div class="col-sm-8 text-success">
                                                            -{{ number_format($order->shipping_discount, 0, ',', '.') }} đ
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        {{-- Sản phẩm --}}
                                        <div class="card mb-4 border-start border-4 border-success">
                                            <div class="card-header bg-light fw-bold"><i class="fas fa-box me-2"></i>Danh
                                                sách sản phẩm
                                            </div>
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-0">
                                                        <thead class="table-light">
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
                                                            @foreach ($order->orderDetails as $i => $detail)
                                                                <tr>
                                                                    <td>{{ $i + 1 }}</td>
                                                                    <td>{{ $detail->product->name ?? '-' }}</td>
                                                                    <td>
                                                                        <img src="{{ asset('storage/' . $detail->product->image) }}"
                                                                            alt="{{ $detail->product->name }}"
                                                                            width="80" class="img-thumbnail">
                                                                    </td>
                                                                    <td>{{ number_format($detail->price, 0, ',', '.') }} đ
                                                                    </td>
                                                                    <td>{{ $detail->quantity }}</td>
                                                                    <td>{{ $detail->note ?? '-' }}</td>
                                                                    <td>
                                                                        @if ($detail->variant && $detail->variant->variantAttributes->count())
                                                                            @foreach ($detail->variant->variantAttributes as $attr)
                                                                                <span class="badge bg-info text-dark me-1">
                                                                                    {{ $attr->attribute->name ?? '' }}:
                                                                                    {{ $attr->value->value ?? '' }}
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
                                            </div>
                                        </div>

                                        <div class="card border-start border-4 border-warning mb-4 mt-4">
                                            <div class="card-header bg-light fw-bold">
                                                <i class="fas fa-calculator me-2"></i>Tổng kết đơn hàng
                                            </div>
                                            <div class="card-body p-3">
                                                <div class="row mb-2">
                                                    <div class="col-sm-4 fw-bold">Tổng phụ:</div>
                                                    <div class="col-sm-8">
                                                        {{ number_format($order->subtotal, 0, ',', '.') }} đ</div>
                                                </div>
                                                @if ($order->product_discount > 0)
                                                    <div class="row mb-2">
                                                        <div class="col-sm-4 fw-bold">Giảm giá sản phẩm:</div>
                                                        <div class="col-sm-8 text-success">
                                                            -{{ number_format($order->product_discount, 0, ',', '.') }} đ
                                                        </div>
                                                    </div>
                                                @endif
                                                {{-- <div class="row mb-2">
                                                    <div class="col-sm-4 fw-bold">Phí vận chuyển:</div>
                                                    <div class="col-sm-8">{{ number_format($order->shipping_fee, 0, ',', '.') }} đ</div>
                                                </div> --}}

                                                <div class="row mb-2 border-top pt-2">
                                                    <div class="col-sm-4 fw-bold">Tổng tiền thanh toán:</div>
                                                    <div class="col-sm-8 text-danger fw-bold" style="font-size: 1.2rem;">
                                                        {{ number_format($order->total, 0, ',', '.') }} đ
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Lịch sử trạng thái --}}
                                        <div class="card mb-4 border-start border-4 border-dark">
                                            <div class="card-header bg-light fw-bold">
                                                <i class="fas fa-history me-2"></i>Lịch sử trạng thái đơn hàng
                                            </div>
                                            <div class="card-body p-3">
                                                @php
                                                    $badgeColors = [
                                                        'pending' => 'secondary',
                                                        'processing' => 'info',
                                                        'shipping' => 'warning',
                                                        'shipped' => 'primary',
                                                        'completed' => 'success',
                                                        'cancelled' => 'danger',
                                                        'return_requested' => 'dark',
                                                    ];

                                                    $statusLabels = [
                                                        'pending' => 'Chờ xử lý',
                                                        'processing' => 'Đang xử lý',
                                                        'shipping' => 'Đang giao',
                                                        'shipped' => 'Đã giao',
                                                        'completed' => 'Hoàn thành',
                                                        'cancelled' => 'Đã huỷ',
                                                        'return_requested' => 'Hoàn hàng',
                                                    ];
                                                @endphp


                                                @if ($order->orderStatusLogs && $order->orderStatusLogs->isNotEmpty())
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered align-middle mb-0">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Trạng thái cũ</th>
                                                                    <th>Trạng thái mới</th>
                                                                    <th>Người thay đổi</th>
                                                                    <th>Thời gian</th>
                                                                    <th>Ghi chú</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($order->orderStatusLogs->sortByDesc('changed_at')->values() as $index => $log)
                                                                    <tr>
                                                                        <td>{{ $index + 1 }}</td>
                                                                        <td>
                                                                            <span
                                                                                class="badge bg-{{ $badgeColors[$log->old_status] ?? 'secondary' }}">
                                                                                {{ $statusLabels[$log->old_status] ?? ucfirst($log->old_status) }}
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <span
                                                                                class="badge bg-{{ $badgeColors[$log->new_status] ?? 'secondary' }}">
                                                                                {{ $statusLabels[$log->new_status] ?? ucfirst($log->new_status) }}
                                                                            </span>
                                                                        </td>
                                                                        <td>{{ $log->changedBy->name ?? 'Hệ thống' }}</td>
                                                                        <td>{{ \Carbon\Carbon::parse($log->changed_at)->format('d/m/Y H:i') }}
                                                                        </td>
                                                                        <td>{{ $log->note ?? '-' }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @else
                                                    <p class="text-muted mb-0">Không có thay đổi nào được ghi nhận.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<style>
    .table th,
    .table td {
        vertical-align: middle !important;
    }
</style>
{{-- <script>
    setTimeout(() => {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
        }
    }, 5000);
</script> --}}
