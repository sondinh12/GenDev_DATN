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

    .quantity-wrapper {
        gap: 10px;
    }

    .btn-qty {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #fff;
        border: 2px solid #2196F3;
        color: #2196F3;
        font-size: 1.2rem;
        font-weight: bold;
        box-shadow: 0 2px 8px rgba(33, 150, 243, 0.08);
        transition: background 0.2s, color 0.2s, box-shadow 0.2s;
        outline: none;
    }

    .btn-qty:hover,
    .btn-qty:focus {
        background: #2196F3;
        color: #fff;
        box-shadow: 0 4px 16px rgba(33, 150, 243, 0.16);
    }

    .btn-qty:disabled {
        background: #f0f0f0;
        border-color: #ccc;
        color: #ccc;
        cursor: not-allowed;
    }

    .qty-input {
        width: 38px;
        height: 36px;
        text-align: center;
        font-size: 1rem;
        font-weight: bold;
        border: 2px solid #2196F3;
        border-radius: 8px;
        background: #f8fafc;
        color: #222;
    }

    .qty-input:disabled {
        background: #f0f0f0;
        border-color: #ccc;
        color: #ccc;
        cursor: not-allowed;
    }

    .btn-qty-minus {
        background: #ffeaea;
        border-color: #ff5252;
        color: #ff5252;
    }

    .btn-qty-minus:hover,
    .btn-qty-minus:focus {
        background: #ff5252;
        color: #fff;
        border-color: #ff5252;
    }

    .btn-qty-plus {
        background: #eaffea;
        border-color: #4caf50;
        color: #4caf50;
    }

    .btn-qty-plus:hover,
    .btn-qty-plus:focus {
        background: #4caf50;
        color: #fff;
        border-color: #4caf50;
    }
</style>
@endsection

