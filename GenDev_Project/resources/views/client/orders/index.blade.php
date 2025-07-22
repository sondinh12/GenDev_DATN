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
                'shipping' => 'Đang giao',
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

    @php
        function getStatusLabel($status) {
            return match($status) {
                'pending' => 'Chờ xác nhận',
                'processing' => 'Đang xử lý',
                'shipping' => 'Đang giao',
                'shipped' => 'Đã giao',
                'completed' => 'Hoàn thành',
                'cancelled' => 'Đã hủy',
                'return_requested' => 'Yêu cầu hoàn hàng',
                default => ucfirst($status),
            };
        }
    @endphp

    @if($orders->count())
        @foreach($orders as $order)
        <div class="order-card border rounded p-3 shadow-sm mb-4 bg-white">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="fw-bold text-muted">#{{ $order->id }} • {{ $order->created_at->format('d/m/Y H:i') }}</div>
<div class="order-header-actions">
    @if($order->status === 'shipping')
        <button class="btn btn-warning btn-sm text-white fw-bold shadow-sm"
                onclick="openReturnModal({{ $order->id }}, '{{ $order->payment }}', '{{ $order->payment_status }}')">
            <i class="fas fa-undo me-1"></i> Hoàn hàng
        </button>
    @endif

    @if($order->status === 'pending')
        @if($order->payment === 'banking' && $order->payment_status === 'paid')
            <button class="btn btn-danger btn-sm fw-bold shadow-sm"
                    onclick="openCancelModal({{ $order->id }}, '{{ $order->payment }}', '{{ $order->payment_status }}')">
                <i class="fas fa-times me-1"></i> Hủy đơn
            </button>
        @else
            <form action="{{ route('client.orders.cancel', $order->id) }}" method="POST"
                  onsubmit="return confirm('Bạn có chắc muốn hủy đơn hàng này không?');" class="d-inline-block">
                @csrf
                @method('PUT')
                <button class="btn btn-danger btn-sm fw-bold shadow-sm">
                    <i class="fas fa-times me-1"></i> Hủy đơn
                </button>
            </form>
        @endif
    @elseif($order->status === 'shipped')
        <form action="{{ route('client.orders.complete', $order->id) }}" method="POST"
              onsubmit="return confirm('Xác nhận đã nhận hàng?');" class="d-inline-block">
            @csrf
            @method('PUT')
            <button class="btn btn-success btn-sm fw-bold shadow-sm">
                <i class="fas fa-check me-1"></i> Đã nhận hàng
            </button>
        </form>
    @endif

    {{-- Trạng thái hiển thị sau cùng --}}
    <span class="order-status {{ $order->status }}">{{ getStatusLabel($order->status) }}</span>
</div>

            </div>

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

            @if($order->orderDetails->count() > 2)
            <div class="text-end mb-3">
                <a href="{{ route('client.orders.show', $order->id) }}" class="text-decoration-none small">
                    Xem thêm {{ $order->orderDetails->count() - 2 }} sản phẩm...
                </a>
            </div>
            @endif

            <div class="d-flex justify-content-between align-items-center border-top pt-3 mt-2">
                <div class="fw-bold text-muted">
                    Tổng tiền:
                    <span class="text-danger fs-5">
                        {{ number_format($order->total, 0, ',', '.') }} đ
                    </span>
                </div>
                <a href="{{ route('client.orders.show', $order->id) }}" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
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

<!-- Modal hoàn hàng / hoàn tiền -->
<div class="modal fade" id="returnModal" tabindex="-1" aria-labelledby="returnModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="returnForm">
            @csrf
            <input type="hidden" name="order_id" id="returnOrderId">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="returnModalLabel">Lý do</h5>
                    {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Đóng"></button> --}}
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="reason" class="form-label">Lý do</label>
                        <textarea name="reason" id="reason" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3 d-none" id="bankInfo">
                        <label for="bank_account" class="form-label">Số tài khoản nhận hoàn tiền</label>
                        <input type="text" name="bank_account" id="bank_account" class="form-control" placeholder="Ví dụ: 123456789 - Vietcombank">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
.order-card { transition: all 0.2s ease; }
.order-card:hover { box-shadow: 0 0 12px rgba(0,0,0,0.05); }
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
.order-header-actions {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
    justify-content: flex-end;
}

.order-header-actions form,
.order-header-actions button {
    margin: 0;
}

.order-header-actions .btn {
    font-weight: 600;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.06);
    padding: 4px 10px;
}

.order-status {
    margin-left: 0 !important;
}

.order-status.cancelled { background-color: #eb5757; color: #fff; }
.order-status.pending { background-color: #f5c542; color: #333; }
.order-status.processing { background-color: #2d9cdb; color: #fff; }
.order-status.shipping { background-color: #ff9800; color: #fff; }
.order-status.shipped { background-color: #9b51e0; color: #fff; }
.order-status.completed { background-color: #27ae60; color: #fff; }
.order-status.return_requested { background-color: #6c757d; color: #fff; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
function openReturnModal(orderId, paymentMethod, paymentStatus) {
    document.getElementById('returnOrderId').value = orderId;
    const bankField = document.getElementById('bankInfo');
    if (paymentMethod === 'banking' && paymentStatus === 'paid') {
        bankField.classList.remove('d-none');
    } else {
        bankField.classList.add('d-none');
    }
    document.getElementById('reason').value = '';
    const form = document.getElementById('returnForm');
    form.action = `/orders/${orderId}/return`;
    const methodInput = form.querySelector('input[name="_method"]');
    if (methodInput) methodInput.value = 'PUT';
    else {
        const hidden = document.createElement('input');
        hidden.type = 'hidden';
        hidden.name = '_method';
        hidden.value = 'PUT';
        form.appendChild(hidden);
    }
    new bootstrap.Modal(document.getElementById('returnModal')).show();
}

function openCancelModal(orderId, paymentMethod, paymentStatus) {
    document.getElementById('returnOrderId').value = orderId;
    document.getElementById('reason').value = '';
    const bankField = document.getElementById('bankInfo');
    bankField.classList.remove('d-none');
    const form = document.getElementById('returnForm');
    form.action = `/orders/${orderId}/cancel`;
    const methodInput = form.querySelector('input[name="_method"]');
    if (methodInput) methodInput.value = 'PUT';
    else {
        const hidden = document.createElement('input');
        hidden.type = 'hidden';
        hidden.name = '_method';
        hidden.value = 'PUT';
        form.appendChild(hidden);
    }
    new bootstrap.Modal(document.getElementById('returnModal')).show();
}
</script>
@endpush
