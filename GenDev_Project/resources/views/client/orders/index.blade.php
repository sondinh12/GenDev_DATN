@extends('client.layout.master')

@section('title', 'Đơn hàng của tôi')

@section('content')
<div class="container py-5">
    <h3 class="mb-4"><i class="fa fa-box me-2 text-primary"></i>Đơn hàng của tôi</h3>

    {{-- Tabs lọc --}}
    <ul class="nav nav-tabs mb-4" role="tablist">
        @php
            $currentStatus = request('status');
            $tabs = [
                'all'              => 'Tất cả đơn',
                'pending'          => 'Chờ xác nhận',
                'processing'       => 'Đang xử lý',
                'return_requested' => 'Đã hoàn',
                'shipping'         => 'Đang giao',
                'shipped'          => 'Đã giao',
                'completed'        => 'Hoàn thành',
                'cancelled'        => 'Đã huỷ',
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
                'pending'          => 'Chờ xác nhận',
                'processing'       => 'Đang xử lý',
                'shipping'         => 'Đang giao',
                'shipped'          => 'Đã giao',
                'completed'        => 'Hoàn thành',
                'cancelled'        => 'Đã hủy',
                'return_requested' => 'Hoàn hàng',
                default            => ucfirst($status),
            };
        }
    @endphp

    @if($orders->count())
        @foreach($orders as $order)
            <div class="order-card border rounded p-3 shadow-sm mb-4 bg-white">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="fw-bold text-muted">#{{ $order->id }} • {{ $order->created_at->format('d/m/Y H:i') }}</div>

                    <div class="order-header-actions">
                        {{-- Hoàn hàng (khi đang giao) --}}
                        @if($order->status === 'shipping')
                            <button class="btn btn-warning btn-sm text-white fw-bold shadow-sm"
                                onclick="openReturnModal({{ $order->id }}, '{{ $order->payment }}', '{{ $order->payment_status }}')">
                                <i class="fas fa-undo me-1"></i> Hoàn hàng
                            </button>
                        @endif

                        {{-- Hủy đơn (khi pending) --}}
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
                            {{-- Xác nhận đã nhận hàng --}}
                            <form action="{{ route('client.orders.complete', $order->id) }}" method="POST"
                                  onsubmit="return confirm('Xác nhận đã nhận hàng?');" class="d-inline-block">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-success btn-sm fw-bold shadow-sm">
                                    <i class="fas fa-check me-1"></i> Đã nhận hàng
                                </button>
                            </form>
                        @endif

                        {{-- Badge trạng thái --}}
                        <span class="order-status {{ $order->status }}">{{ getStatusLabel($order->status) }}</span>
                    </div>
                </div>

                @php
                    // Tránh lặp form review sản phẩm giống nhau
                    $uniqueProductIds = $order->orderDetails->pluck('product_id')->unique()->toArray();
                @endphp

                @foreach($order->orderDetails->take(2) as $detail)
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="d-flex w-50">
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
                        {{-- Thông tin khách ở giữa (chỉ render một lần) --}}
                        <div style=" margin-right:200px">

                            @if ($loop->first)
                                <div class="order-customer-info mt-2 small text-muted flex-grow-1 mx-3">
                                    <strong>Người nhận:</strong> {{ $order->name }}<br>
                                    <strong>SĐT:</strong> {{ $order->phone }}<br>
                                    <strong>Địa chỉ:</strong> {{ $order->address }}, {{ $order->ward }}, {{ $order->city }}
                                </div>
                            @else
                                <div class="flex-grow-1 mx-3"></div>
                            @endif
                        </div>


                        <div class="text-end" style="min-width:120px;">
                            <div class="text-muted">x{{ $detail->quantity }}</div>
                            <div class="fw-bold">{{ number_format($detail->price, 0, ',', '.') }} đ</div>
                        </div>
                    </div>
                @endforeach

                {{-- Review sau khi đã giao/hoàn thành --}}
                @if(in_array($order->status, ['completed']) && Auth::check())
                    @foreach($uniqueProductIds as $productId)
                        @php
                            $product = \App\Models\Product::find($productId);
                            $hasReviewed = \App\Models\ProductReview::where('user_id', Auth::id())
                                        ->where('product_id', $productId)->first();
                        @endphp
                        @if($product)
                        <div class="mb-3">
                            @if($hasReviewed)
                            <div class="review-display mb-2">
                                <strong>Đánh giá của bạn:</strong>
                                <div class="star-rating-display">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $hasReviewed->rating ? 'text-warning' : 'text-muted' }}"></i>
                                    @endfor
                                </div>
                                <p class="mt-1"><small>{{ $hasReviewed->comment }}</small></p>
                                <p class="text-muted"><small>Đăng lúc: {{ $hasReviewed->created_at->format('d/m/Y H:i') }}</small></p>
                            </div>
                            @else
                            <button type="button" class="btn btn-outline-primary btn-sm toggle-review-form" data-product-id="{{ $productId }}">
                                Đánh giá sản phẩm: {{ $product->name }}
                            </button>

                            <form action="{{ route('product.review.store', $productId) }}" method="POST" class="review-form mt-3 d-none" id="review-form-{{ $productId }}">
                                @csrf
                                <div class="mb-3" data-product-id="{{ $productId }}">
                                    @for($i = 1; $i <= 5; $i++)
                                        <input type="radio" name="rating" id="rating-{{ $productId }}-{{ $i }}" value="{{ $i }}" class="star-input">
                                        <label for="rating-{{ $productId }}-{{ $i }}" class="star-label">
                                            <i class="fas fa-star"></i>
                                        </label>
                                    @endfor
                                    @error('rating')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <textarea name="comment" class="form-control" rows="3" placeholder="Viết bình luận của bạn..." required>{{ old('comment') }}</textarea>
                                    @error('comment')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Gửi đánh giá</button>
                            </form>
                            @endif
                        </div>
                        @endif
                    @endforeach
                @endif

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

                    <div class="d-flex gap-2">
                        @if($order->payment === 'banking' && $order->status === 'pending' && $order->payment_status === 'unpaid')
                            <a href="{{ route('order.retry', $order->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-redo-alt me-1"></i> Thanh toán tiếp
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