@section('content')
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
                                    $discountPercent = null;
                                    if(count($product->variants)) {
                                    foreach($product->variants as $v) {
                                    $sale = $v->sale_price;
                                    $price = $v->price;
                                    $display = $sale !== null ? $sale : $price;
                                    if($min === null || $display < $min) $min=$display;
                                        if($max===null || $display> $max) $max = $display;
                                        }
                                        } else {
                                        if($product->sale_price !== null && $product->sale_price < $product->price && $product->price > 0) {
                                            $discountPercent = round(100 - ($product->sale_price / $product->price * 100));
                                            }
                                            }
                                            @endphp
                                            @if(count($product->variants))
                                            @if($min == $max)
                                            {{ number_format($min, 0, ',', '.') }}đ
                                            @else
                                            {{ number_format($min, 0, ',', '.') }}đ - {{ number_format($max, 0, ',', '.') }}đ
                                            @endif
                                            @else
                                            @if($product->sale_price !== null && $product->sale_price < $product->price)
                                                {{ number_format($product->sale_price, 0, ',', '.') }}đ
                                                <small class="text-muted text-decoration-line-through ms-1"><del>{{ number_format($product->price, 0, ',', '.') }}đ</del></small>
                                                @if($discountPercent)
                                                <span class="badge bg-danger ms-2">-{{ $discountPercent }}%</span>
                                                @endif
                                                @else
                                                {{ number_format($product->sale_price ?: $product->price, 0, ',', '.') }}đ
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
                                <div class="quantity-wrapper d-flex align-items-center mb-3">
                                    <button type="button" class="btn btn-qty btn-qty-minus d-flex align-items-center justify-content-center" tabindex="-1" disabled>
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" name="quantity" id="quantity-input" class="qty-input" value="{{ old('quantity', 1) }}" min="1" step="1" style="text-align: center;" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" disabled>
                                    <button type="button" class="btn btn-qty btn-qty-plus d-flex align-items-center justify-content-center" tabindex="-1" disabled>
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
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
                                            <option value="" disabled {{ !old('attribute.'.$attr['id']) ? 'selected' : '' }}>-- Chọn {{ $attrName }} --</option>
                                            @foreach($attr['values'] as $valId => $val)
                                            @php
                                            $variantKey = [];
                                            foreach ($attributes as $attrName2 => $attr2) {
                                            $variantKey[$attr2['id']] = ($attr2['id'] == $attr['id']) ? $valId : null;
                                            }
                                            ksort($variantKey);
                                            $key = implode('-', array_map(function($k, $v) { return $k.':'.$v; }, array_keys($variantKey), $variantKey));
                                            $salePrice = $variantMap[$key]['price'] ?? null;
                                            @endphp
                                            <option value="{{ $valId }}" {{ old('attribute.'.$attr['id']) == $valId ? 'selected' : '' }}>
                                                {{ $val }}
                                            </option>
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
        <div class="related-grid" style="display:grid; grid-template-columns:repeat(4, 1fr); gap:32px 24px; justify-items:center; align-items:stretch;">
            @foreach($relatedProducts as $item)
            <div style="width:100%; max-width:270px; min-width:250px; display:flex; align-items:stretch;">
                <div class="card h-100 product-card border-0 shadow-lg rounded-4 position-relative overflow-hidden animate__animated animate__fadeInUp" style="width:100%; min-width:0; min-height:380px; display:flex; flex-direction:column;">
                    <div class="product-image-wrapper bg-white d-flex align-items-center justify-content-center p-2 position-relative" style="height:140px; min-height:unset;">
                        <a href="{{ route('product.show', $item->id) }}" class="d-block w-100 h-100">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="img-fluid product-thumbnail transition" style="max-height:110px; object-fit:contain; margin:0 auto;">
                        </a>
                        @php
                        $variant = $item->variants->first();
                        $discountPercent = null;
                        $min = null; $max = null;
                        if($variant && $variant->sale_price && $variant->sale_price < $variant->price && $variant->price > 0) {
                            $discountPercent = round(100 - ($variant->sale_price / $variant->price * 100));
                            } elseif($item->sale_price && $item->sale_price < $item->price && $item->price > 0) {
                                $discountPercent = round(100 - ($item->sale_price / $item->price * 100));
                                }
                                if(count($item->variants ?? [])) {
                                foreach($item->variants as $v) {
                                $sale = $v->sale_price ?? $v->price;
                                if($min === null || $sale < $min) $min=$sale;
                                    if($max===null || $sale> $max) $max = $sale;
                                    }
                                    }
                                    @endphp
                                    @if($discountPercent)
                                    <span class="badge bg-danger position-absolute" style="top:8px; left:8px; z-index:2;">-{{ $discountPercent }}%</span>
                                    @endif
                    </div>
                    <div class="card-body p-2 d-flex flex-column justify-content-between align-items-center text-center" style="flex:1 1 auto;">
                        <h6 class="card-title text-truncate mb-1 fw-semibold w-100" style="font-size:1rem;">
                            <a href="{{ route('product.show', $item->id) }}" class="text-decoration-none text-dark">{{ $item->name }}</a>
                        </h6>
                        <div class="product-price mb-1 w-100 d-flex justify-content-center align-items-baseline gap-2">
                            @if($variant)
                            @if($variant->sale_price && $variant->sale_price < $variant->price)
                                <ins class="text-danger fw-bold fs-6">{{ number_format($variant->sale_price) }}đ</ins>
                                <small class="text-muted text-decoration-line-through ms-1"><del>{{ number_format($variant->price) }}đ</del></small>
                                @else
                                <ins class="text-primary fw-bold fs-6">{{ number_format($variant->price) }}đ</ins>
                                @endif
                                @else
                                @if($item->sale_price && $item->sale_price < $item->price)
                                    <ins class="text-danger fw-bold fs-6">{{ number_format($item->sale_price) }}đ</ins>
                                    <small class="text-muted text-decoration-line-through ms-1"><del>{{ number_format($item->price) }}đ</del></small>
                                    @else
                                    <ins class="text-primary fw-bold fs-6">{{ number_format($item->sale_price ?: $item->price) }}đ</ins>
                                    @endif
                                    @endif
                        </div>
                        <div class="product-rating text-warning small mb-2 w-100 d-flex justify-content-center align-items-center gap-1">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <small class="text-muted ms-1">(4.5)</small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-auto gap-2">
                            <a href="#" class="btn btn-light border-0 shadow-sm rounded-circle p-2 add-to-cart" title="Thêm vào giỏ hàng" data-product-id="{{ $item->id }}">
                                <i class="fas fa-shopping-cart text-primary"></i>
                            </a>
                            <a href="#" class="btn btn-light border-0 shadow-sm rounded-circle p-2 add-to-wishlist" title="Thêm vào yêu thích" data-product-id="{{ $item->id }}">
                                <i class="fas fa-heart text-danger"></i>
                            </a>
                            <a href="{{ route('product.show', $item->id) }}" class="btn btn-light border-0 shadow-sm rounded-circle p-2 quick-view" title="Xem nhanh">
                                <i class="fas fa-eye text-info"></i>
                            </a>
                        </div>
                        <form action="{{ route('cart-detail') }}" method="POST" class="mt-3 w-100">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                            <input type="hidden" name="quantity" value="1">
                            @if($item->variants && $item->variants->count() > 0)
                            @foreach ($item->variants->first()->variantAttributes ?? [] as $variantAttr)
                            @php
                            $valueId = $variantAttr->attribute_value_id
                            ?? $variantAttr->value_id
                            ?? optional($variantAttr->value)->id;
                            @endphp
                            <input type="hidden" name="attribute[{{ $variantAttr->attribute_id }}]" value="{{ $valueId }}">
                            @endforeach
                            @endif
                            <button type="submit" class="btn btn-primary btn-sm w-100 rounded-pill">Mua ngay</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
