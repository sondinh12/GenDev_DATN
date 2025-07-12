@extends('client.layout.master')

@section('styles')
<style>
    .gallery-nav-btn {
        background: rgba(255, 255, 255, 0.9);
        border: none;
        padding: 8px 12px;
        transition: all 0.3s;
    }

    .gallery-nav-btn:hover {
        background: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .gallery-thumb:hover {
        box-shadow: 0 0 0 2px #007bff !important;
    }

    .gallery-fade {
        opacity: 1;
        transition: opacity 0.3s ease;
    }
</style>
@endsection

@section('content')
@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show fixed-top m-3 shadow" role="alert" style="z-index: 1050;">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Đóng">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div id="content" class="site-content py-4" tabindex="-1" style="min-height: 100vh;" data-gallery-images="{{ json_encode($galleryImageUrls) }}">
    <div class="container-fluid px-0">
        <nav class="woocommerce-breadcrumb mb-4 text-center">
            <a href="/">Trang chủ</a>
            <span class="delimiter mx-2"><i class="tm tm-breadcrumbs-arrow-right"></i></span>
            <a href="#">{{ $product->category->name ?? 'Danh mục' }}</a>
            <span class="delimiter mx-2"><i class="tm tm-breadcrumbs-arrow-right"></i></span>
            <span class="fw-semibold">{{ $product->name }}</span>
        </nav>
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10 mx-auto">
                <div class="card shadow-lg rounded-4 overflow-hidden mb-5 w-100" style="max-width: 1200px; margin: 0 auto;">
                    <div class="row g-0">
                        <div class="col-md-5 bg-light d-flex flex-column align-items-center justify-content-center p-4" style="min-height: 400px;">
                            <div class="w-100 d-flex flex-column align-items-center justify-content-center mb-3 position-relative" style="min-height: 320px;">
                                <img id="mainProductImg" src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded-4 main-product-img gallery-fade mx-auto d-block" alt="{{ $product->name }}" style="max-height:320px; object-fit:contain;">
                                <div class="d-flex justify-content-between align-items-center w-100 mt-2" style="max-width: 320px;">
                                    <button id="galleryPrevBtn" type="button" class="btn btn-outline-primary gallery-nav-btn me-2"><i class="fas fa-chevron-left"></i></button>
                                    <div class="d-flex gap-2 justify-content-center overflow-auto flex-nowrap gallery-slider">
                                        <img src="{{ asset('storage/' . $product->image) }}" class="rounded border gallery-thumb" style="width:60px; height:60px; object-fit:cover; cursor:pointer; transition: box-shadow 0.2s;" data-index="0">
                                        @if($product->galleries && count($product->galleries))
                                        @foreach($product->galleries as $k => $img)
                                        <img src="{{ asset('storage/' . $img->image) }}" class="rounded border gallery-thumb" style="width:60px; height:60px; object-fit:cover; cursor:pointer; transition: box-shadow 0.2s;" data-index="{{ $k+1 }}">
                                        @endforeach
                                        @endif
                                    </div>
                                    <button id="galleryNextBtn" type="button" class="btn btn-outline-primary gallery-nav-btn ms-2"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 p-4">
                            <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2">
                                <h1 class="h3 fw-bold text-primary mb-0">{{ $product->name }}</h1>
                                <button id="favorite-btn" class="btn rounded-circle p-2 ms-1 bg-white" type="button" title="Yêu thích" style="font-size: 1.5rem; transition: background 0.2s;">
                                    <i id="favorite-icon" class="fas fa-heart" style="color: #e53935; transition: color 0.2s;"></i>
                                </button>
                            </div>
                            <div class="d-flex align-items-center mb-3 gap-2 border-bottom pb-2">
                                @php
                                $avgRating = round($product->reviews()->avg('rating'), 1);
                                $reviewCount = $product->reviews()->count();
                                @endphp
                                <div class="product-rating text-warning small">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <=floor($avgRating))
                                        <i class="fas fa-star"></i>
                                        @elseif($i - $avgRating < 1)
                                            <i class="fas fa-star-half-alt"></i>
                                            @else
                                            <i class="far fa-star"></i>
                                            @endif
                                            @endfor
                                            <span class="text-muted ms-1">({{ $avgRating }} / {{ $reviewCount }} đánh giá)</span>
                                </div>
                            </div>
                            <div class="mb-3 border-bottom pb-2">
                                <span id="variant-origin-price" class="text-muted text-decoration-line-through ms-3" style="display:none; text-decoration: line-through;">
                                    {{-- Sẽ được cập nhật động bằng JS --}}
                                </span>
                                <span id="variant-sale-price" class="fs-2 fw-bold text-danger">
                                    @php
                                    $min = null; $max = null;
                                    if(count($product->variants)) {
                                    foreach($product->variants as $v) {
                                    $sale = $v->sale_price ?? $v->price;
                                    if($min === null || $sale < $min) $min=$sale;
                                        if($max===null || $sale> $max) $max = $sale;
                                        }
                                        }
                                        @endphp
                                        @if(count($product->variants))
                                        @if($min == $max)
                                        {{ number_format($min) }}đ
                                        @else
                                        {{ number_format($min) }}đ - {{ number_format($max) }}đ
                                        @endif
                                        @else
                                        @if($product->sale_price)
                                        {{ number_format($product->sale_price) }}đ
                                        @else
                                        {{ number_format($product->price) }}đ
                                        @endif
                                        @endif
                                </span>
                            </div>
                            <div class="mb-3 text-secondary fs-5 border-bottom pb-2">
                                <span class="fw-semibold">Mô tả:</span>
                                <div class="bg-light rounded-3 p-3 mt-2">{!! $product->description !!}</div>
                            </div>
                            <div class="mb-3 small text-muted border-bottom pb-2">
                                <span>Danh mục: <b>{{ $product->category->name ?? '' }}</b></span>
                                <br>
                                <span class="ms-3">Tình trạng: <span id="variant-status" class="badge {{ $product->status == 1 ? 'bg-success' : 'bg-danger' }}">{{ $product->status == 1 ? 'Còn hàng' : 'Hết hàng' }}</span></span>
                            </div>
                            <div class="mb-3 text-secondary fs-5 border-bottom pb-2">
                                <span class="fw-semibold">Số lượng còn lại:</span>
                                <span id="variant-quantity" class="fw-bold text-primary">
                                    @if(count($product->variants))
                                    --
                                    @else
                                    {{ $product->quantity ?? 0 }}
                                    @endif
                                </span>
                            </div>
                            <form method="POST" action="{{ route('cart-detail') }}" class="mt-3">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                @php
                                $attributes = [];
                                $variantMap = [];
                                foreach ($product->variants as $variant) {
                                $variantKey = [];
                                foreach ($variant->variantAttributes as $variantAttr) {
                                $attrName = $variantAttr->attribute->name;
                                $attrValue = $variantAttr->value->value;
                                $attrId = $variantAttr->attribute->id;
                                $valId = $variantAttr->value->id;
                                $attributes[$attrName]['id'] = $attrId;
                                $attributes[$attrName]['values'][$valId] = $attrValue;
                                $variantKey[$attrId] = $valId;
                                }
                                ksort($variantKey);
                                $key = implode('-', array_map(function($k, $v) { return $k.':'.$v; }, array_keys($variantKey), $variantKey));
                                $variantMap[$key] = [
                                'price' => $variant->sale_price ?? $variant->price,
                                'origin_price' => $variant->price,
                                'quantity' => $variant->quantity,
                                ];
                                }
                                $attributes = array_slice($attributes, 0, 2, true);
                                @endphp
                                <div class="row">
                                    @foreach($attributes as $attrName => $attr)
                                    <div class="col-12 col-md-6 mb-2">
                                        <label class="form-label fw-semibold">{{ $attrName }}</label>
                                        <select name="attribute[{{ $attr['id'] }}]" class="form-select variant-select" data-attr-id="{{ $attr['id'] }}">
                                            <option value="" disabled selected>-- Chọn {{ $attrName }} --</option>
                                            @foreach($attr['values'] as $valId => $val)
                                            <option value="{{ $valId }}">{{ $val }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="d-flex gap-2 mt-3">
                                    <button id="add-to-cart-btn" class="btn btn-primary btn-lg rounded-pill px-4 fw-semibold shadow flex-grow-1" type="submit"><i class="fas fa-shopping-cart me-1"></i>Thêm vào giỏ</button>
                                    <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg rounded-pill px-4 fw-semibold shadow-sm flex-grow-1">
                                        <i class="fas fa-arrow-left me-1"></i>Quay lại
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Đánh giá sản phẩm --}}
    <div class="container-lg px-0">
        <div class="review-card card mb-5 mt-4 shadow rounded-4 border-0 mx-auto" style="max-width: 1200px;">
            <div class="card-header bg-gradient text-white fw-bold py-3 rounded-top-4" style="background: linear-gradient(45deg, #2196F3, #00BCD4); font-size: 1.2rem; letter-spacing: 1px;">
                <i class="fas fa-star text-warning me-2"></i>Đánh giá sản phẩm
            </div>
            <div class="card-body p-4">
