@php
use App\Helpers\ProductHelper;
$priceInfo = ProductHelper::getProductPriceInfo($product);
@endphp

<div class="card h-100 product-card border-0 shadow-lg rounded-4 position-relative overflow-hidden animate__animated animate__fadeInUp"
    style="min-width:0; min-height:unset;">
    <div class="product-image-wrapper bg-white d-flex align-items-center justify-content-center p-2 position-relative"
        style="height:140px; min-height:unset;">
        <a href="{{ route('client.product.show', $product->id) }}" class="d-block w-100 h-100">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                class="img-fluid product-thumbnail transition"
                style="max-height:110px; object-fit:contain; margin:0 auto;">
        </a>

        @if($priceInfo['has_discount'])
        <span class="badge bg-danger position-absolute" style="top:8px; left:8px; z-index:2;">-{{
            $priceInfo['discount_percent'] }}%</span>
        @endif
    </div>

    <div class="card-body p-2 d-flex flex-column justify-content-between align-items-center text-center">
        <h6 class="card-title text-truncate mb-1 fw-semibold w-100" style="font-size:1rem;">
            <a href="{{ route('client.product.show', $product->id) }}" class="text-decoration-none text-dark">{{
                $product->name }}</a>
        </h6>

        <div class="product-price mb-1 w-100 d-flex justify-content-center align-items-baseline gap-2">
            @if($priceInfo['has_discount'])
            <ins class="text-danger fw-bold fs-6">{{ $priceInfo['display_price'] }}</ins>
            <small class="text-muted text-decoration-line-through ms-1"><del>{{ number_format($priceInfo['original_price'])
                }}đ</del></small>
            @else
            <ins class="text-primary fw-bold fs-6">{{ $priceInfo['display_price'] }}</ins>
            @endif
        </div>

        <div
            class="product-rating text-warning small mb-2 w-100 d-flex justify-content-center align-items-center gap-1">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <small class="text-muted ms-1">(4.5)</small>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-auto gap-2">
            <a href="#" class="btn btn-light border-0 shadow-sm rounded-circle p-2 add-to-cart"
                title="Thêm vào giỏ hàng" data-product-id="{{ $product->id }}">
                <i class="fas fa-shopping-cart text-primary"></i>
            </a>
            <a href="#" class="btn btn-light border-0 shadow-sm rounded-circle p-2 add-to-wishlist"
                title="Thêm vào yêu thích" data-product-id="{{ $product->id }}">
                <i class="fas fa-heart text-danger"></i>
            </a>
            <a href="{{ route('client.product.show', $product->id) }}"
                class="btn btn-light border-0 shadow-sm rounded-circle p-2 quick-view" title="Xem nhanh">
                <i class="fas fa-eye text-info"></i>
            </a>
        </div>

        <form action="{{ route('cart-detail') }}" method="POST" class="mt-3 w-100">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="quantity" value="1">

            @if($product->variants && $product->variants->count() > 0)
            @foreach ($product->variants->first()->variantAttributes ?? [] as $variantAttr)
            @php
            $valueId = $variantAttr->attribute_value_id
            ?? $variantAttr->value_id
            ?? optional($variantAttr->value)->id;
            @endphp
            <input type="hidden" name="attribute[{{ $variantAttr->attribute_id }}]" value="{{ $valueId }}">
            @endforeach
            @endif

            <button type="submit" class="btn btn-primary btn-sm w-100 rounded-pill">
                Mua ngay
            </button>
        </form>
    </div>
</div>