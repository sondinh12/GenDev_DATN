@extends('Admin.layouts.master-without-page-title')

@section('title', 'Chi tiết đơn hàng')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="mb-0"><i class="fas fa-file-invoice-dollar me-2"></i>Chi tiết đơn hàng #{{ $order->id }}</h3>
            <a href="{{ route('orders.index') }}" class="btn btn-flat-secondary btn-sm"><i class="fas fa-arrow-left"></i> Quay lại</a>
        </div>

        <div class="card-body">
            @php
                // Thứ tự và nhãn trạng thái đơn
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

                // Trạng thái thanh toán (có refund / refunded)
                $paymentBadgeClass = match ($order->payment_status) {
                    'paid' => 'success',
                    'unpaid' => 'warning',
                    'cancelled' => 'danger',
                    'refund' => 'info', // Đang hoàn tiền
                    'refunded' => 'primary', // Đã hoàn tiền
                    default => 'secondary',
                };
                $paymentLabelMap = [
                    'paid' => 'Đã thanh toán',
                    'unpaid' => 'Chưa thanh toán',
                    'cancelled' => 'Đã huỷ',
                    'refund' => 'Đang hoàn tiền',
                    'refunded' => 'Đã hoàn tiền',
                ];
            @endphp

            {{-- Trạng thái thanh toán: tiêu đề trái, badge phải --}}
            <div class="d-flex align-items-center justify-content-between mb-2">
                <h5 class="fw-bold mb-0">Trạng thái thanh toán</h5>
                <span class="badge bg-{{ $paymentBadgeClass }} p-2">
                    {{ $paymentLabelMap[$order->payment_status] ?? ucfirst($order->payment_status) }}
                </span>
            </div>

            {{-- Form cập nhật trạng thái thanh toán (chỉ hiện khi đang hoàn tiền) --}}
            @if ($order->payment_status === 'refund')
                <form action="{{ route('admin.orders.update-payment-status', $order->id) }}" method="POST"
                    class="mt-2 d-flex flex-column flex-md-row align-items-start gap-2">
                    @csrf
                    @method('PUT')
                    <select hidden name="payment_status" class="form-select form-select-sm w-auto">
                        @foreach (['unpaid', 'paid', 'cancelled', 'refund', 'refunded'] as $ps)
                            <option value="{{ $ps }}" {{ $ps === 'refunded' ? 'selected' : '' }}>
                                {{ $paymentLabelMap[$ps] }}
                            </option>
                        @endforeach
                    </select>
                    <input type="text" name="payment_note" class="form-control form-control-sm w-50"
                        placeholder="Ghi chú thanh toán (nếu có)">
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-sync"></i> Đã hoàn tiền
                    </button>
                </form>
            @endif
            <hr class="my-3">

            {{-- Trạng thái đơn hàng: tiêu đề trái, badge phải --}}
            <div class="d-flex align-items-center justify-content-between mb-2">
                <h5 class="fw-bold mb-0">Trạng thái đơn hàng</h5>
                <span class="badge bg-{{ $statusClass[$order->status] ?? 'dark' }} p-2">
                    {{ $statusLabels[$order->status] ?? ucfirst($order->status) }}
                </span>
            </div>

            {{-- Form cập nhật trạng thái ĐƠN: ẩn nếu payment_status là refund/refunded,
                và không cho update nếu đã shipped / cancelled / completed / return_requested --}}

            @if (
                !in_array($order->payment_status, ['refund', 'refunded']) &&
                    !in_array($order->status, ['shipped', 'cancelled', 'completed', 'return_requested']))
                <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" class="mt-2">
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column flex-md-row align-items-start gap-2">
                        <select name="status" class="form-select form-select-sm w-auto">
                            @foreach ($statusOrder as $key => $status)
                                @if ($key === $currentIndex + 1 || ($status === 'cancelled' && $order->status !== 'cancelled'))
                                    <option value="{{ $status }}">{{ $statusLabels[$status] }}</option>
                                @endif
                            @endforeach
                        </select>
                        <input type="text" name="note" class="form-control form-control-sm w-50"
                            placeholder="Ghi chú (nếu có)">
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-sync"></i> Cập nhật trạng thái
                        </button>
                    </div>
                </form>
            @endif

            {{-- ====== BẮT ĐẦU: GIAO DIỆN MỚI TỪ “THÔNG TIN KHÁCH HÀNG” TRỞ XUỐNG ====== --}}

            <div class="row g-4 align-items-start mt-3">
                {{-- LEFT COLUMN --}}
                <div class="col-12 col-lg-8">

                    {{-- Thông tin khách hàng --}}
                    <div class="card border-0 shadow-sm overflow-hidden">
                        <div class="card-header bg-white d-flex align-items-center justify-content-between py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center"
                                    style="width:44px;height:44px;font-weight:700;">
                                    {{ strtoupper(mb_substr($order->user->name ?? $order->name, 0, 1)) }}
                                </div>
                                <div>
                                    <h5 class="mb-0">Thông tin khách hàng</h5>
                                    <small class="text-muted">Mã đơn #{{ $order->id }}</small>
                                </div>
                            </div>
                            <span class="badge bg-light text-dark border"><i
                                    class="fas fa-user me-2"></i>{{ $order->user->name ?? $order->name }}</span>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="text-muted small">Họ và tên</div>
                                            <div class="fw-semibold">{{ $order->user->name ?? $order->name }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="text-muted small">Email</div>
                                            <div class="fw-semibold">{{ $order->email }}</div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-secondary copy-btn"
                                            data-copy="{{ $order->email }}" data-bs-toggle="tooltip"
                                            title="Sao chép email"><i class="far fa-copy"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="text-muted small">Số điện thoại</div>
                                            <div class="fw-semibold">{{ $order->phone }}</div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-secondary copy-btn"
                                            data-copy="{{ $order->phone }}" data-bs-toggle="tooltip"
                                            title="Sao chép SĐT"><i class="far fa-copy"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="text-muted small">Thành phố</div>
                                            <div class="fw-semibold">{{ $order->city }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="pe-2">
                                            <div class="text-muted small">Địa chỉ</div>
                                            <div class="fw-semibold">{{ $order->address }}</div>
                                            <div class="small text-muted">Phường/Xã: {{ $order->ward }} · Mã bưu
                                                chính: {{ $order->postcode }}</div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-secondary copy-btn"
                                            data-copy="{{ trim($order->address . ' ' . $order->ward . ' ' . $order->city . ' ' . $order->postcode) }}"
                                            data-bs-toggle="tooltip" title="Sao chép địa chỉ"><i
                                                class="far fa-copy"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Giao hàng & Thanh toán --}}
                    <div class="row g-4 mt-1">
                        <div class="col-12 col-xl-6">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-header bg-white py-3 d-flex align-items-center gap-2">
                                    <i class="fas fa-shipping-fast text-info"></i>
                                    <h6 class="mb-0">Thông tin giao hàng</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Đơn vị giao hàng</span>
                                        <span class="fw-semibold">{{ $order->ship->name ?? '-' }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Phí giao hàng</span>
                                        <span
                                            class="fw-semibold">{{ number_format($order->shipping_fee, 0, ',', '.') }}
                                            đ</span>
                                    </div>
                                    @if ($order->shipping_discount > 0)
                                        <div class="d-flex justify-content-between">
                                            <span class="text-muted">Giảm phí vận chuyển</span>
                                            @if ($order->shipping_discount > $order->shipping_fee)
                                                <span
                                                    class="fw-semibold text-success">-{{ number_format($order->shipping_fee, 0, ',', '.') }}
                                                    đ</span>
                                            @else
                                                <span
                                                    class="fw-semibold text-success">-{{ number_format($order->shipping_discount, 0, ',', '.') }}
                                                    đ</span>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-xl-6">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-header bg-white py-3 d-flex align-items-center gap-2">
                                    <i class="fas fa-wallet text-primary"></i>
                                    <h6 class="mb-0">Thanh toán</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Phương thức</span>
                                        <span class="fw-semibold">{{ strtoupper($order->payment) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-muted">Trạng thái</span>
                                        @php
                                            $paymentBadgeClassInline = match ($order->payment_status) {
                                                'paid' => 'success',
                                                'unpaid' => 'warning',
                                                'cancelled' => 'danger',
                                                'refund' => 'info',
                                                'refunded' => 'primary',
                                                default => 'secondary',
                                            };
                                            $paymentLabelMapInline = [
                                                'paid' => 'Đã thanh toán',
                                                'unpaid' => 'Chưa thanh toán',
                                                'cancelled' => 'Đã huỷ',
                                                'refund' => 'Đang hoàn tiền',
                                                'refunded' => 'Đã hoàn tiền',
                                            ];
                                        @endphp
                                        <span
                                            class="badge bg-{{ $paymentBadgeClassInline }}">{{ $paymentLabelMapInline[$order->payment_status] ?? ucfirst($order->payment_status) }}</span>
                                    </div>
                                    @if ($order->payment_status === 'paid' && in_array($order->status, ['cancelled', 'return_requested']))
                                        @php
                                            $refundLog = $order
                                                ->orderStatusLogs()
                                                ->whereNotNull('refund_bank_account')
                                                ->orderByDesc('changed_at')
                                                ->first();
                                        @endphp
                                        @if ($refundLog && $refundLog->refund_bank_account)
                                            <hr>
                                            <div>
                                                <div class="text-muted small mb-1"><i
                                                        class="fas fa-university me-1"></i>Thông tin hoàn tiền</div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <code class="small">{{ $refundLog->refund_bank_account }}</code>
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-secondary copy-btn"
                                                        data-copy="{{ $refundLog->refund_bank_account }}">Copy</button>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Danh sách sản phẩm --}}
                    <div class="card border-0 shadow-sm mt-4" id="productTableCard">
                        <div
                            class="card-header bg-white py-3 d-flex flex-wrap gap-2 align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-box text-success"></i>
                                <h6 class="mb-0">Sản phẩm</h6>
                            </div>
                            <div class="input-group input-group-sm" style="max-width: 320px;">
                                <span class="input-group-text bg-light"><i class="fas fa-search"></i></span>
                                <input type="text" id="productFilter" class="form-control"
                                    placeholder="Tìm theo tên, ghi chú, thuộc tính...">
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0" id="productTable">
                                    <thead class="table-light position-sticky top-0" style="z-index:1;">
                                        <tr>
                                            <th class="text-nowrap">#ID</th>
                                            <th>Sản phẩm</th>
                                            <th>Ảnh</th>
                                            <th class="text-end">Giá</th>
                                            <th class="text-end">SL</th>
                                            <th>Ghi chú</th>
                                            <th>Thuộc tính</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderDetails as $i => $detail)
                                            <tr>
                                                <td class="text-muted">{{ $i + 1 }}</td>
                                                <td class="fw-semibold">{{ $detail->product->name ?? '-' }}</td>
                                                <td>
                                                    @php $img = $detail->product->image ?? null; @endphp
                                                    @if ($img)
                                                        <img src="{{ asset('storage/' . $img) }}"
                                                            alt="{{ $detail->product->name }}" width="64"
                                                            height="64" class="rounded border object-fit-cover">
                                                    @else
                                                        <div class="bg-light border rounded d-inline-flex align-items-center justify-content-center"
                                                            style="width:64px;height:64px;">
                                                            <i class="fas fa-image text-muted"></i>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="text-end">{{ number_format($detail->price, 0, ',', '.') }}
                                                    đ</td>
                                                <td class="text-end">{{ $detail->quantity }}</td>
                                                <td class="text-muted">{{ $detail->note ?? '-' }}</td>
                                                <td>
                                                    @if ($detail->variant && $detail->variant->variantAttributes->count())
                                                        @foreach ($detail->variant->variantAttributes as $attr)
                                                            <span
                                                                class="badge bg-soft-info text-dark border me-1 mb-1">
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

                    {{-- Lịch sử trạng thái (Timeline) --}}
                    @php
                        $logs = $order->orderStatusLogs()->orderByDesc('changed_at')->get();
                        $statusLabelsHistory = [
                            'pending' => 'Chờ xử lý',
                            'processing' => 'Đang xử lý',
                            'shipping' => 'Đang giao',
                            'shipped' => 'Đã giao',
                            'completed' => 'Hoàn thành',
                            'cancelled' => 'Đã huỷ',
                            'return_requested' => 'Hoàn hàng',
                            'unpaid' => 'Chưa thanh toán',
                            'paid' => 'Đã thanh toán',
                            'refund' => 'Đang hoàn tiền',
                            'refunded' => 'Đã hoàn tiền',
                        ];
                        $badgeColorsHistory = [
                            'pending' => 'secondary',
                            'processing' => 'info',
                            'shipping' => 'warning',
                            'shipped' => 'primary',
                            'completed' => 'success',
                            'cancelled' => 'danger',
                            'return_requested' => 'dark',
                            'unpaid' => 'warning',
                            'paid' => 'success',
                            'refund' => 'info',
                            'refunded' => 'primary',
                        ];
                    @endphp

                    <div class="card border-0 shadow-sm mt-4">
                        <div class="card-header bg-white py-3 d-flex align-items-center gap-2">
                            <i class="fas fa-history"></i>
                            <h6 class="mb-0">Lịch sử đơn hàng #{{ $order->id }}</h6>
                        </div>
                        <div class="card-body">
                            @if ($logs->isNotEmpty())
                                <ul class="list-unstyled timeline">
                                    @foreach ($logs as $i => $log)
                                        <li class="timeline-item mb-4">
                                            <div class="d-flex gap-3">
                                                <div
                                                    class="timeline-dot bg-{{ $badgeColorsHistory[$log->new_status] ?? 'secondary' }}">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex flex-wrap gap-2 align-items-center mb-1">
                                                        <span
                                                            class="badge bg-{{ in_array($log->old_status, ['paid', 'unpaid', 'refund', 'refunded']) ? 'info' : 'primary' }}">
                                                            {{ in_array($log->old_status, ['paid', 'unpaid', 'refund', 'refunded']) ? 'Thanh toán' : 'Đơn hàng' }}
                                                        </span>
                                                        <span
                                                            class="badge bg-light text-dark border">{{ $statusLabelsHistory[$log->old_status] ?? $log->old_status }}</span>
                                                        <i class="fas fa-arrow-right text-muted"></i>
                                                        <span
                                                            class="badge bg-{{ $badgeColorsHistory[$log->new_status] ?? 'secondary' }}">{{ $statusLabelsHistory[$log->new_status] ?? $log->new_status }}</span>
                                                        <span class="ms-auto text-muted small"><i
                                                                class="far fa-clock me-1"></i>{{ \Carbon\Carbon::parse($log->changed_at)->format('d/m/Y H:i') }}</span>
                                                    </div>
                                                    <div class="small text-muted mb-1"><i
                                                            class="far fa-user me-1"></i>{{ $log->changedBy->name ?? 'Hệ thống' }}
                                                    </div>
                                                    <div>{{ $log->note ?? '-' }}</div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted mb-0">Không có thay đổi nào được ghi nhận.</p>
                            @endif
                        </div>
                    </div>

                </div>

                {{-- RIGHT COLUMN (Sticky Summary) --}}
                <div class="col-12 col-lg-4">
                    <div class="position-sticky" style="top: 1rem;">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white py-3 d-flex align-items-center gap-2">
                                <i class="fas fa-calculator text-warning"></i>
                                <h6 class="mb-0">Tổng kết đơn hàng</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Tổng phụ</span>
                                    <span class="fw-semibold">{{ number_format($order->subtotal, 0, ',', '.') }}
                                        đ</span>
                                </div>
                                @if ($order->product_discount > 0)
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Giảm giá sản phẩm</span>
                                        <span
                                            class="fw-semibold text-success">-{{ number_format($order->product_discount, 0, ',', '.') }}
                                            đ</span>
                                    </div>
                                @endif
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Phí giao hàng</span>
                                    <span class="fw-semibold">{{ number_format($order->shipping_fee, 0, ',', '.') }}
                                        đ</span>
                                </div>
                                @if ($order->shipping_discount > 0)
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Giảm phí vận chuyển</span>
                                        @if ($order->shipping_discount > $order->shipping_fee)
                                            <span
                                                class="fw-semibold text-success">-{{ number_format($order->shipping_fee, 0, ',', '.') }}
                                                đ</span>
                                        @else
                                            <span
                                                class="fw-semibold text-success">-{{ number_format($order->shipping_discount, 0, ',', '.') }}
                                                đ</span>
                                        @endif
                                    </div>
                                @endif
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="fw-bold">Tổng thanh toán</div>
                                    <div class="fs-5 fw-bold text-danger">
                                        {{ number_format($order->total, 0, ',', '.') }} đ</div>
                                </div>
                                <div class="mt-3 d-flex gap-2">
                                    <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary w-50"><i
                                            class="fas fa-arrow-left me-2"></i>Quay lại</a>
                                    <a href="#productTableCard" class="btn btn-primary w-50"><i
                                            class="fas fa-list me-2"></i>Xem sản phẩm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- card-body --}}
    </div>

    @endsection

    <style>
        .table th,
        .table td {
            vertical-align: middle !important;
        }

        .bg-soft-info {
            background: #e8f5ff;
        }

        .timeline {
            position: relative;
            margin-left: .5rem;
        }

        .timeline:before {
            content: "";
            position: absolute;
            left: 10px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #e9ecef;
        }

        .timeline-item {
            position: relative;
        }

        .timeline-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-top: .4rem;
            box-shadow: 0 0 0 3px #fff;
        }

        .timeline-item>.d-flex>.timeline-dot {
            position: relative;
            left: -15px;
        }

        @media (max-width: 576px) {
            .position-sticky {
                position: static !important;
            }
        }
    </style>

    @push('scripts')
        {{-- SweetAlert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- Flash Message --}}
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công!',
                    text: @json(session('success')),
                    confirmButtonColor: '#3085d6',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
            </script>
        @endif

        @if (session('notification'))
            <script>
                Swal.fire({
                    icon: 'info',
                    title: 'Thông báo',
                    text: @json(session('notification')),
                    confirmButtonColor: '#3085d6',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi!',
                    text: @json(session('error')),
                    confirmButtonColor: '#d33',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
            </script>
        @endif

        {{-- Copy / Filter / Tooltip --}}
        <script>
            // Copy helper
            document.querySelectorAll('.copy-btn').forEach(btn => {
                btn.addEventListener('click', async () => {
                    try {
                        await navigator.clipboard.writeText(btn.dataset.copy || '');
                        if (window.Swal) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Đã sao chép',
                                text: btn.dataset.copy,
                                timer: 1500,
                                showConfirmButton: false,
                                toast: true,
                                position: 'top-end'
                            });
                        }
                    } catch (e) {
                        console.error(e);
                    }
                });
            });

            // Filter products
            const filterInput = document.getElementById('productFilter');
            const table = document.getElementById('productTable');
            if (filterInput && table) {
                filterInput.addEventListener('input', function() {
                    const q = this.value.toLowerCase();
                    table.querySelectorAll('tbody tr').forEach(tr => {
                        const text = tr.innerText.toLowerCase();
                        tr.style.display = text.includes(q) ? '' : 'none';
                    });
                });
            }

            // Enable tooltips if Bootstrap is available
            if (window.bootstrap) {
                document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => new bootstrap.Tooltip(el));
            }
        </script>
    @endpush
