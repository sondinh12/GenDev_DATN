@extends('client.layout.master')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show fixed-top m-3 shadow" role="alert" style="z-index: 1050;">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Đóng">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div id="content" class="site-content">

        <div class="col-full">
            <div class="row">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <div class="home-v1-slider home-slider">
                            <div class="slider-1"
                                style="background-image: url(assets/images/slider/home-v1-background.jpg);">
                                <img src="assets/images/slider/home-v1-img-1.png" alt="">
                                <div class="caption">
                                    <div class="title">Turn. Click. Expand. Smart modular design simplifies adding storage
                                        for growing media.</div>
                                    <div class="sub-title">Powerful Six Core processor, vibrant 4KUHD display output and
                                        fast SSD elegantly cased in a soft alloy design.</div>
                                    <div class="button">Get Yours now
                                        <i class="tm tm-long-arrow-right"></i>
                                    </div>
                                    <div class="bottom-caption">Free shipping on US Terority</div>
                                </div>
                            </div>
                            <!-- .slider-1 -->
                            <div class="slider-1 slider-2"
                                style="background-image: url(assets/images/slider/home-v1-background.jpg);">
                                <img src="assets/images/slider/home-v1-img-2.png" alt="">
                                <div class="caption">
                                    <div class="title">The new-tech gift you
                                        <br> are wishing for is
                                        <br> right here
                                    </div>
                                    <div class="sub-title">Big screens in incredibly slim designs
                                        <br>that in your hand.
                                    </div>
                                    <div class="button">Browse now
                                        <i class="tm tm-long-arrow-right"></i>
                                    </div>
                                    <div class="bottom-caption">Free shipping on US Terority </div>
                                </div>
                            </div>
                            <!-- .slider-2 -->
                        </div>
                        <!-- .home-v1-slider -->
                        <div class="features-list">
                            <div class="features">
                                <div class="feature">
                                    <div class="media">
                                        <i class="feature-icon d-flex mr-3 tm tm-free-delivery"></i>
                                        <div class="media-body feature-text">
                                            <h5 class="mt-0">Free Delivery</h5>
                                            <span>from $50</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- .feature -->
                                <div class="feature">
                                    <div class="media">
                                        <i class="feature-icon d-flex mr-3 tm tm-feedback"></i>
                                        <div class="media-body feature-text">
                                            <h5 class="mt-0">99% Customer</h5>
                                            <span>Feedbacks</span>
                                        </div>
                                    </div>
                                    <!-- .media -->
                                </div>
                                <!-- .feature -->
                                <div class="feature">
                                    <div class="media">
                                        <i class="feature-icon d-flex mr-3 tm tm-free-return"></i>
                                        <div class="media-body feature-text">
                                            <h5 class="mt-0">365 Days</h5>
                                            <span>for free return</span>
                                        </div>
                                    </div>
                                    <!-- .media -->
                                </div>
                                <!-- .feature -->
                                <div class="feature">
                                    <div class="media">
                                        <i class="feature-icon d-flex mr-3 tm tm-safe-payments"></i>
                                        <div class="media-body feature-text">
                                            <h5 class="mt-0">Payment</h5>
                                            <span>Secure System</span>
                                        </div>
                                    </div>
                                    <!-- .media -->
                                </div>
                                <!-- .feature -->
                                <div class="feature">
                                    <div class="media">
                                        <i class="feature-icon d-flex mr-3 tm tm-best-brands"></i>
                                        <div class="media-body feature-text">
                                            <h5 class="mt-0">Only Best</h5>
                                            <span>Brands</span>
                                        </div>
                                    </div>
                                    <!-- .media -->
                                </div>
                                <!-- .feature -->
                            </div>
                            <!-- .features -->
                        </div>

                        <section class="section-top-categories section-categories-carousel" id="categories-carousel-1">
                            <header class="section-header">
                                <h2 class="section-title">Danh mục
                                    <br>sản phẩm
                                </h2>
                                <nav class="custom-slick-nav"></nav>
                                <!-- .custom-slick-nav -->
                            </header>
                            <!-- .section-header -->
                            <div class="product-categories-1 product-categories-carousel" data-ride="tm-slick-carousel"
                                data-wrap=".products"
                                data-slick="{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#categories-carousel-1 .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                <div class="woocommerce columns-5">
                                    <div class="products">
                                        @foreach ($categories as $category)
                                            <div class="product-category product">
                                                <a href="#">
                                                    <img class="category-img" width="224" height="197"
                                                        object-fit= "cover" border-radius= "12px"
                                                        box-shadow= "0 2px 8px rgba(0,0,0,0.08)" background= "#f5f5f5"
                                                        display= "block" margin= "0 auto" alt="{{ $category->name }}"
                                                        src="{{ Str::startsWith($category->image, ['http://', 'https://'])
                                                            ? $category->image
                                                            : (file_exists(public_path($category->image))
                                                                ? asset($category->image)
                                                                : asset('storage/' . $category->image)) }}">
                                                    <h2 class="woocommerce-loop-category__title">
                                                        {{ $category->name }}
                                                    </h2>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- .products -->
                                </div>
                                <!-- .woocommerce -->
                            </div>
                            <!-- .product-categories-carousel -->
                        </section>

                        <div class="section-deals-carousel-and-products-carousel-tabs row">
                            <div id="grid-extended" class="tab-pane" role="tabpanel">
                                <div class="woocommerce columns-7">
                                    <h2 class="section-title">Sản phẩm bán chạy nhất</h2>
                                    <div class="products">
                                        @foreach ($products as $product)
                                            <div
                                                class="product {{ $loop->first ? 'dau-tien' : '' }} {{ $loop->last ? 'cuoi-cung' : '' }}">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist">Thêm vào
                                                        danh sách yêu thích</a>
                                                </div>
                                                @php
                                                    $displayPrice = $product->price;
                                                    $displaySale = $product->sale_price;
                                                    if ($product->variants && $product->variants->count()) {
                                                        $prices = $product->variants->map(function ($v) {
                                                            return $v->sale_price && $v->sale_price > 0
                                                                ? $v->sale_price
                                                                : $v->price;
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
                                                        <img width="224" height="197" alt="{{ $product->name }}"
                                                            class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                            src="{{ $product->image }}">
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
                                                                <span class="woocommerce-Price-amount amount"
                                                                    style="color: #007bff;">
                                                                    {{ number_format($displaySale) }} VNĐ
                                                                </span>
                                                            </div>
                                                        @else
                                                            <div>
                                                                <span class="woocommerce-Price-amount amount"
                                                                    style="color: #007bff;">
                                                                    {{ number_format($displayPrice) }} VNĐ
                                                                </span>
                                                            </div>
                                                        @endif
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">{{ $product->name }}</h2>
                                                </a>
                                                <div class="techmarket-product-rating">
                                                    <div title="Đánh giá {{ $product->rating ?? '5.00' }} trên 5"
                                                        class="star-rating">
                                                        <span style="width:{{ ($product->rating ?? 5) * 20 }}%">
                                                            <strong
                                                                class="rating">{{ $product->rating ?? '5.00' }}</strong>
                                                            trên 5</span>
                                                    </div>
                                                    <span class="review-count">({{ $product->reviews_count ?? 1 }})</span>
                                                </div>
                                                <form action="{{ route('cart-detail') }}" method="POST"
                                                    class="mt-3 w-100">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="quantity" value="1">

                                                    @if ($product->variants && $product->variants->count() > 0)
                                                        @foreach ($product->variants->first()->variantAttributes ?? [] as $variantAttr)
                                                            @php
                                                                $valueId =
                                                                    $variantAttr->attribute_value_id ??
                                                                    ($variantAttr->value_id ??
                                                                        optional($variantAttr->value)->id);
                                                            @endphp
                                                            <input type="hidden"
                                                                name="attribute[{{ $variantAttr->attribute_id }}]"
                                                                value="{{ $valueId }}">
                                                        @endforeach
                                                    @endif

                                                    <button type="submit"
                                                        class="button product_type_simple add_to_cart_button">
                                                        Mua ngay
                                                    </button>
                                                </form>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- .products -->
                                </div>
                                <!-- .woocommerce -->
                            </div>
                            <!-- .section-products-carousel-tabs -->
                        </div>
                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            </div>
            <!-- .row -->
        </div>
        <!-- .col-full -->
    </div>
@endsection