<style>
    .related-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 32px 24px;
        justify-items: center;
        align-items: stretch;
    }

    .related-grid>div {
        width: 100%;
        max-width: 270px;
        min-width: 250px;
        display: flex;
        align-items: stretch;
    }

    @media (max-width: 1200px) {
        .related-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 900px) {
        .related-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        .related-grid {
            grid-template-columns: 1fr;
        }
    }

    .container-fluid .product-card {
        margin-bottom: 0 !important;
        box-sizing: border-box;
    }

    .container-fluid .product-image-wrapper {
        min-height: 140px;
        height: 140px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
    }

    .container-fluid .card-body {
        min-height: 220px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    @media (max-width: 991px) {
        .container-fluid .product-card {
            max-width: 100% !important;
        }

        .container-fluid .card-body {
            min-height: 200px;
        }
    }

    @media (max-width: 767px) {
        .container-fluid .product-card {
            min-width: 100% !important;
            max-width: 100% !important;
        }

        .container-fluid .card-body {
            min-height: 180px;
        }
    }

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
        function formatPrice(price) {
            if (typeof price === 'number') {
                return price.toLocaleString('vi-VN') + 'đ';
            }
            price = parseInt(price) || 0;
            return price.toLocaleString('vi-VN') + 'đ';
        }

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
            var $qtyInput = $('#quantity-input');
            var $btnMinus = $('.btn-qty-minus');
            var $btnPlus = $('.btn-qty-plus');
            var hasVariants = Object.keys(variantMap).length > 0;

            if (hasVariants && !allAttrSelected()) {
                // Nếu sản phẩm có biến thể nhưng chưa chọn đủ thuộc tính
                $qtyInput.prop('disabled', true);
                $btnMinus.prop('disabled', true);
                $btnPlus.prop('disabled', true);
                var min = null, max = null;
                Object.values(variantMap).forEach(function(v) {
                    var display = parseInt(v.price);
                    if (min === null || display < min) min = display;
                    if (max === null || display > max) max = display;
                });
                if (min !== null && max !== null) {
                    $('#variant-sale-price').text(formatPrice(min) + (min != max ? ' - ' + formatPrice(max) : ''));
                } else {
                    $('#variant-sale-price').text('');
                }
                $('#variant-origin-price').hide();
                $('#variant-quantity').text('--');
                $('#variant-status').removeClass('bg-danger').addClass('bg-success').text('Còn hàng');
                $('#add-to-cart-btn').removeClass('btn-secondary').addClass('btn-primary').prop('disabled', false);
            } else {
                // Nếu không có biến thể hoặc đã chọn đủ thuộc tính
                $qtyInput.prop('disabled', false);
                $btnMinus.prop('disabled', false);
                $btnPlus.prop('disabled', false);
                if (hasVariants) {
                    var key = getSelectedKey();
                    var info = variantMap[key];
                    if (info) {
                        if (info.price != info.origin_price) {
                            $('#variant-origin-price').text(formatPrice(info.origin_price)).show();
                            var percent = Math.round(100 * (info.origin_price - info.price) / info.origin_price);
                            if (percent > 0) {
                                $('#variant-sale-price').html(
                                    formatPrice(info.price) + ' <span class="badge bg-danger ms-2">-' + percent + '%</span>'
                                );
                            } else {
                                $('#variant-sale-price').text(formatPrice(info.price));
                            }
                        } else {
                            $('#variant-origin-price').hide();
                            $('#variant-sale-price').text(formatPrice(info.price));
                        }
                        $('#variant-quantity').text(info.quantity);
                        if (info.quantity > 0) {
                            $('#variant-status').removeClass('bg-danger').addClass('bg-success').text('Còn hàng');
                            $('#add-to-cart-btn').removeClass('btn-secondary').addClass('btn-primary').prop('disabled', false);
                        } else {
                            $('#variant-status').removeClass('bg-success').addClass('bg-danger').text('Hết hàng');
                            $('#add-to-cart-btn').removeClass('btn-primary').addClass('btn-secondary').prop('disabled', true);
                            $qtyInput.prop('disabled', true);
                            $btnMinus.prop('disabled', true);
                            $btnPlus.prop('disabled', true);
                        }
                    }
                } else {
                    // Không có biến thể
                    var price = parseInt('{{ $product->sale_price ?: $product->price }}');
                    var originPrice = parseInt('{{ $product->price }}');
                    if (price != originPrice && '{{ $product->sale_price }}') {
                        $('#variant-origin-price').text(formatPrice(originPrice)).show();
                        var percent = Math.round(100 * (originPrice - price) / originPrice);
                        if (percent > 0) {
                            $('#variant-sale-price').html(
                                formatPrice(price) + ' <span class="badge bg-danger ms-2">-' + percent + '%</span>'
                            );
                        } else {
                            $('#variant-sale-price').text(formatPrice(price));
                        }
                    } else {
                        $('#variant-origin-price').hide();
                        $('#variant-sale-price').text(formatPrice(price));
                    }
                    $('#variant-quantity').text('{{ $product->quantity ?? 0 }}');
                    if ('{{ $product->quantity ?? 0 }}' > 0) {
                        $('#variant-status').removeClass('bg-danger').addClass('bg-success').text('Còn hàng');
                        $('#add-to-cart-btn').removeClass('btn-secondary').addClass('btn-primary').prop('disabled', false);
                    } else {
                        $('#variant-status').removeClass('bg-success').addClass('bg-danger').text('Hết hàng');
                        $('#add-to-cart-btn').removeClass('btn-primary').addClass('btn-secondary').prop('disabled', true);
                        $qtyInput.prop('disabled', true);
                        $btnMinus.prop('disabled', true);
                        $btnPlus.prop('disabled', true);
                    }
                }
            }
            updateQtyInputMax();
        }

        $('.variant-select').on('change', updateVariantInfo);
        updateVariantInfo();

        $('.variant-select').each(function() {
            if ($(this).val()) {
                $(this).trigger('change');
            }
        });
        if ($('#quantity-input').val()) {
            $('#quantity-input').trigger('input');
        }

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

        // Quantity input logic
        function getMaxQuantity() {
            if (Object.keys(variantMap).length && allAttrSelected()) {
                var key = getSelectedKey();
                var info = variantMap[key];
                if (info) return info.quantity;
            }
            var q = parseInt(JSON.parse('{{ $product->quantity ?? 0 }}'));
            return isNaN(q) ? 1 : q;
        }

        function updateQtyInputMax() {
            var maxQty = getMaxQuantity();
            var $qtyInput = $('#quantity-input');
            $qtyInput.attr('max', maxQty > 0 ? maxQty : 1);
            var currentVal = parseInt($qtyInput.val()) || 1;
            if (currentVal > maxQty) {
                $qtyInput.val(maxQty > 0 ? maxQty : 1);
            }
            if (currentVal < 1 || isNaN(currentVal)) {
                $qtyInput.val(1);
            }
        }

        $('.btn-qty-plus').on('click', function() {
            var $qtyInput = $('#quantity-input');
            var max = parseInt($qtyInput.attr('max')) || getMaxQuantity();
            var val = parseInt($qtyInput.val()) || 1;
            if (Object.keys(variantMap).length) {
                if (!allAttrSelected()) {
                    $qtyInput.val(1);
                    alert('Vui lòng chọn đầy đủ các thuộc tính sản phẩm trước khi thay đổi số lượng.');
                    return;
                }
                var key = getSelectedKey();
                var info = variantMap[key];
                var max = info ? parseInt(info.quantity) : 1;
                if (val < max) {
                    $qtyInput.val(val + 1);
                } else {
                    alert('Bạn đã chọn tối đa số lượng tối đa của sản phẩm này.');
                }
            } else {
                var max = parseInt($qtyInput.attr('max')) || getMaxQuantity();
                if (val < max) {
                    $qtyInput.val(val + 1);
                } else {
                    alert('Bạn đã chọn tối đa số lượng tối đa của sản phẩm này.');
                }
            }
        });

        $('.btn-qty-minus').on('click', function() {
            var $qtyInput = $('#quantity-input');
            var val = parseInt($qtyInput.val()) || 1;
            if (val > 1) {
                $qtyInput.val(val - 1);
            }
        });

        $('#quantity-input').on('input change', function() {
            var $qtyInput = $(this);
            var val = $qtyInput.val();
            // Chỉ cho phép số, loại bỏ các ký tự không phải số
            val = val.replace(/[^0-9]/g, '');
            $qtyInput.val(val);
            // Đảm bảo giá trị tối thiểu là 1
            if (val === '' || parseInt(val) < 1) {
                $qtyInput.val(1);
            }
            updateQtyInputMax();
        });

        $('.variant-select').on('change', function() {
            setTimeout(updateVariantInfo, 100);
        });
        updateQtyInputMax();
    });
</script>
@endsection