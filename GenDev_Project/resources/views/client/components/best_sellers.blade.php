<div class="products">
    @foreach ($bestSellingProducts as $product)
        <div class="product {{ $loop->first ? 'dau-tien' : '' }} {{ $loop->last ? 'cuoi-cung' : '' }}">
            @php
                $isFavorited = auth()->check() && auth()->user()->favorites->contains($product->id);
                $displayPrice = $product->price;
                $displaySale = $product->sale_price;
                if ($product->variants && $product->variants->count()) {
                    $prices = $product->variants->map(function ($v) {
                        return $v->sale_price && $v->sale_price > 0 ? $v->sale_price : $v->price;
                    });
                    $displaySale = $prices->min();
                    $displayPrice = $product->variants->min('price');
                }
            @endphp

            <div class="product-image-wrapper">
                <form action="{{ route('client.favorites.toggle', $product->id) }}" method="POST" class="wishlist-form">
                    @csrf
                    <button type="submit" class="wishlist-btn"
                        title="{{ $isFavorited ? 'Xoá khỏi yêu thích' : 'Thêm vào yêu thích' }}">
                        <i class="fas fa-heart {{ $isFavorited ? 'favorited' : 'not-favorited' }}"></i>
                    </button>
                </form>

                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                    href="{{ route('product.show', $product->id) }}">
                    @if ($displaySale)
                        <span class="discount-badge">
                            -{{ round((100 * ($displayPrice - $displaySale)) / $displayPrice) }}%
                        </span>
                    @endif

                    <img width="224" height="197" src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}" class="attachment-shop_catalog size-shop_catalog wp-post-image">
                </a>
            </div>

            <span class="price">
                @if ($displaySale)
                    <div>
                        <del style="color: #888;">{{ number_format($displayPrice) }} VNĐ</del>
                    </div>
                    <div>
                        <span class="woocommerce-Price-amount amount" style="color: #007bff;">
                            {{ number_format($displaySale) }} VNĐ
                        </span>
                    </div>
                @else
                    <div>
                        <span class="woocommerce-Price-amount amount" style="color: #007bff;">
                            {{ number_format($displayPrice) }} VNĐ
                        </span>
                    </div>
                @endif
            </span>
            <h2 class="woocommerce-loop-product__title">{{ $product->name }}</h2>

            <div class="techmarket-product-rating">
                @php
                    $avgRating = round($product->reviews()->avg('rating'), 1);
                @endphp
                <div class="">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= floor($avgRating))
                            <i class="fas fa-star" style="color: #ffc107;"></i>
                        @elseif($i - $avgRating < 1)
                            <i class="fas fa-star-half-alt" style="color: #ffc107;"></i>
                        @else
                            <i class="far fa-star" style="color: #e0e0e0;"></i>
                        @endif
                    @endfor
                    <span class="review-count" style="color: #666;">({{ $avgRating }})</span>
                </div>
            </div>

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
                <div class="d-flex justify-content-center">
                    <button type="submit" class="button product_type_simple add_to_cart_button">
                        Mua ngay
                    </button>
                </div>
            </form>
        </div>
    @endforeach
</div>
<div class="mt-4 d-flex justify-content-center">
    {{ $bestSellingProducts->links('pagination::bootstrap-4') }}
</div>
<style>
    .product-image-wrapper {
        position: relative;
        display: inline-block;
    }

    .wishlist-form {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 10;
    }

    .wishlist-btn {
        background: none;
        border: none;
        padding: 1px;
        cursor: pointer;
        font-size: 25px;
    }

    .favorited {
        color: #e74c3c;
        /* Tim đỏ */
    }

    .not-favorited {
        color: #ccc;
        /* Tim trắng */
    }

    .wishlist-btn:hover i {
        transform: scale(1.1);
        transition: 0.2s ease;
    }

    .discount-badge {
        position: absolute;
        top: 8px;
        left: 8px;
        background: #e74c3c;
        color: #fff;
        font-size: 14px;
        font-weight: bold;
        padding: 2px 8px;
        border-radius: 4px;
        z-index: 5;
    }
</style>