@auth
    @php
        $userReviewCount = 0;
        if(auth()->check()) {
            $userReviewCount = $product->reviews()->where('user_id', auth()->id())->count();
        }
    @endphp
    @if(!empty($canReview) && $canReview)
        @if($userReviewCount < 2)
            <form method="POST" action="{{ route('product.review.store', $product->id) }}" class="row g-3 align-items-end mb-4">
                @csrf
                <div class="col-12 col-md-4 text-center">
                    <label class="form-label fw-semibold mb-2">Số sao</label>
                    <div id="star-rating" class="d-inline-block">
                        @for($i=1; $i<=5; $i++)
                            <i class="fas fa-star star-select text-secondary" data-value="{{ $i }}" style="font-size:2rem; cursor:pointer; margin:0 2px;"></i>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="rating-value" value="5" required>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold">Bình luận</label>
                    <textarea name="comment" class="form-control form-control-lg" rows="2" maxlength="50" placeholder="Nhập bình luận..." style="border-radius: 1rem;"></textarea>
                </div>
                <div class="col-12 col-md-2 text-end">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-4 fw-bold shadow">Gửi đánh giá</button>
                </div>
            </form>
        @else
            <div class="alert alert-warning mb-4">Bạn đã đánh giá sản phẩm này tối đa 2 lần.</div>
        @endif
    @else
        <div class="alert alert-warning mb-4">Bạn cần mua sản phẩm này thành công để có thể đánh giá.</div>
    @endif
                @else
                <div class="alert alert-info mb-4">Vui lòng <a href="{{ route('login') }}">đăng nhập</a> để đánh giá sản phẩm.</div>
                @endauth
                <h6 class="fw-bold mb-3 mt-2"><i class="fas fa-comments text-primary me-2"></i>Các đánh giá gần đây</h6>
                @php $reviews = $product->reviews()->with('user')->latest()->take(5)->get(); @endphp
                <div class="row g-3">
                    @forelse($reviews as $review)
                    <div class="col-12 col-md-6">
                        <div class="review-item p-3 rounded-4 bg-light border-0 shadow-sm h-100">
                            <div class="d-flex align-items-center mb-2">
                                <span class="fw-bold me-2 text-dark" style="font-size:1.1rem;">{{ $review->user->name ?? 'Ẩn danh' }}</span>
                                <span class="review-stars text-warning fs-5">
                                    @for($i=1; $i<=5; $i++)
                                        @if($i <=$review->rating)
                                        <i class="fas fa-star"></i>
                                        @else
                                        <i class="far fa-star"></i>
                                        @endif
                                        @endfor
                                </span>
                                <span class="ms-2 text-muted small">{{ $review->created_at->format('d/m/Y H:i') }}</span>
                            </div>
                            <div class="review-comment text-secondary" style="font-size:1rem;">{{ $review->comment }}</div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="text-muted">Chưa có đánh giá nào.</div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- Sản phẩm liên quan --}}
    @if(isset($relatedProducts) && count($relatedProducts))
    <div class="container-fluid mt-5 px-0">
        <h4 class="mb-4 fw-bold text-primary text-center">Sản phẩm liên quan</h4>
        <div class="row g-4 justify-content-center">
            @foreach($relatedProducts as $item)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
                <div class="card related-card shadow-sm h-100 border-0 w-100">
                    <a href="{{ route('product.show', $item->id) }}" class="text-decoration-none">
                        <div class="related-img-wrapper d-flex align-items-center justify-content-center" style="height:170px;">
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top rounded-3 related-img" alt="{{ $item->name }}">
                        </div>
                    </a>
                    <div class="card-body p-3 d-flex flex-column">
                        <h6 class="card-title mb-2 text-truncate fw-bold text-dark">{{ $item->name }}</h6>
                        @php
                        $min = null; $max = null;
                        if(count($item->variants ?? [])) {
                        foreach($item->variants as $v) {
                        $sale = $v->sale_price ?? $v->price;
                        if($min === null || $sale < $min) $min=$sale;
                            if($max===null || $sale> $max) $max = $sale;
                            }
                            }
                            @endphp
                            <div class="text-danger fw-bold mb-2 fs-5">
                                @if(count($item->variants ?? []))
                                @if($min == $max)
                                {{ number_format($min) }}đ
                                @else
                                {{ number_format($min) }}đ - {{ number_format($max) }}đ
                                @endif
                                @else
                                {{ number_format($item->sale_price ?: $item->price) }}đ
                                @endif
                            </div>
                            <a href="{{ route('product.show', $item->id) }}" class="btn btn-outline-primary btn-sm rounded-pill mt-auto">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
    @endif
