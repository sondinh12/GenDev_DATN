<div class="products">
    @foreach ($bestSellingProducts as $product)
        <div class="product {{ $loop->first ? 'dau-tien' : '' }} {{ $loop->last ? 'cuoi-cung' : '' }}">
            <div class="yith-wcwl-add-to-wishlist">
                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist">Thêm vào
                    danh sách yêu thích</a>
            </div>
            @php
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
            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                href="{{ route('product.show', $product->id) }}">
                <div style="position: relative; display: inline-block;">
                    @if ($displaySale)
                        <span
                            style="position: absolute; top: 8px; left: 8px; background: #e74c3c; color: #fff; font-size: 14px; font-weight: bold; padding: 2px 8px; border-radius: 4px; z-index: 2;">
                            -{{ round((100 * ($displayPrice - $displaySale)) / $displayPrice) }}%
                        </span>
                    @endif
                    <img width="224" height="197" src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}" class="attachment-shop_catalog size-shop_catalog wp-post-image">
                    {{-- <img width="224" height="197" alt="{{ $product->name }}"
                                                            class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                            src="{{ asset('storage/' . $product->image) }}"> --}}
                </div>
                <span class="price">
                    @if ($displaySale)
                        <div>
                            <del style="color: #888;">{{ number_format($displayPrice) }}
                                VNĐ</del>
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
            </a>
            <div class="techmarket-product-rating">
                <div title="Đánh giá {{ $product->rating ?? '5.00' }} trên 5" class="star-rating">
                    <span style="width:{{ ($product->rating ?? 5) * 20 }}%">
                        <strong class="rating">{{ $product->rating ?? '5.00' }}</strong>
                        trên 5</span>
                </div>
                <span class="review-count">({{ $product->reviews_count ?? 1 }})</span>
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
<!-- .products -->
<div class="mt-4 d-flex justify-content-center">
    {{ $bestSellingProducts->links('pagination::bootstrap-4') }}
</div>
