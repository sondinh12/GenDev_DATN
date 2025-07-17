@extends('client.layout.master')

@section('content')
@if(session('error'))
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
                        <div class="slider-1" style="background-image: url(assets/images/slider/home-v1-background.jpg);">
                            <img src="assets/images/slider/home-v1-img-1.png" alt="">
                            <div class="caption">
                                <div class="title">Turn. Click. Expand. Smart modular design simplifies adding storage for growing media.</div>
                                <div class="sub-title">Powerful Six Core processor, vibrant 4KUHD display output and fast SSD elegantly cased in a soft alloy design.</div>
                                <div class="button">Get Yours now
                                    <i class="tm tm-long-arrow-right"></i>
                                </div>
                                <div class="bottom-caption">Free shipping on US Terority</div>
                            </div>
                        </div>
                        <!-- .slider-1 -->
                        <div class="slider-1 slider-2" style="background-image: url(assets/images/slider/home-v1-background.jpg);">
                            <img src="assets/images/slider/home-v1-img-2.png" alt="">
                            <div class="caption">
                                <div class="title">The new-tech gift you
                                    <br> are wishing for is
                                    <br> right here</div>
                                <div class="sub-title">Big screens in incredibly slim designs
                                    <br>that in your hand.</div>
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
                            {{-- <h4 class="pre-title">Nổi bật</h4> --}}
                            <h2 class="section-title">Danh mục
                                <br>sản phẩm</h2>
                            <nav class="custom-slick-nav"></nav>
                            <!-- .custom-slick-nav -->
                        </header>
                        <!-- .section-header -->
                        <div class="product-categories-1 product-categories-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#categories-carousel-1 .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                            <div class="woocommerce columns-5">
                                <div class="products">
                                    @foreach($categories as $category)
                                        <div class="product-category product">
                                            <a href="#">
                                                <img class="category-img" 
                                                width="224" height="197" 
                                                object-fit= "cover" 
                                                border-radius= "12px"
                                                box-shadow= "0 2px 8px rgba(0,0,0,0.08)"
                                                background= "#f5f5f5"
                                                display= "block"
                                                margin= "0 auto"
                                                alt="{{ $category->name }}" src="{{ Str::startsWith($category->image, ['http://', 'https://']) 
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

                    <div class="banners">
                        <div class="row">
                            <div class="banner banner-long text-in-right">
                                <a href="shop.html">
                                    <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/3-2.jpg ); height: 259px;" class="banner-bg">
                                        <div class="caption">
                                            <div class="banner-info">
                                                <h3 class="title">
                                                    <strong>Shop now</strong> to find savings on everything you need
                                                    <br> for the big game.</h3>
                                            </div>
                                            <!-- /.banner-info -->
                                            <span class="banner-action button">Browse</span>
                                        </div>
                                        <!-- /.caption -->
                                    </div>
                                    <!-- /.banner-bg -->
                                </a>
                            </div>
                            <!-- /.banner -->
                            <div class="banner banner-short text-in-left">
                                <a href="shop.html">
                                    <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/3-3.jpg ); height: 259px;" class="banner-bg">
                                        <div class="caption">
                                            <div class="banner-info">
                                                <h3 class="title">
                                                    <strong>1000 mAh</strong>
                                                    <br> Power Bank Pro.</h3>
                                            </div>
                                            <!-- /.banner-info -->
                                            <span class="price">$34.99</span>
                                            <span class="banner-action button">Buy Now</span>
                                        </div>
                                        <!-- /.caption -->
                                    </div>
                                    <!-- /.banner-bg -->
                                </a>
                            </div>
                            <!-- /.banner -->
                        </div>
                        <!-- /.row -->
                    </div>
                    
                    <div class="section-deals-carousel-and-products-carousel-tabs row">
                        <div id="grid-extended" class="tab-pane" role="tabpanel">
                        <div class="woocommerce columns-7">
                            <div class="products">
                                @foreach($products as $product)
                                    <div class="product {{ $loop->first ? 'first' : '' }} {{ $loop->last ? 'last' : '' }}">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                        </div>
                                        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="{{ route('product.show', $product->id) }}">
                                            <img width="224" height="197" alt="{{ $product->name }}" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="{{ $product->image }}">
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>{{ number_format($product->price, 2) }}</span>
                                            </span>
                                            <h2 class="woocommerce-loop-product__title">{{ $product->name }}</h2>
                                        </a>
                                        <div class="techmarket-product-rating">
                                            <div title="Rated {{ $product->rating ?? '5.00' }} out of 5" class="star-rating">
                                                <span style="width:{{ ($product->rating ?? 5) * 20 }}%">
                                                    <strong class="rating">{{ $product->rating ?? '5.00' }}</strong> out of 5</span>
                                            </div>
                                            <span class="review-count">({{ $product->reviews_count ?? 1 }})</span>
                                        </div>
                                        <span class="sku_wrapper">SKU:
                                            <span class="sku">{{ $product->sku ?? 'N/A' }}</span>
                                        </span>
                                        <form action="{{ route('cart-detail') }}" method="POST" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="button product_type_simple add_to_cart_button">Add to cart</button>
                                        </form>
                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                    </div>
                                @endforeach
                            </div>
                            <!-- .products -->
                        </div>
                        <!-- .woocommerce -->
                    </div>
                        <!-- .section-products-carousel-tabs -->
                    </div>
                    
                    <!-- .fullwidth-notice -->
                    
                    <!-- .section-categories-carousel -->
                    <section style="background-size: cover; background-position: center center; background-image: url( assets/images/products/card-bg.jpg ); height: 853px;" class="section-landscape-full-product-cards-carousel">
                        <div class="col-full">
                            <header class="section-header">
                                <h2 class="section-title">
                                    <strong>Power Audio &amp; Visual </strong>entertainment
                                </h2>
                            </header>
                            <!-- .section-header -->
                            <div class="row">
                                <div class="landscape-full-product-cards-carousel">
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;rows&quot;:2,&quot;slidesPerRow&quot;:2,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:767,&quot;settings&quot;:{&quot;slidesPerRow&quot;:2,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesPerRow&quot;:1,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce columns-2">
                                                <div class="products">
                                                    <div class="landscape-product-card product">
                                                        <div class="media">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <img class="wp-post-image" src="assets/images/products/1-2.jpg" alt="">
                                                            </a>
                                                            <div class="media-body">
                                                                <a class="woocommerce-LoopProduct-link " href="single-product-fullwidth.html">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> $939.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="amount">$627.99</span>
                                                                        </del>
                                                                    </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">UN40H5003 40-Inch 1080p LED TV with Backlight</h2>
                                                                    <div class="ribbon green-label">
                                                                        <span>A++</span>
                                                                    </div>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                            <span style="width:0%">
                                                                                <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html">Add to cart</a>
                                                                    <a href="compare.html" class="add-to-compare-link">Add to compare</a>
                                                                </div>
                                                                <!-- .hover-area -->
                                                            </div>
                                                            <!-- .media-body -->
                                                        </div>
                                                        <!-- .media -->
                                                    </div>
                                                    <!-- .woocommerce-LoopProduct-link -->
                                                    <div class="landscape-product-card product">
                                                        <div class="media">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <img class="wp-post-image" src="assets/images/products/1-4.jpg" alt="">
                                                            </a>
                                                            <div class="media-body">
                                                                <a class="woocommerce-LoopProduct-link " href="single-product-fullwidth.html">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> $939.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="amount">$627.99</span>
                                                                        </del>
                                                                    </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">60UH6150 60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                    <div class="ribbon green-label">
                                                                        <span>A+</span>
                                                                    </div>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                            <span style="width:0%">
                                                                                <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html">Add to cart</a>
                                                                    <a href="compare.html" class="add-to-compare-link">Add to compare</a>
                                                                </div>
                                                                <!-- .hover-area -->
                                                            </div>
                                                            <!-- .media-body -->
                                                        </div>
                                                        <!-- .media -->
                                                    </div>
                                                    <!-- .woocommerce-LoopProduct-link -->
                                                    <div class="landscape-product-card product">
                                                        <div class="media">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <img class="wp-post-image" src="assets/images/products/1-1.jpg" alt="">
                                                            </a>
                                                            <div class="media-body">
                                                                <a class="woocommerce-LoopProduct-link " href="single-product-fullwidth.html">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> $939.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="amount">$627.99</span>
                                                                        </del>
                                                                    </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">55EG9600 – 55-Inch 2160p Smart Curved Ultra HD 3D</h2>
                                                                    <div class="ribbon green-label">
                                                                        <span>A++</span>
                                                                    </div>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                            <span style="width:0%">
                                                                                <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html">Add to cart</a>
                                                                    <a href="compare.html" class="add-to-compare-link">Add to compare</a>
                                                                </div>
                                                                <!-- .hover-area -->
                                                            </div>
                                                            <!-- .media-body -->
                                                        </div>
                                                        <!-- .media -->
                                                    </div>
                                                    <!-- .woocommerce-LoopProduct-link -->
                                                    <div class="landscape-product-card product">
                                                        <div class="media">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <img class="wp-post-image" src="assets/images/products/1-6.jpg" alt="">
                                                            </a>
                                                            <div class="media-body">
                                                                <a class="woocommerce-LoopProduct-link " href="single-product-fullwidth.html">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> $939.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="amount">$627.99</span>
                                                                        </del>
                                                                    </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">55UP130 55-Inch 4K Ultra HD Roku Smart LED TV</h2>
                                                                    <div class="ribbon green-label">
                                                                        <span>A+</span>
                                                                    </div>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                            <span style="width:0%">
                                                                                <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html">Add to cart</a>
                                                                    <a href="compare.html" class="add-to-compare-link">Add to compare</a>
                                                                </div>
                                                                <!-- .hover-area -->
                                                            </div>
                                                            <!-- .media-body -->
                                                        </div>
                                                        <!-- .media -->
                                                    </div>
                                                    <!-- .woocommerce-LoopProduct-link -->
                                                    <div class="landscape-product-card product">
                                                        <div class="media">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <img class="wp-post-image" src="assets/images/products/1-2.jpg" alt="">
                                                            </a>
                                                            <div class="media-body">
                                                                <a class="woocommerce-LoopProduct-link " href="single-product-fullwidth.html">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> $939.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="amount">$627.99</span>
                                                                        </del>
                                                                    </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">55″ KU6470 6 Series UHD Crystal Colour HDR Smart TV</h2>
                                                                    <div class="ribbon green-label">
                                                                        <span>A+</span>
                                                                    </div>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                            <span style="width:0%">
                                                                                <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html">Add to cart</a>
                                                                    <a href="compare.html" class="add-to-compare-link">Add to compare</a>
                                                                </div>
                                                                <!-- .hover-area -->
                                                            </div>
                                                            <!-- .media-body -->
                                                        </div>
                                                        <!-- .media -->
                                                    </div>
                                                    <!-- .woocommerce-LoopProduct-link -->
                                                    <div class="landscape-product-card product">
                                                        <div class="media">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <img class="wp-post-image" src="assets/images/products/1-5.jpg" alt="">
                                                            </a>
                                                            <div class="media-body">
                                                                <a class="woocommerce-LoopProduct-link " href="single-product-fullwidth.html">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> $939.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="amount">$627.99</span>
                                                                        </del>
                                                                    </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">55″ KU6470 6 Series UHD Crystal Colour HDR Smart TV</h2>
                                                                    <div class="ribbon green-label">
                                                                        <span>A++</span>
                                                                    </div>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                            <span style="width:0%">
                                                                                <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html">Add to cart</a>
                                                                    <a href="compare.html" class="add-to-compare-link">Add to compare</a>
                                                                </div>
                                                                <!-- .hover-area -->
                                                            </div>
                                                            <!-- .media-body -->
                                                        </div>
                                                        <!-- .media -->
                                                    </div>
                                                    <!-- .woocommerce-LoopProduct-link -->
                                                    <div class="landscape-product-card product">
                                                        <div class="media">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <img class="wp-post-image" src="assets/images/products/1-3.jpg" alt="">
                                                            </a>
                                                            <div class="media-body">
                                                                <a class="woocommerce-LoopProduct-link " href="single-product-fullwidth.html">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> $939.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="amount">$627.99</span>
                                                                        </del>
                                                                    </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">55EG9600 – 55-Inch 2160p Smart Curved Ultra HD 3D</h2>
                                                                    <div class="ribbon green-label">
                                                                        <span>A+</span>
                                                                    </div>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                            <span style="width:0%">
                                                                                <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html">Add to cart</a>
                                                                    <a href="compare.html" class="add-to-compare-link">Add to compare</a>
                                                                </div>
                                                                <!-- .hover-area -->
                                                            </div>
                                                            <!-- .media-body -->
                                                        </div>
                                                        <!-- .media -->
                                                    </div>
                                                    <!-- .woocommerce-LoopProduct-link -->
                                                    <div class="landscape-product-card product">
                                                        <div class="media">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                                <img class="wp-post-image" src="assets/images/products/1-5.jpg" alt="">
                                                            </a>
                                                            <div class="media-body">
                                                                <a class="woocommerce-LoopProduct-link " href="single-product-fullwidth.html">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="amount"> $939.99</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="amount">$627.99</span>
                                                                        </del>
                                                                    </span>
                                                                    <!-- .price -->
                                                                    <h2 class="woocommerce-loop-product__title">65UH7700 65-Inch 4K Ultra HD Smart LED TV</h2>
                                                                    <div class="ribbon green-label">
                                                                        <span>A</span>
                                                                    </div>
                                                                    <div class="techmarket-product-rating">
                                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                                            <span style="width:0%">
                                                                                <strong class="rating">0</strong> out of 5</span>
                                                                        </div>
                                                                        <span class="review-count">(0)</span>
                                                                    </div>
                                                                    <!-- .techmarket-product-rating -->
                                                                </a>
                                                                <div class="hover-area">
                                                                    <a class="button add_to_cart_button" href="cart.html">Add to cart</a>
                                                                    <a href="compare.html" class="add-to-compare-link">Add to compare</a>
                                                                </div>
                                                                <!-- .hover-area -->
                                                            </div>
                                                            <!-- .media-body -->
                                                        </div>
                                                        <!-- .media -->
                                                    </div>
                                                    <!-- .woocommerce-LoopProduct-link -->
                                                </div>
                                                <!-- .products -->
                                            </div>
                                            <!-- .woocommerce -->
                                        </div>
                                        <!-- .container-fluid -->
                                    </div>
                                    <!-- .slick-dots -->
                                </div>
                                <!-- .landscape-full-product-cards-carousel -->
                            </div>
                            <!-- .row -->
                        </div>
                        <!-- .col-full -->
                    </section>
                    <!-- .slick-dots -->
                    <section class="section-hot-new-arrivals section-products-carousel-tabs techmarket-tabs">
                        <div class="section-products-carousel-tabs-wrap">
                            <header class="section-header">
                                <h2 class="section-title">Hot Best Sellers</h2>
                                <ul role="tablist" class="nav justify-content-end">
                                    <li class="nav-item"><a class="nav-link active" href="#tab-59f89f08825d50" data-toggle="tab">Top 20</a></li>
                                    <li class="nav-item"><a class="nav-link " href="#tab-59f89f08825d51" data-toggle="tab">Audio &amp; Video</a></li>
                                    <li class="nav-item"><a class="nav-link " href="#tab-59f89f08825d52" data-toggle="tab">Laptops &amp; Computers</a></li>
                                    <li class="nav-item"><a class="nav-link " href="#tab-59f89f08825d53" data-toggle="tab">Video Cameras</a></li>
                                </ul>
                            </header>
                            <!-- .section-header -->
                            <div class="tab-content">
                                <div id="tab-59f89f08825d50" class="tab-pane active" role="tabpanel">
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                            <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 262.81</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">399.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 399.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                            <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 789.95</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">999.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 262.81</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                            <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 309.95</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">459.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                </div>
                                            </div>
                                            <!-- .woocommerce -->
                                        </div>
                                        <!-- .container-fluid -->
                                    </div>
                                    <!-- .products-carousel -->
                                </div>
                                <!-- .tab-pane -->
                                <div id="tab-59f89f08825d51" class="tab-pane " role="tabpanel">
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                            <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 789.95</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">999.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 399.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 262.81</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                            <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 262.81</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">399.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                            <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 309.95</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">459.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                </div>
                                            </div>
                                            <!-- .woocommerce -->
                                        </div>
                                        <!-- .container-fluid -->
                                    </div>
                                    <!-- .products-carousel -->
                                </div>
                                <!-- .tab-pane -->
                                <div id="tab-59f89f08825d52" class="tab-pane " role="tabpanel">
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                            <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 789.95</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">999.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 399.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 262.81</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                            <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 262.81</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">399.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                            <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 309.95</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">459.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                            <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 262.81</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">399.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                            <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 789.95</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">999.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                </div>
                                            </div>
                                            <!-- .woocommerce -->
                                        </div>
                                        <!-- .container-fluid -->
                                    </div>
                                    <!-- .products-carousel -->
                                </div>
                                <!-- .tab-pane -->
                                <div id="tab-59f89f08825d53" class="tab-pane " role="tabpanel">
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 399.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 262.81</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                            <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 309.95</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">459.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                            <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 262.81</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">399.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <span class="onsale">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                            </span>
                                                            <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> 789.95</span>
                                                                </ins>
                                                                <del>
                                                                    <span class="amount">999.00</span>
                                                                </del>
                                                                <span class="amount"> </span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                    <div class="product">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                        </div>
                                                        <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                            <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="amount"> </span>
                                                                </ins>
                                                                <span class="amount"> 456.00</span>
                                                            </span>
                                                            <!-- /.price -->
                                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                </div>
                                            </div>
                                            <!-- .woocommerce -->
                                        </div>
                                        <!-- .container-fluid -->
                                    </div>
                                    <!-- .products-carousel -->
                                </div>
                                <!-- .tab-pane -->
                            </div>
                            <!-- .tab-content -->
                        </div>
                        <!-- .section-products-carousel-tabs-wrap -->
                    </section>
                    <!-- .section-products-carousel-tabs -->
                    
                    <!-- /.banners -->
                    <section class="section-landscape-products-carousel 4-column-landscape-carousel" id="landscape-products-carousel">
                        <header class="section-header">
                            <h2 class="section-title">Video Cameras & Photography</h2>
                            <nav class="custom-slick-nav"></nav>
                        </header>
                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:2,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#landscape-products-carousel .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}}]}">
                            <div class="container-fluid">
                                <div class="woocommerce columns-5">
                                    <div class="products">
                                        <div class="landscape-product product">
                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/card-2.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="price">
                                                            <ins>
                                                                <span class="amount"> </span>
                                                            </ins>
                                                            <span class="amount"> $500</span>
                                                        </span>
                                                        <!-- .price -->
                                                        <h2 class="woocommerce-loop-product__title">Headset 3D Glasses VR for Android</h2>
                                                        <div class="techmarket-product-rating">
                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                <span style="width:0%">
                                                                    <strong class="rating">0</strong> out of 5</span>
                                                            </div>
                                                            <span class="review-count">(0)</span>
                                                        </div>
                                                        <!-- .techmarket-product-rating -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </a>
                                            <!-- .woocommerce-LoopProduct-link -->
                                        </div>
                                        <!-- .landscape-product -->
                                        <div class="landscape-product product">
                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/card-6.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="price">
                                                            <ins>
                                                                <span class="amount"> </span>
                                                            </ins>
                                                            <span class="amount"> $600</span>
                                                        </span>
                                                        <!-- .price -->
                                                        <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                        <div class="techmarket-product-rating">
                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                <span style="width:0%">
                                                                    <strong class="rating">0</strong> out of 5</span>
                                                            </div>
                                                            <span class="review-count">(0)</span>
                                                        </div>
                                                        <!-- .techmarket-product-rating -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </a>
                                            <!-- .woocommerce-LoopProduct-link -->
                                        </div>
                                        <!-- .landscape-product -->
                                        <div class="landscape-product product">
                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/card-3.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="price">
                                                            <ins>
                                                                <span class="amount"> $3,788.00</span>
                                                            </ins>
                                                            <del>
                                                                <span class="amount">$4,780.00</span>
                                                            </del>
                                                            <span class="amount"> </span>
                                                        </span>
                                                        <!-- .price -->
                                                        <h2 class="woocommerce-loop-product__title">PowerBank 4400</h2>
                                                        <div class="techmarket-product-rating">
                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                <span style="width:0%">
                                                                    <strong class="rating">0</strong> out of 5</span>
                                                            </div>
                                                            <span class="review-count">(0)</span>
                                                        </div>
                                                        <!-- .techmarket-product-rating -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </a>
                                            <!-- .woocommerce-LoopProduct-link -->
                                        </div>
                                        <!-- .landscape-product -->
                                        <div class="landscape-product product">
                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/card-3.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="price">
                                                            <ins>
                                                                <span class="amount"> $3,788.00</span>
                                                            </ins>
                                                            <del>
                                                                <span class="amount">$4,780.00</span>
                                                            </del>
                                                            <span class="amount"> </span>
                                                        </span>
                                                        <!-- .price -->
                                                        <h2 class="woocommerce-loop-product__title">PowerBank 4400</h2>
                                                        <div class="techmarket-product-rating">
                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                <span style="width:0%">
                                                                    <strong class="rating">0</strong> out of 5</span>
                                                            </div>
                                                            <span class="review-count">(0)</span>
                                                        </div>
                                                        <!-- .techmarket-product-rating -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </a>
                                            <!-- .woocommerce-LoopProduct-link -->
                                        </div>
                                        <!-- .landscape-product -->
                                        <div class="landscape-product product">
                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/card-5.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="price">
                                                            <ins>
                                                                <span class="amount"> $3,788.00</span>
                                                            </ins>
                                                            <del>
                                                                <span class="amount">$4,780.00</span>
                                                            </del>
                                                            <span class="amount"> </span>
                                                        </span>
                                                        <!-- .price -->
                                                        <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                        <div class="techmarket-product-rating">
                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                <span style="width:0%">
                                                                    <strong class="rating">0</strong> out of 5</span>
                                                            </div>
                                                            <span class="review-count">(0)</span>
                                                        </div>
                                                        <!-- .techmarket-product-rating -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </a>
                                            <!-- .woocommerce-LoopProduct-link -->
                                        </div>
                                        <!-- .landscape-product -->
                                        <div class="landscape-product product">
                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/card-1.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="price">
                                                            <ins>
                                                                <span class="amount"> $3,788.00</span>
                                                            </ins>
                                                            <del>
                                                                <span class="amount">$4,780.00</span>
                                                            </del>
                                                            <span class="amount"> </span>
                                                        </span>
                                                        <!-- .price -->
                                                        <h2 class="woocommerce-loop-product__title">Unlocked Android 6″ Inch 4.4.2 Dual Core</h2>
                                                        <div class="techmarket-product-rating">
                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                <span style="width:0%">
                                                                    <strong class="rating">0</strong> out of 5</span>
                                                            </div>
                                                            <span class="review-count">(0)</span>
                                                        </div>
                                                        <!-- .techmarket-product-rating -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </a>
                                            <!-- .woocommerce-LoopProduct-link -->
                                        </div>
                                        <!-- .landscape-product -->
                                        <div class="landscape-product product">
                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/card-4.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="price">
                                                            <ins>
                                                                <span class="amount"> </span>
                                                            </ins>
                                                            <span class="amount"> $800</span>
                                                        </span>
                                                        <!-- .price -->
                                                        <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                        <div class="techmarket-product-rating">
                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                <span style="width:0%">
                                                                    <strong class="rating">0</strong> out of 5</span>
                                                            </div>
                                                            <span class="review-count">(0)</span>
                                                        </div>
                                                        <!-- .techmarket-product-rating -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </a>
                                            <!-- .woocommerce-LoopProduct-link -->
                                        </div>
                                        <!-- .landscape-product -->
                                        <div class="landscape-product product">
                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/card-4.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="price">
                                                            <ins>
                                                                <span class="amount"> </span>
                                                            </ins>
                                                            <span class="amount"> $800</span>
                                                        </span>
                                                        <!-- .price -->
                                                        <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                        <div class="techmarket-product-rating">
                                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                <span style="width:0%">
                                                                    <strong class="rating">0</strong> out of 5</span>
                                                            </div>
                                                            <span class="review-count">(0)</span>
                                                        </div>
                                                        <!-- .techmarket-product-rating -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </a>
                                            <!-- .woocommerce-LoopProduct-link -->
                                        </div>
                                        <!-- .landscape-product -->
                                    </div>
                                </div>
                                <!-- /.woocommerce -->
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                        <!-- /.products-carousel -->
                    </section>

                    <section class="full-width section-products-carousel-tabs section-product-carousel-with-featured-product carousel-with-featured-1">
                        <header class="section-header">
                            <h2 class="section-title">Hot New Arrivals</h2>
                            <ul role="tablist" class="nav justify-content-center">
                                <li class="nav-item"><a class="nav-link active" href="#top-20-1" data-toggle="tab">Top 20</a></li>
                                <li class="nav-item"><a class="nav-link" href="#digital-cameras" data-toggle="tab">Digital Cameras</a></li>
                                <li class="nav-item"><a class="nav-link" href="#action-cameras" data-toggle="tab">Action Cameras</a></li>
                                <li class="nav-item"><a class="nav-link" href="#compacts" data-toggle="tab">Compacts</a></li>
                            </ul>
                        </header>
                        <div class="tab-content">
                            <div role="tabpanel" id="top-20-1" class="tab-pane active">
                                <div class="tab-product-carousel-with-featured-product">
                                    <div class="tab-carousel-products">
                                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;rows&quot;:2,&quot;slidesPerRow&quot;:6,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesPerRow&quot;:2,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesPerRow&quot;:3,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:1599,&quot;settings&quot;:{&quot;slidesPerRow&quot;:4,&quot;slidesToScroll&quot;:1}}]}">
                                            <div class="container-fluid">
                                                <div class="woocommerce columns-6">
                                                    <div class="products">
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <span class="onsale">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                </span>
                                                                <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> 262.81</span>
                                                                    </ins>
                                                                    <del>
                                                                        <span class="amount">399.00</span>
                                                                    </del>
                                                                    <span class="amount"> </span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <span class="onsale">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                </span>
                                                                <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> 789.95</span>
                                                                    </ins>
                                                                    <del>
                                                                        <span class="amount">999.00</span>
                                                                    </del>
                                                                    <span class="amount"> </span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <span class="onsale">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                </span>
                                                                <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> 309.95</span>
                                                                    </ins>
                                                                    <del>
                                                                        <span class="amount">459.00</span>
                                                                    </del>
                                                                    <span class="amount"> </span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 399.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 262.81</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                    </div>
                                                </div>
                                                <!-- .woocommerce-->
                                            </div>
                                            <!-- .container-fluid -->
                                        </div>
                                        <!-- .products-carousel -->
                                    </div>
                                    <!-- .tab-carousel-products -->
                                    <div class="tab-featured-product">
                                        <div class="woocommerce columns-1">
                                            <div class="products">
                                                <div class="tab-product-featured product">
                                                    <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                        <img width="600" height="600" alt="" class="attachment-shop_single size-shop_single wp-post-image" src="assets/images/products/featured.jpg">
                                                        <span class="price">
                                                            <ins>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>179.99</span>
                                                            </ins>
                                                            <del>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>239.99</span>
                                                            </del>
                                                        </span>
                                                        <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                    </a>
                                                    <div class="techmarket-product-rating">
                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                            <span style="width:0%">
                                                                <strong class="rating">0</strong> out of 5</span>
                                                        </div>
                                                        <span class="review-count">(0)</span>
                                                    </div>
                                                    <a class="button add_to_cart_button" href="cart.html">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .tab-featured-product -->
                                </div>
                                <!-- .tab-product-carousel-with-featured-product -->
                            </div>
                            <!-- .tab-pane -->
                            <div role="tabpanel" id="digital-cameras" class="tab-pane">
                                <div class="tab-product-carousel-with-featured-product">
                                    <div class="tab-carousel-products">
                                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;rows&quot;:2,&quot;slidesPerRow&quot;:6,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesPerRow&quot;:2,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesPerRow&quot;:3,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:1599,&quot;settings&quot;:{&quot;slidesPerRow&quot;:4,&quot;slidesToScroll&quot;:1}}]}">
                                            <div class="container-fluid">
                                                <div class="woocommerce columns-6">
                                                    <div class="products">
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <span class="onsale">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                </span>
                                                                <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> 789.95</span>
                                                                    </ins>
                                                                    <del>
                                                                        <span class="amount">999.00</span>
                                                                    </del>
                                                                    <span class="amount"> </span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 262.81</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <span class="onsale">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                </span>
                                                                <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> 262.81</span>
                                                                    </ins>
                                                                    <del>
                                                                        <span class="amount">399.00</span>
                                                                    </del>
                                                                    <span class="amount"> </span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <span class="onsale">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                </span>
                                                                <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> 309.95</span>
                                                                    </ins>
                                                                    <del>
                                                                        <span class="amount">459.00</span>
                                                                    </del>
                                                                    <span class="amount"> </span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 399.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                    </div>
                                                </div>
                                                <!-- .woocommerce-->
                                            </div>
                                            <!-- .container-fluid -->
                                        </div>
                                        <!-- .products-carousel -->
                                    </div>
                                    <!-- .tab-carousel-products -->
                                    <div class="tab-featured-product">
                                        <div class="woocommerce columns-1">
                                            <div class="products">
                                                <div class="tab-product-featured product">
                                                    <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                        <img width="600" height="600" alt="" class="attachment-shop_single size-shop_single wp-post-image" src="assets/images/products/featured-1.jpg">
                                                        <span class="price">
                                                            <ins>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>179.99</span>
                                                            </ins>
                                                            <del>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>239.99</span>
                                                            </del>
                                                        </span>
                                                        <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                    </a>
                                                    <div class="techmarket-product-rating">
                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                            <span style="width:0%">
                                                                <strong class="rating">0</strong> out of 5</span>
                                                        </div>
                                                        <span class="review-count">(0)</span>
                                                    </div>
                                                    <a class="button add_to_cart_button" href="cart.html">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .tab-featured-product -->
                                </div>
                                <!-- .tab-product-carousel-with-featured-product -->
                            </div>
                            <!-- .tab-pane -->
                            <div role="tabpanel" id="action-cameras" class="tab-pane">
                                <div class="tab-product-carousel-with-featured-product">
                                    <div class="tab-carousel-products">
                                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;rows&quot;:2,&quot;slidesPerRow&quot;:6,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesPerRow&quot;:2,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesPerRow&quot;:3,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:1599,&quot;settings&quot;:{&quot;slidesPerRow&quot;:4,&quot;slidesToScroll&quot;:1}}]}">
                                            <div class="container-fluid">
                                                <div class="woocommerce columns-6">
                                                    <div class="products">
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <span class="onsale">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                </span>
                                                                <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> 789.95</span>
                                                                    </ins>
                                                                    <del>
                                                                        <span class="amount">999.00</span>
                                                                    </del>
                                                                    <span class="amount"> </span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 262.81</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <span class="onsale">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                </span>
                                                                <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> 309.95</span>
                                                                    </ins>
                                                                    <del>
                                                                        <span class="amount">459.00</span>
                                                                    </del>
                                                                    <span class="amount"> </span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <span class="onsale">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                </span>
                                                                <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> 262.81</span>
                                                                    </ins>
                                                                    <del>
                                                                        <span class="amount">399.00</span>
                                                                    </del>
                                                                    <span class="amount"> </span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 399.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                    </div>
                                                </div>
                                                <!-- .woocommerce-->
                                            </div>
                                            <!-- .container-fluid -->
                                        </div>
                                        <!-- .products-carousel -->
                                    </div>
                                    <!-- .tab-carousel-products -->
                                    <div class="tab-featured-product">
                                        <div class="woocommerce columns-1">
                                            <div class="products">
                                                <div class="tab-product-featured product">
                                                    <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                        <img width="600" height="600" alt="" class="attachment-shop_single size-shop_single wp-post-image" src="assets/images/products/featured.jpg">
                                                        <span class="price">
                                                            <ins>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>179.99</span>
                                                            </ins>
                                                            <del>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>239.99</span>
                                                            </del>
                                                        </span>
                                                        <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                    </a>
                                                    <div class="techmarket-product-rating">
                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                            <span style="width:0%">
                                                                <strong class="rating">0</strong> out of 5</span>
                                                        </div>
                                                        <span class="review-count">(0)</span>
                                                    </div>
                                                    <a class="button add_to_cart_button" href="cart.html">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .tab-featured-product -->
                                </div>
                                <!-- .tab-product-carousel-with-featured-product -->
                            </div>
                            <!-- .tab-pane -->
                            <div role="tabpanel" id="compacts" class="tab-pane">
                                <div class="tab-product-carousel-with-featured-product">
                                    <div class="tab-carousel-products">
                                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;rows&quot;:2,&quot;slidesPerRow&quot;:6,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesPerRow&quot;:2,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesPerRow&quot;:3,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:1599,&quot;settings&quot;:{&quot;slidesPerRow&quot;:4,&quot;slidesToScroll&quot;:1}}]}">
                                            <div class="container-fluid">
                                                <div class="woocommerce columns-6">
                                                    <div class="products">
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/16.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 262.81</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <span class="onsale">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                </span>
                                                                <img src="assets/images/products/7.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> 789.95</span>
                                                                    </ins>
                                                                    <del>
                                                                        <span class="amount">999.00</span>
                                                                    </del>
                                                                    <span class="amount"> </span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/9.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/5.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">XONE Wireless Controller</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/1.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/10.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <span class="onsale">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                </span>
                                                                <img src="assets/images/products/14.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> 262.81</span>
                                                                    </ins>
                                                                    <del>
                                                                        <span class="amount">399.00</span>
                                                                    </del>
                                                                    <span class="amount"> </span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/11.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/13.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Drone WIFI FPV With 4K</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <span class="onsale">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">$</span>150.04</span>
                                                                </span>
                                                                <img src="assets/images/products/2.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> 309.95</span>
                                                                    </ins>
                                                                    <del>
                                                                        <span class="amount">459.00</span>
                                                                    </del>
                                                                    <span class="amount"> </span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 399.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Band Fitbit Flex</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/6.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/12.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/4.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">4K Action Cam with Wi-Fi & GPS</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/8.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">Video & Air Quality Monitor</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                        <div class="product">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <a href="single-product-fullwidth.html" class="woocommerce-LoopProduct-link">
                                                                <img src="assets/images/products/3.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> </span>
                                                                    </ins>
                                                                    <span class="amount"> 456.00</span>
                                                                </span>
                                                                <!-- /.price -->
                                                                <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                                            </a>
                                                            <div class="hover-area">
                                                                <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.product-outer -->
                                                    </div>
                                                </div>
                                                <!-- .woocommerce-->
                                            </div>
                                            <!-- .container-fluid -->
                                        </div>
                                        <!-- .products-carousel -->
                                    </div>
                                    <!-- .tab-carousel-products -->
                                    <div class="tab-featured-product">
                                        <div class="woocommerce columns-1">
                                            <div class="products">
                                                <div class="tab-product-featured product">
                                                    <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                        <img width="600" height="600" alt="" class="attachment-shop_single size-shop_single wp-post-image" src="assets/images/products/featured-1.jpg">
                                                        <span class="price">
                                                            <ins>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>179.99</span>
                                                            </ins>
                                                            <del>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>239.99</span>
                                                            </del>
                                                        </span>
                                                        <h2 class="woocommerce-loop-product__title">Snap White Instant Digital Camera in White</h2>
                                                    </a>
                                                    <div class="techmarket-product-rating">
                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                            <span style="width:0%">
                                                                <strong class="rating">0</strong> out of 5</span>
                                                        </div>
                                                        <span class="review-count">(0)</span>
                                                    </div>
                                                    <a class="button add_to_cart_button" href="cart.html">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .tab-featured-product -->
                                </div>
                                <!-- .tab-product-carousel-with-featured-product -->
                            </div>
                            <!-- .tab-pane -->
                        </div>
                        <!-- .tab-content -->
                    </section>
                    <!-- .section-products-carousel-tabs-->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</div>