</div>
<style>
    .star-select {
        transition: color 0.2s;
    }

    .star-select.selected,
    .star-select.hovered {
        color: #FFC107 !important;
        text-shadow: 0 2px 8px rgba(255, 193, 7, 0.15);
    }

    .review-card {
        border-radius: 1.2rem !important;
    }

    .review-card .card-header {
        border-radius: 1.2rem 1.2rem 0 0 !important;
    }

    .review-item {
        border-radius: 1rem !important;
        background: #f8fafc;
        box-shadow: 0 2px 12px rgba(33, 150, 243, 0.07);
    }

    .review-stars i {
        font-size: 1.3rem;
        margin-right: 2px;
    }

    .review-comment {
        background: #fff;
        border-radius: 0.7rem;
        padding: 0.7rem 1rem;
        margin-top: 0.5rem;
        box-shadow: 0 1px 4px rgba(33, 150, 243, 0.05);
    }

    @media (max-width: 767px) {
        .review-card .card-body {
            padding: 1rem !important;
        }

        .review-item {
            padding: 1rem !important;
        }

        .review-comment {
            font-size: 0.95rem;
            padding: 0.5rem 0.7rem;
        }
    }

    body {
        background: linear-gradient(120deg, #f8fafc 60%, #e3f2fd 100%) !important;
        min-height: 100vh;
    }

    .text-primary {
        color: #2196F3 !important;
    }

    .btn-primary {
        background: linear-gradient(45deg, #2196F3, #00BCD4);
        border: none;
        box-shadow: 0 4px 16px rgba(33, 150, 243, 0.15);
        transition: background 0.3s, box-shadow 0.3s;
    }

    .btn-primary:hover {
        background: linear-gradient(45deg, #1976D2, #0097A7);
        box-shadow: 0 6px 24px rgba(33, 150, 243, 0.25);
    }

    .main-product-img:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 32px rgba(33, 150, 243, 0.12);
    }

    .gallery-thumb:hover {
        box-shadow: 0 0 0 2px #2196F3;
    }

    .bg-white {
        background: #fff !important;
    }

    .shadow,
    .shadow-sm {
        box-shadow: 0 2px 16px rgba(33, 150, 243, 0.07) !important;
    }

    .bg-white>.border-bottom:not(:last-child) {
        border-color: #e3f2fd !important;
    }

    #favorite-btn {
        margin-left: 0.5rem !important;
        background: #fff;
        border: 2px solid #222 !important;
        box-shadow: 0 2px 8px rgba(33, 33, 33, 0.08);
    }

    #favorite-btn .fa-heart {
        color: #e53935;
        text-shadow: none;
    }

    #favorite-btn.active {
        background: #e53935 !important;
        border-color: #e53935 !important;
    }

    #favorite-btn.active .fa-heart {
        color: #fff;
        text-shadow: none;
    }

    @media (max-width: 767px) {
        .main-img-wrapper {
            margin-bottom: 1rem;
        }

        .gallery-slider {
            gap: 0.5rem;
        }

        .rounded-4 {
            border-radius: 1rem !important;
        }

        .p-4 {
            padding: 1.5rem !important;
        }

        .card.shadow-lg {
            max-width: 100% !important;
        }
    }

    .gallery-fade {
        opacity: 1;
        transition: opacity 0.4s;
    }

    .gallery-slider img.gallery-thumb {
        transition: box-shadow 0.2s, border 0.2s;
    }

    .gallery-slider img.gallery-thumb:hover {
        box-shadow: 0 0 0 2px #2196F3;
        border-color: #2196F3;
    }

    .gallery-nav-btn {
        background: #fff;
        border: 1px solid #2196F3;
        color: #2196F3;
        padding: 6px 14px;
        border-radius: 50%;
        font-size: 1.2rem;
        box-shadow: 0 2px 8px rgba(33, 150, 243, 0.08);
        transition: background 0.2s, color 0.2s, box-shadow 0.2s;
    }

    .gallery-nav-btn:hover,
    .gallery-nav-btn:focus {
        background: #2196F3;
        color: #fff;
        box-shadow: 0 4px 16px rgba(33, 150, 243, 0.16);
    }

    .main-product-img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    /* Sản phẩm liên quan */
    .related-card {
        transition: transform 0.2s, box-shadow 0.2s;
        border-radius: 1rem !important;
        background: #f8fafc;
    }

    .related-card:hover {
        transform: translateY(-6px) scale(1.03);
        box-shadow: 0 8px 32px rgba(33, 150, 243, 0.18) !important;
        background: #e3f2fd;
    }

    .related-img-wrapper {
        background: #fff;
        border-radius: 1rem 1rem 0 0;
        overflow: hidden;
    }

    .related-img {
        max-height: 150px;
        object-fit: contain;
        transition: transform 0.2s;
    }

    .related-card:hover .related-img {
        transform: scale(1.08);
    }

    .card-title {
        font-size: 1rem;
    }