<!-- Modal hoàn hàng / hoàn tiền -->
<div class="modal fade" id="returnModal" tabindex="-1" aria-labelledby="returnModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="returnForm">
            @csrf
            @method('PUT')
            <input type="hidden" name="order_id" id="returnOrderId">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="returnModalLabel">Lý do</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label=""></button> --}}
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
    .order-card {
        transition: all 0.2s ease;
    }

    .order-card:hover {
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.05);
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

    .order-status.cancelled {
        background-color: #eb5757;
        color: #fff;
    }

    .order-status.pending {
        background-color: #f5c542;
        color: #333;
    }

    .order-status.processing {
        background-color: #2d9cdb;
        color: #fff;
    }

    .order-status.shipping {
        background-color: #ff9800;
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

    .order-status.return_requested {
        background-color: #6c757d;
        color: #fff;
    }

    .star-rating {
        display: inline-flex;
        justify-content: flex-start;
        align-items: center;
        gap: 5px;
        font-size: 1.6rem;
    }

    .star-input {
        display: none;
    }

    .star-label {
        cursor: pointer;
        color: #ccc;
        transition: color 0.2s ease;
    }

    .star-input:checked +.star-label {
        color: #FFC107 !important;
    }

    .star-label.active {
        color: #FFC107 !important;
    }

    .star-rating-display .fas {
        font-size: 1.2rem;
    }

    .star-rating-display .text-warning {
        color: #FFC107;
    }

    .star-rating-display .text-muted {
        color: #ccc;
    }

    .review-form {
        padding: 15px;
        border-left: 3px solid #e0e0e0;
        background-color: #f8f9fa;
        border-radius: 8px;
        margin-top: 10px;
    }

    .toggle-review-form {
        margin-top: 10px;
    }

    .review-display {
        padding: 10px;
        background-color: #f1f1f1;
        border-radius: 5px;
    }
    .order-customer-info {
    background-color: #f8f9fa;
    padding: 10px 12px;
    border-left: 3px solid #0d6efd;
    border-radius: 5px;
    font-size: 0.9rem;
    line-height: 1.6;
    color: #555;
    min-width: 220px;
    flex: 1;
}

.flex-grow-1.mx-3 {
    min-width: 220px; /* giữ chiều ngang khi không hiển thị thông tin */
}

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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- CHỈ nạp 1 lần bootstrap.bundle (đừng nạp file JS bootstrap khác ở layout) --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  // Helper: đảm bảo PUT method cho form modal
  function ensurePutMethod($form){
    const $m = $form.find('input[name="_method"]');
    if ($m.length) $m.val('PUT');
    else $('<input>', {type:'hidden', name:'_method', value:'PUT'}).appendTo($form);
  }

  // GLOBAL: mở modal Hoàn hàng
  window.openReturnModal = function(orderId, paymentMethod, paymentStatus){
    $('#returnOrderId').val(orderId);

    if (paymentMethod === 'banking' && paymentStatus === 'paid') {
      $('#bankInfo').removeClass('d-none');
    } else {
      $('#bankInfo').addClass('d-none');
      $('#bank_account').val('');
    }
        // Star rating functionality
    $('.review-form').each(function() {
            const $form = $(this);
            const $stars = $form.find('.star-label');
            const $inputs = $form.find('.star-input');

            $stars.on('click', function() {
                const idx = $stars.index(this);
                $inputs.prop('checked', false);
                $inputs.eq(idx).prop('checked', true);
                $stars.removeClass('active');
                // Chỉ active các sao từ 0 đến idx
                $stars.each(function(i) {
                    if (i <= idx) {
                        $(this).addClass('active');
                    } else {
                        $(this).removeClass('active');
                    }
                });
            });
            // Khi load lại form, hiển thị các sao đã chọn
            var checkedIdx = $inputs.index($inputs.filter(':checked'));
            $stars.removeClass('active');
            $stars.each(function(i) {
                if (i <= checkedIdx) {
                    $(this).addClass('active');
                }
            });
    });
    $('#reason').val('');
    const $form = $('#returnForm');
    $form.attr('action', `/orders/${orderId}/return`);
    ensurePutMethod($form);

    const modal = new bootstrap.Modal(document.getElementById('returnModal'));
    modal.show();
  }

  // GLOBAL: mở modal Hủy đơn (yêu cầu STK nếu banking đã paid)
  window.openCancelModal = function(orderId, paymentMethod, paymentStatus){
    $('#returnOrderId').val(orderId);
    $('#reason').val('');


    // Hủy đơn đã thanh toán banking: bắt nhập STK để hoàn tiền
    $('#bankInfo').removeClass('d-none');

    const $form = $('#returnForm');
    $form.attr('action', `/orders/${orderId}/cancel`);
    ensurePutMethod($form);

    const modal = new bootstrap.Modal(document.getElementById('returnModal'));
    modal.show();
  }

  // Toggle review form
  $(document).on('click', '.toggle-review-form', function(){
    const productId = $(this).data('product-id');
    $(`#review-form-${productId}`).toggleClass('d-none');
  });

    // Chọn sao rating
    $(document).on('click', '.star-label', function(){
        const $form = $(this).closest('.review-form');
        const $labels = $form.find('.star-label');
        const $inputs = $form.find('.star-input');
        const idx = $labels.index(this);

        $labels.removeClass('active');
        $inputs.prop('checked', false);

        $labels.each(function(i) {
            if (i <= idx) {
                $(this).addClass('active');
            }
        });
        $inputs.eq(idx).prop('checked', true);
    });

  // Submit review (AJAX optional — có thể để form post thường)
  $(document).on('submit', '.review-form', function(e){
    e.preventDefault();
    const $form = $(this);
    const rating = $form.find('input[name="rating"]:checked').val();
    const comment = $form.find('textarea[name="comment"]').val().trim();

    if (!rating) {
      Swal.fire({icon:'warning', title:'Vui lòng chọn số sao!', showConfirmButton:false, timer:1500});
      return false;
    }
    if (!comment) {
      Swal.fire({icon:'warning', title:'Vui lòng viết bình luận!', showConfirmButton:false, timer:1500});
      return false;
    }

    $.post($form.attr('action'), $form.serialize())
      .done(() => {
        Swal.fire({icon:'success', title:'Đánh giá thành công!', showConfirmButton:false, timer:1500})
          .then(() => location.reload());
      })
      .fail(() => {
        Swal.fire({icon:'error', title:'Đã có lỗi xảy ra!', showConfirmButton:false, timer:1500});
      });
  });
</script>
@endpush