@if(session('success') || session('error'))
    <div id="toast-message" class="toast-message {{ session('success') ? 'success' : 'error' }}">
        <span class="toast-icon">
            @if(session('success'))
                <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="12" r="12" fill="#4ade80"/><path d="M7 13l3 3 7-7" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            @else
                <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="12" r="12" fill="#f87171"/><path d="M15 9l-6 6M9 9l6 6" stroke="#fff" stroke-width="2" stroke-linecap="round"/></svg>
            @endif
        </span>
        <span class="toast-text">{{ session('success') ?? session('error') }}</span>
        <button type="button" class="toast-close" onclick="document.getElementById('toast-message').style.display='none';">&times;</button>
    </div>
@endif

<script>
    setTimeout(function() {
        var toast = document.getElementById('toast-message');
        if (toast) {
            toast.style.opacity = '0';
            setTimeout(function(){ toast.style.display = 'none'; }, 500);
        }
    }, 4000); // 4 giây
</script>

<style>
.toast-message {
    position: fixed;
    top: 28px;
    right: 28px;
    z-index: 9999;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    min-width: unset;
    max-width: 320px;
    padding: 10px 18px 10px 12px;
    border-radius: 8px;
    color: #357a38;
    font-size: 15px;
    font-weight: 500;
    background: #e6f4e6;
    border: 1.5px solid #b7e1cd;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    opacity: 0.98;
    animation: slideInRight 0.4s;
    transition: opacity 0.4s;
    white-space: nowrap;
}
.toast-message.error {
    background: #fee2e2;
    border-color: #fca5a5;
    color: #991b1b;
}
.toast-icon {
    display: flex;
    align-items: center;
    margin-right: 6px;
}
.toast-close {
    background: none;
    border: none;
    color: #357a38;
    font-size: 18px;
    font-weight: bold;
    margin-left: 8px;
    cursor: pointer;
    opacity: 0.7;
    transition: opacity 0.2s;
}
.toast-close:hover {
    opacity: 1;
}
@keyframes slideInRight {
    from { transform: translateX(60px); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}
</style>
@endsection