</style>
@endsection

@section('scripts')
@parent
<script>
    $(function() {
        var $mainImg = $('#mainProductImg');
        var $thumbs = $('.gallery-thumb');
        var currentImgIndex = 0;
        var totalImages = $thumbs.length;

        function setActiveThumb(index) {
            $thumbs.each(function(i) {
                if (i === index) {
                    $(this).css('box-shadow', '0 0 0 2px #007bff');
                } else {
                    $(this).css('box-shadow', 'none');
                }
            });
        }

        function updateMainImage() {
            $mainImg.stop(true).animate({
                opacity: 0
            }, 150, function() {
                $mainImg.attr('src', $thumbs.eq(currentImgIndex).attr('src'));
                $mainImg.animate({
                    opacity: 1
                }, 150);
                setActiveThumb(currentImgIndex);
            });
        }

        $('#galleryPrevBtn').on('click', function() {
            currentImgIndex = (currentImgIndex - 1 + totalImages) % totalImages;
            updateMainImage();
        });
        $('#galleryNextBtn').on('click', function() {
            currentImgIndex = (currentImgIndex + 1) % totalImages;
            updateMainImage();
        });
        $thumbs.each(function(index) {
            $(this).on('click', function() {
                currentImgIndex = index;
                updateMainImage();
            });
        });
        setActiveThumb(currentImgIndex);
        updateMainImage();

        // Variant price/quantity logic
        var variantMap = @json($variantMap);

        function getSelectedKey() {
            var key = [];
            $('.variant-select').each(function() {
                var attrId = $(this).data('attr-id');
                var valId = $(this).val();
                key.push(attrId + ':' + valId);
            });
            key.sort();
            return key.join('-');
        }

        function allAttrSelected() {
            var allSelected = true;
            $('.variant-select').each(function() {
                if (!$(this).val()) {
                    allSelected = false;
                }
            });
            return allSelected;
        }

        function updateVariantInfo() {
            if (allAttrSelected()) {
                var key = getSelectedKey();
                var info = variantMap[key];
                if (info) {
                    if (info.price != info.origin_price) {
                        $('#variant-origin-price').text(info.origin_price.toLocaleString('vi-VN') + 'đ').show();
                    } else {
                        $('#variant-origin-price').hide();
                    }
                    $('#variant-sale-price').text(info.price.toLocaleString('vi-VN') + 'đ');
                    $('#variant-quantity').text(info.quantity);

                    // Tình trạng và nút thêm vào giỏ
                    if (info.quantity > 0) {
                        $('#variant-status').removeClass('bg-danger').addClass('bg-success').text('Còn hàng');
                        $('#add-to-cart-btn').removeClass('btn-secondary').addClass('btn-primary').prop('disabled', false);
                    } else {
                        $('#variant-status').removeClass('bg-success').addClass('bg-danger').text('Hết hàng');
                        $('#add-to-cart-btn').removeClass('btn-primary').addClass('btn-secondary').prop('disabled', true);
                    }
                }
            } else {
                // Nếu chưa chọn đủ thuộc tính, reset trạng thái
                $('#variant-quantity').text('--');
                $('#variant-status').removeClass('bg-danger').addClass('bg-success').text('Còn hàng');
                $('#add-to-cart-btn').removeClass('btn-secondary').addClass('btn-primary').prop('disabled', false);
            }
        }
        $('.variant-select').on('change', updateVariantInfo);
        updateVariantInfo();

        // Star rating JS
        var $stars = $('#star-rating .star-select');
        var $ratingInput = $('#rating-value');
        var selected = parseInt($ratingInput.val()) || 5;

        function updateStars(val) {
            $stars.each(function(i) {
                if (i < val) {
                    $(this).addClass('selected');
                } else {
                    $(this).removeClass('selected');
                }
            });
        }
        $stars.on('mouseenter', function() {
            var val = parseInt($(this).data('value'));
            $stars.each(function(i) {
                if (i < val) {
                    $(this).addClass('hovered');
                } else {
                    $(this).removeClass('hovered');
                }
            });
        }).on('mouseleave', function() {
            $stars.removeClass('hovered');
        });
        $stars.on('click', function() {
            var val = parseInt($(this).data('value'));
            selected = val;
            $ratingInput.val(val);
            updateStars(val);
        });
        updateStars(selected);
    });
</script>
@endsection