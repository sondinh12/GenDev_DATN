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
<div id="content" class="site-content py-4" tabindex="-1" style="background: linear-gradient(120deg, #f8fafc 60%, #e3f2fd 100%); min-height: 100vh;" data-gallery-images="{{ json_encode($galleryImageUrls) }}">
    <div class="container">
        <nav class="woocommerce-breadcrumb mb-4">
            <a href="/">Trang chủ</a>
            <span class="delimiter mx-2"><i class="tm tm-breadcrumbs-arrow-right"></i></span>
            <a href="#">{{ $product->category->name ?? 'Danh mục' }}</a>
            <span class="delimiter mx-2"><i class="tm tm-breadcrumbs-arrow-right"></i></span>
            <span class="fw-semibold">{{ $product->name }}</span>
        </nav>
        <div class="row g-4 align-items-start">
            <div class="col-md-6 col-lg-5">
                <div class="bg-white rounded-4 shadow-sm p-3 mb-3 position-relative">
                    <div class="mb-2 main-img-wrapper position-relative d-flex align-items-center justify-content-center" style="min-height: 340px;">
                        <button type="button" class="btn gallery-nav-btn position-absolute" style="left: 16px; top: 50%; transform: translateY(-50%); z-index:2; border-top-left-radius: 1rem; border-bottom-left-radius: 1rem;" id="galleryPrevBtn"><i class="fas fa-chevron-left"></i></button>
                        <img id="mainProductImg" src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded-4 main-product-img gallery-fade" alt="{{ $product->name }}" style="transition: opacity 0.4s, transform 0.3s; cursor: zoom-in; max-height:340px; object-fit:contain;">
                        <button type="button" class="btn gallery-nav-btn position-absolute" style="right: 16px; top: 50%; transform: translateY(-50%); z-index:2; border-top-right-radius: 1rem; border-bottom-right-radius: 1rem;" id="galleryNextBtn"><i class="fas fa-chevron-right"></i></button>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-2 overflow-auto flex-nowrap gallery-slider">
                        <img src="{{ asset('storage/' . $product->image) }}" class="rounded border gallery-thumb" style="width:60px; height:60px; object-fit:cover; cursor:pointer; transition: box-shadow 0.2s;" data-index="0">
                        @if($product->galleries && count($product->galleries))
                        @foreach($product->galleries as $k => $img)
                        <img src="{{ asset('storage/' . $img->image) }}" class="rounded border gallery-thumb" style="width:60px; height:60px; object-fit:cover; cursor:pointer; transition: box-shadow 0.2s;" data-index="{{ $k+1 }}">
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-7">
                <div class="bg-white rounded-4 shadow p-4 h-100 d-flex flex-column justify-content-between animate__animated animate__fadeInRight">
                    <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2">
                        <h1 class="h3 fw-bold text-primary mb-0">{{ $product->name }}</h1>
                        <button id="favorite-btn" class="btn rounded-circle p-2 ms-1 bg-white" type="button" title="Yêu thích" style="font-size: 1.5rem; transition: background 0.2s,">
                            <i id="favorite-icon" class="fas fa-heart" style="color: #fff; transition: color 0.2s;"></i>
                        </button>
                    </div>
                    <div class="d-flex align-items-center mb-3 gap-2 border-bottom pb-2">
                        <div class="product-rating text-warning small">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <=floor($product->rating ?? 4.5))<i class="fas fa-star"></i>@elseif($i - $product->rating < 1)<i class="fas fa-star-half-alt"></i>@else<i class="far fa-star"></i>@endif
                                    @endfor
                                    <span class="text-muted ms-1">({{ number_format($product->rating ?? 4.5, 1) }})</span>
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
                                        if($min === null || $sale < $min) $min = $sale;
                                        if($max === null || $sale > $max) $max = $sale;
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
                        {!! $product->description !!}
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

                    <form method="POST" action="{{ route('cart-detail') }}" class="d-flex flex-column align-items-start gap-3 mt-3 flex-wrap"> 
                        @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                        @php
                            // Gom nhóm các thuộc tính và giá trị từ các biến thể
                            $attributes = [];
                            $variantMap = [];
                            $attrCount = 0;
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
                            // Lấy thêm 2 giá trị đầu tiên của $attributes (nếu có)
                            $attributes = array_slice($attributes, 0, 2, true);
                            
                        @endphp
                        @foreach($attributes as $attrName => $attr)
                            <div class="mb-2 w-100">
                                <label class="form-label fw-semibold">{{ $attrName }}</label>
                                <select name="attribute[{{ $attr['id'] }}]" class="form-select variant-select" data-attr-id="{{ $attr['id'] }}">
                                        {{-- OPTION mặc định không có giá trị, yêu cầu người dùng chọn --}}
                                        <option value="" disabled selected>-- Chọn {{ $attrName }} --</option>
                                    @foreach($attr['values'] as $valId => $val)
                                        <option value="{{ $valId }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                    
                        <div>    
                            <button id="add-to-cart-btn" class="btn btn-primary btn-lg rounded-pill px-4 fw-semibold shadow flex-grow-1" type="submit" style="margin-right: 10px;"><i class="fas fa-shopping-cart me-1"></i>Thêm vào giỏ</button>
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
<style>
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
        color: #fff;
        text-shadow: 0 0 2px #222, 0 0 0 #222;
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
        color: #2196F3;
        border: none;
        box-shadow: 0 2px 8px rgba(33, 150, 243, 0.08);
        transition: background 0.2s, color 0.2s, box-shadow 0.2s;
    }

    .gallery-nav-btn:hover,
    .gallery-nav-btn:focus {
        background: #2196F3;
        color: #fff;
        box-shadow: 0 4px 16px rgba(33, 150, 243, 0.16);
    }

    .quantity-wrapper input[type="number"] {
        -moz-appearance: textfield;
    }

    .quantity-wrapper input[type="number"]::-webkit-outer-spin-button,
    .quantity-wrapper input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
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
        $mainImg.stop(true).animate({opacity: 0}, 150, function() {
            $mainImg.attr('src', $thumbs.eq(currentImgIndex).attr('src'));
            $mainImg.animate({opacity: 1}, 150);
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
            if(info) {
                if(info.price != info.origin_price) {
                    $('#variant-origin-price').text(info.origin_price.toLocaleString('vi-VN') + 'đ').show();
                } else {
                    $('#variant-origin-price').hide();
                }
                $('#variant-sale-price').text(info.price.toLocaleString('vi-VN') + 'đ');
                $('#variant-quantity').text(info.quantity);

                // Tình trạng và nút thêm vào giỏ
                if(info.quantity > 0) {
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
});
</script>
@endsection