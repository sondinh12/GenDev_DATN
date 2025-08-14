@php
    use App\Helpers\ProductHelper;
    $priceInfo = ProductHelper::getProductPriceInfo($product);
    $discountPercent = ProductHelper::getFirstVariantDiscountPercent($product);
    $isFavorited = auth()->check() && auth()->user()->favorites->contains($product->id);
@endphp

<div class="card h-100 product-card border-0 shadow-lg rounded-4 position-relative overflow-hidden animate__animated animate__fadeInUp"
    style="min-width:0; min-height:unset;">

    {{-- Hình ảnh và giảm giá --}}
    <div class="product-image-wrapper bg-white d-flex align-items-center justify-content-center p-2 position-relative"
        style="height:140px;">

        {{-- Badge giảm giá --}}
        @if ($discountPercent)
            <span class="badge bg-danger position-absolute"
                style="top:8px; left:8px; z-index:2;">-{{ $discountPercent }}%</span>
        @elseif($priceInfo['has_discount'])
            <span class="badge bg-danger position-absolute"
                style="top:8px; left:8px; z-index:2;">-{{ $priceInfo['discount_percent'] }}%</span>
        @endif

        {{-- Nút yêu thích --}}
        <form action="{{ route('client.favorites.toggle', $product->id) }}" method="POST" class="wishlist-form">
            @csrf
            <button type="submit" class="wishlist-btn"
                title="{{ $isFavorited ? 'Xoá khỏi yêu thích' : 'Thêm vào yêu thích' }}">
                <i class="fas fa-heart {{ $isFavorited ? 'favorited' : 'not-favorited' }}"></i>
            </button>
        </form>

        <a href="{{ route('client.product.show', $product->id) }}" class="d-block w-100 h-100">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                class="img-fluid product-thumbnail transition"
                style="max-height:110px; object-fit:contain; margin:0 auto;">
        </a>
    </div>

    {{-- Nội dung bên dưới --}}
    <div class="card-body p-2 d-flex flex-column justify-content-between align-items-center text-center">

        {{-- Tên sản phẩm --}}
        <h6 class="card-title text-truncate mb-1 fw-semibold w-100" style="font-size:1rem;">
            <a href="{{ route('client.product.show', $product->id) }}" class="text-decoration-none text-dark">
                {{ $product->name }}
            </a>
        </h6>

        {{-- Hiển thị giá --}}
        <div class="product-price mb-1 w-100 d-flex justify-content-center align-items-baseline gap-2">
            @php
                $variant = $product->variants->first();
            @endphp
            @if ($variant)
                @if ($variant->sale_price && $variant->sale_price < $variant->price)
                    <ins class="text-danger fw-bold fs-6">{{ number_format($variant->sale_price) }}đ</ins>
                    <small class="text-muted text-decoration-line-through ms-1">
                        <del>{{ number_format($variant->price) }}đ</del>
                    </small>
                @else
                    <ins class="text-primary fw-bold fs-6">{{ number_format($variant->price) }}đ</ins>
                @endif
            @else
                @if ($priceInfo['has_discount'])
                    <ins class="text-danger fw-bold fs-6">{{ $priceInfo['display_price'] }}</ins>
                    <small class="text-muted text-decoration-line-through ms-1">
                        <del>{{ number_format($priceInfo['original_price']) }}đ</del>
                    </small>
                @else
                    <ins class="text-primary fw-bold fs-6">{{ $priceInfo['display_price'] }}</ins>
                @endif
            @endif
        </div>

        {{-- Đánh giá --}}
        <div
            class="product-rating text-warning small mb-2 w-100 d-flex justify-content-center align-items-center gap-1">
            @php
                $avgRating = round($product->reviews()->avg('rating'), 1);
            @endphp
            <div class="">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= floor($avgRating))
                        <i class="fas fa-star"></i>
                    @elseif($i - $avgRating < 1)
                        <i class="fas fa-star-half-alt"></i>
                    @else
                        <i class="far fa-star"></i>
                    @endif
                @endfor
                <span class="text-muted ms-1">({{ $avgRating }})</span>
            </div>
        </div>

        {{-- Hành động: giỏ, yêu thích, xem nhanh --}}
        <div class="d-flex justify-content-between align-items-center mt-auto gap-2">
            <a href="#" class="btn btn-light border-0 shadow-sm rounded-circle p-2 add-to-cart"
                title="Thêm vào giỏ hàng" data-product-id="{{ $product->id }}">
                <i class="fas fa-shopping-cart text-primary"></i>
            </a>

            {{-- Đã có wishlist-form bên trên nên không cần lặp lại --}}

            <a href="{{ route('client.product.show', $product->id) }}"
                class="btn btn-light border-0 shadow-sm rounded-circle p-2 quick-view" title="Xem nhanh">
                <i class="fas fa-eye text-info"></i>
            </a>
        </div>

        {{-- Mua ngay --}}
        <form action="{{ route('cart-detail') }}" method="POST" class="mt-3 w-100">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="quantity" value="1">

            @if ($product->variants && $product->variants->count() > 0)
                @foreach ($product->variants->first()->variantAttributes ?? [] as $variantAttr)
                    @php
                        $valueId =
                            $variantAttr->attribute_value_id ??
                            ($variantAttr->value_id ?? optional($variantAttr->value)->id);
                    @endphp
                    <input type="hidden" name="attribute[{{ $variantAttr->attribute_id }}]"
                        value="{{ $valueId }}">
                @endforeach
            @endif

            <button type="submit" class="btn btn-primary btn-sm w-100 rounded-pill">Mua ngay</button>
        </form>
    </div>
</div>
<style>
    .wishlist-form {
        position: absolute;
        top: 8px;
        right: 8px;
        z-index: 3;
    }

    .wishlist-btn {
        background: none;
        border: none;
        padding: 5px;
        cursor: pointer;
        font-size: 1.1rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.2s ease;
    }

    .wishlist-btn:hover {
        transform: scale(1.1);
    }

    .favorited {
        color: #e74c3c;
    }

    .not-favorited {
        color: #ccc;
    }
</style>
