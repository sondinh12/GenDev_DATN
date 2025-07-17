@extends('client.layout.master')

@section('content')
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3 shadow" role="alert" style="z-index:9999; min-width:300px; max-width:90vw;">
        <i class="fas fa-exclamation-triangle me-2"></i> {{ session('error') }}
    </div>
    <script>
        setTimeout(function() {
            $('.alert-danger').alert('close');
        }, 2500);
    </script>
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
                    <!-- /.features list -->






                    <section class="section-3-2-3-product-cards-tabs-with-featured-product stretch-full-width py-4">
                        <div class="col-full">
                            <header class="section-header text-center mb-4">
                                <h2 class="section-title h3 fw-bold">
                                    <span class="text-gradient">Nhanh tay!</span>
                                    <span class="d-block text-primary mt-1">Ưu đãi đặc biệt</span>
                                </h2>
                                <ul role="tablist" class="nav nav-pills justify-content-center mb-3">
                                    @foreach($categories as $category)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $loop->first ? 'active' : '' }} btn btn-sm btn-outline-primary mx-1 rounded-pill px-3" 
                                            href="#category-{{ $category->id }}" 
                                            data-toggle="tab">{{ $category->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </header>
                            <!-- .section-header -->
                            <div class="tab-content">
                                @foreach($categories as $category)
                                <div id="category-{{ $category->id }}" class="tab-pane {{ $loop->first ? 'active' : '' }}" role="tabpanel">
                                    <div class="product-cards-3-2-3-with-featured-product">
                                        <div class="row row-cols-2 row-cols-md-4 g-3">
                                            @foreach($categoryProducts[$category->id] as $product)
                                            <div class="col-lg-3 col-md-4 col-sm-6
                                                        col-12 mb-3">
                                                <div class="card h-100 product-card border-0 shadow-lg rounded-4 position-relative overflow-hidden animate__animated animate__fadeInUp" style="min-width:0; min-height:unset;">
                                                    <div class="product-image-wrapper bg-white d-flex align-items-center justify-content-center p-2 position-relative" style="height:140px; min-height:unset;">
                                                        <a href="{{ route('client.product.show', $product->id) }}" class="d-block w-100 h-100">
                                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid product-thumbnail transition" style="max-height:110px; object-fit:contain; margin:0 auto;">
                                                        </a>
                                                        @if($product->sale_price)
                                                        <!-- <span class="badge bg-danger position-absolute" style="top:8px; left:8px; z-index:2;">-{{ round((($product->price - $product->sale_price) / $product->price) * 100) }}%</span> -->
                                                        @endif
                                                    </div>
                                                        <div class="card-body p-2 d-flex flex-column justify-content-between align-items-center text-center">
                                                        <h6 class="card-title text-truncate mb-1 fw-semibold w-100" style="font-size:1rem;">
                                                            <a href="" class="text-decoration-none text-dark">{{ $product->name }}</a>
                                                        </h6>
                                                        <div class="product-price mb-1 w-100 d-flex justify-content-center align-items-baseline gap-2">
                                                            @if($product->variants && $product->variants->count())
                                                                @php
                                                                    $salePrices = $product->variants->pluck('sale_price')->filter(function($v) { return $v > 0; });
                                                                    if ($salePrices->count()) {
                                                                        $minPrice = $salePrices->min();
                                                                        $maxPrice = $salePrices->max();
                                                                    } else {
                                                                        $prices = $product->variants->pluck('price')->filter();
                                                                        $minPrice = $prices->min();
                                                                        $maxPrice = $prices->max();
                                                                    }
                                                                @endphp
                                                                @if($minPrice == $maxPrice)
                                                                    <span class="text-primary fw-bold fs-6">{{ number_format($minPrice) }}đ</span>
                                                                @else
                                                                    <span class="text-primary fw-bold fs-6">{{ number_format($minPrice) }}đ - {{ number_format($maxPrice) }}đ</span>
                                                                @endif
                                                            @else
                                                                @if($product->sale_price)
                                                                    <span class="text-danger fw-bold fs-6">{{ number_format($product->sale_price) }}đ</span>
                                                                    <small class="text-muted text-decoration-line-through ms-1">{{ number_format($product->price) }}đ</small>
                                                                @else
                                                                    <span class="text-primary fw-bold fs-6">{{ number_format($product->price) }}đ</span>
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
                                                            <a href="#" class="btn btn-light border-0 shadow-sm rounded-circle p-2 add-to-cart" title="Thêm vào giỏ hàng">
                                                                <i class="fas fa-shopping-cart text-primary"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-light border-0 shadow-sm rounded-circle p-2 add-to-wishlist" title="Thêm vào yêu thích">
                                                                <i class="fas fa-heart text-danger"></i>
                                                            </a>
                                                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-light border-0 shadow-sm rounded-circle p-2 quick-view" title="Xem nhanh">
                                                                <i class="fas fa-eye text-info"></i>
                                                            </a>
                                                        </div>
                                                            <form action="{{ route('cart-detail') }}" method="POST" class="mt-3">
                                                                @csrf
                                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                <input type="hidden" name="quantity" value="1">
                                                                {{-- @foreach ($product->variants->first()->variantAttributes ?? [] as $variantAttr)
                                                                    <input type="hidden" name="attribute[{{ $variantAttr->attribute_id }}]" value="{{ $variantAttr->value_id }}">
                                                                @endforeach --}}
                                                                @foreach ($product->variants->first()->variantAttributes ?? [] as $variantAttr)
                                                                    @php
                                                                        $valueId = $variantAttr->attribute_value_id 
                                                                            ?? $variantAttr->value_id 
                                                                            ?? optional($variantAttr->value)->id;
                                                                    @endphp
                                                                    <input type="hidden" name="attribute[{{ $variantAttr->attribute_id }}]" value="{{ $valueId }}">
                                                                @endforeach
                                                                <button type="submit" class="btn btn-primary btn-sm w-100 rounded-pill">
                                                                    Mua ngay
                                                                </button>
                                                            </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>




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
                                                alt="{{ $category->name }}" src="{{ $category->image }}">
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
                        <section class="column-1 deals-carousel" id="sale-with-timer-carousel">
                            <div class="deals-carousel-inner-block">
                                <header class="section-header">
                                    <h2 class="section-title">
                                        <strong>Deals</strong> of the week</h2>
                                    <nav class="custom-slick-nav"></nav>
                                </header>
                                <!-- /.section-header -->
                                <div class="sale-products-with-timer-carousel deals-carousel-v1">
                                    <div class="products-carousel">
                                        <div class="container-fluid">
                                            <div class="woocommerce columns-1">
                                                <div class="products" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#sale-with-timer-carousel .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:767,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:1023,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}}]}">
                                                    <div class="sale-product-with-timer product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="sale-product-with-timer-header">
                                                                <div class="price-and-title">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>425.89</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>545.89</span>
                                                                        </del>
                                                                    </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Tablet Red EliteBook Revolve</h2>
                                                                </div>
                                                                <!-- /.price-and-title -->
                                                                <div class="sale-label-outer">
                                                                    <div class="sale-saved-label">
                                                                        <span class="saved-label-text">Save</span>
                                                                        <span class="saved-label-amount">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>120.00</span>
                                                                        </span>
                                                                    </div>
                                                                    <!-- /.sale-saved-label -->
                                                                </div>
                                                                <!-- /.sale-label-outer -->
                                                            </div>
                                                            <!-- /.sale-product-with-timer-header -->
                                                            <img width="224" height="197" alt="" class="wp-post-image" src="assets/images/products/1.jpg">
                                                            <div class="deal-progress">
                                                                <div class="deal-stock">
                                                                    <div class="stock-sold">Already Sold:
                                                                        <strong>0</strong>
                                                                    </div>
                                                                    <div class="stock-available">Available:
                                                                        <strong>1000</strong>
                                                                    </div>
                                                                </div>
                                                                <!-- /.deal-stock -->
                                                                <div class="progress">
                                                                    <span style="width:0%" class="progress-bar">0</span>
                                                                </div>
                                                                <!-- /.progress -->
                                                            </div>
                                                            <!-- /.deal-progress -->
                                                            <div class="deal-countdown-timer">
                                                                <div class="marketing-text">
                                                                    <span class="line-1">Hurry up!</span>
                                                                    <span class="line-2">Offers ends in:</span>
                                                                </div>
                                                                <!-- /.marketing-text -->
                                                                <span class="deal-time-diff" style="display:none;">28800</span>
                                                                <div class="deal-countdown countdown"></div>
                                                            </div>
                                                            <!-- /.deal-countdown-timer -->
                                                        </a>
                                                        <!-- /.woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- /.sale-product-with-timer -->
                                                    <div class="sale-product-with-timer product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="sale-product-with-timer-header">
                                                                <div class="price-and-title">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>425.89</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>545.89</span>
                                                                        </del>
                                                                    </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Tablet Red EliteBook Revolve</h2>
                                                                </div>
                                                                <!-- /.price-and-title -->
                                                                <div class="sale-label-outer">
                                                                    <div class="sale-saved-label">
                                                                        <span class="saved-label-text">Save</span>
                                                                        <span class="saved-label-amount">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>120.00</span>
                                                                        </span>
                                                                    </div>
                                                                    <!-- /.sale-saved-label -->
                                                                </div>
                                                                <!-- /.sale-label-outer -->
                                                            </div>
                                                            <!-- /.sale-product-with-timer-header -->
                                                            <img width="224" height="197" alt="" class="wp-post-image" src="assets/images/products/2.jpg">
                                                            <div class="deal-progress">
                                                                <div class="deal-stock">
                                                                    <div class="stock-sold">Already Sold:
                                                                        <strong>0</strong>
                                                                    </div>
                                                                    <div class="stock-available">Available:
                                                                        <strong>1000</strong>
                                                                    </div>
                                                                </div>
                                                                <!-- /.deal-stock -->
                                                                <div class="progress">
                                                                    <span style="width:0%" class="progress-bar">0</span>
                                                                </div>
                                                                <!-- /.progress -->
                                                            </div>
                                                            <!-- /.deal-progress -->
                                                            <div class="deal-countdown-timer">
                                                                <div class="marketing-text">
                                                                    <span class="line-1">Hurry up!</span>
                                                                    <span class="line-2">Offers ends in:</span>
                                                                </div>
                                                                <!-- /.marketing-text -->
                                                                <span class="deal-time-diff" style="display:none;">28800</span>
                                                                <div class="deal-countdown countdown"></div>
                                                            </div>
                                                            <!-- /.deal-countdown-timer -->
                                                        </a>
                                                        <!-- /.woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- /.sale-product-with-timer -->
                                                    <div class="sale-product-with-timer product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="sale-product-with-timer-header">
                                                                <div class="price-and-title">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>425.89</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>545.89</span>
                                                                        </del>
                                                                    </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Tablet Red EliteBook Revolve</h2>
                                                                </div>
                                                                <!-- /.price-and-title -->
                                                                <div class="sale-label-outer">
                                                                    <div class="sale-saved-label">
                                                                        <span class="saved-label-text">Save</span>
                                                                        <span class="saved-label-amount">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>120.00</span>
                                                                        </span>
                                                                    </div>
                                                                    <!-- /.sale-saved-label -->
                                                                </div>
                                                                <!-- /.sale-label-outer -->
                                                            </div>
                                                            <!-- /.sale-product-with-timer-header -->
                                                            <img width="224" height="197" alt="" class="wp-post-image" src="assets/images/products/3.jpg">
                                                            <div class="deal-progress">
                                                                <div class="deal-stock">
                                                                    <div class="stock-sold">Already Sold:
                                                                        <strong>0</strong>
                                                                    </div>
                                                                    <div class="stock-available">Available:
                                                                        <strong>1000</strong>
                                                                    </div>
                                                                </div>
                                                                <!-- /.deal-stock -->
                                                                <div class="progress">
                                                                    <span style="width:0%" class="progress-bar">0</span>
                                                                </div>
                                                                <!-- /.progress -->
                                                            </div>
                                                            <!-- /.deal-progress -->
                                                            <div class="deal-countdown-timer">
                                                                <div class="marketing-text">
                                                                    <span class="line-1">Hurry up!</span>
                                                                    <span class="line-2">Offers ends in:</span>
                                                                </div>
                                                                <!-- /.marketing-text -->
                                                                <span class="deal-time-diff" style="display:none;">28800</span>
                                                                <div class="deal-countdown countdown"></div>
                                                            </div>
                                                            <!-- /.deal-countdown-timer -->
                                                        </a>
                                                        <!-- /.woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- /.sale-product-with-timer -->
                                                    <div class="sale-product-with-timer product">
                                                        <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                            <div class="sale-product-with-timer-header">
                                                                <div class="price-and-title">
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>425.89</span>
                                                                        </ins>
                                                                        <del>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>545.89</span>
                                                                        </del>
                                                                    </span>
                                                                    <!-- /.price -->
                                                                    <h2 class="woocommerce-loop-product__title">Tablet Red EliteBook Revolve</h2>
                                                                </div>
                                                                <!-- /.price-and-title -->
                                                                <div class="sale-label-outer">
                                                                    <div class="sale-saved-label">
                                                                        <span class="saved-label-text">Save</span>
                                                                        <span class="saved-label-amount">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span>120.00</span>
                                                                        </span>
                                                                    </div>
                                                                    <!-- /.sale-saved-label -->
                                                                </div>
                                                                <!-- /.sale-label-outer -->
                                                            </div>
                                                            <!-- /.sale-product-with-timer-header -->
                                                            <img width="224" height="197" alt="" class="wp-post-image" src="assets/images/products/4.jpg">
                                                            <div class="deal-progress">
                                                                <div class="deal-stock">
                                                                    <div class="stock-sold">Already Sold:
                                                                        <strong>0</strong>
                                                                    </div>
                                                                    <div class="stock-available">Available:
                                                                        <strong>1000</strong>
                                                                    </div>
                                                                </div>
                                                                <!-- /.deal-stock -->
                                                                <div class="progress">
                                                                    <span style="width:0%" class="progress-bar">0</span>
                                                                </div>
                                                                <!-- /.progress -->
                                                            </div>
                                                            <!-- /.deal-progress -->
                                                            <div class="deal-countdown-timer">
                                                                <div class="marketing-text">
                                                                    <span class="line-1">Hurry up!</span>
                                                                    <span class="line-2">Offers ends in:</span>
                                                                </div>
                                                                <!-- /.marketing-text -->
                                                                <span class="deal-time-diff" style="display:none;">28800</span>
                                                                <div class="deal-countdown countdown"></div>
                                                            </div>
                                                            <!-- /.deal-countdown-timer -->
                                                        </a>
                                                        <!-- /.woocommerce-LoopProduct-link -->
                                                    </div>
                                                    <!-- /.sale-product-with-timer -->
                                                </div>
                                                <!-- /.products -->
                                            </div>
                                            <!-- /.woocommerce -->
                                        </div>
                                        <!-- /.container-fluid -->
                                    </div>
                                    <!-- /.slick-list -->
                                </div>
                                <!-- /.sale-products-with-timer-carousel -->
                                <footer class="section-footer">
                                    <nav class="custom-slick-pagination">
                                        <a class="slider-prev left" href="#" data-target="#sale-with-timer-carousel .products">
                                            <i class="tm tm-arrow-left"></i>Previous deal</a>
                                        <a class="slider-next right" href="#" data-target="#sale-with-timer-carousel .products">Next deal<i class="tm tm-arrow-right"></i></a>
                                    </nav>
                                </footer>
                                <!-- /.section-footer -->
                            </div>
                            <!-- /.deals-carousel-inner-block -->
                        </section>
                        <!-- /.deals-carousel -->
                        <section class="column-2 section-products-carousel-tabs tab-carousel-1">
                            <div class="section-products-carousel-tabs-wrap">
                                <header class="section-header">
                                    <ul role="tablist" class="nav justify-content-end">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#tab-59f89f0881f930" data-toggle="tab">New Arrivals</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="#tab-59f89f0881f931" data-toggle="tab">On Sale</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="#tab-59f89f0881f932" data-toggle="tab">Best Rated</a>
                                        </li>
                                    </ul>
                                </header>
                                <!-- .section-header -->
                                <div class="tab-content">
                                    <div id="tab-59f89f0881f930" class="tab-pane active" role="tabpanel">
                                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:5,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1023,&quot;settings&quot;:{&quot;slidesPerRow&quot;:2}},{&quot;breakpoint&quot;:1169,&quot;settings&quot;:{&quot;slidesPerRow&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesPerRow&quot;:3}}]}">
                                            <div class="container-fluid">
                                                <div class="woocommerce">
                                                    <div class="products">
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
                                                <!-- .woocommerce -->
                                            </div>
                                            <!-- .container-fluid -->
                                        </div>
                                        <!-- .products-carousel -->
                                    </div>
                                    <!-- .tab-pane -->
                                    <div id="tab-59f89f0881f931" class="tab-pane " role="tabpanel">
                                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:5,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1023,&quot;settings&quot;:{&quot;slidesPerRow&quot;:2}},{&quot;breakpoint&quot;:1169,&quot;settings&quot;:{&quot;slidesPerRow&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesPerRow&quot;:3}}]}">
                                            <div class="container-fluid">
                                                <div class="woocommerce">
                                                    <div class="products">
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
                                                    </div>
                                                </div>
                                                <!-- .woocommerce -->
                                            </div>
                                            <!-- .container-fluid -->
                                        </div>
                                        <!-- .products-carousel -->
                                    </div>
                                    <!-- .tab-pane -->
                                    <div id="tab-59f89f0881f932" class="tab-pane " role="tabpanel">
                                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:5,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1023,&quot;settings&quot;:{&quot;slidesPerRow&quot;:2}},{&quot;breakpoint&quot;:1169,&quot;settings&quot;:{&quot;slidesPerRow&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesPerRow&quot;:3}}]}">
                                            <div class="container-fluid">
                                                <div class="woocommerce">
                                                    <div class="products">
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
                                                    </div>
                                                </div>
                                                <!-- .woocommerce -->
                                            </div>
                                            <!-- .container-fluid -->
                                        </div>
                                        <!-- .products-carousel -->
                                    </div>
                                    <!-- .tab-pane -->
                                    <div id="tab-59f89f0881f933" class="tab-pane " role="tabpanel">
                                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:5,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1023,&quot;settings&quot;:{&quot;slidesPerRow&quot;:2}},{&quot;breakpoint&quot;:1169,&quot;settings&quot;:{&quot;slidesPerRow&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesPerRow&quot;:3}}]}">
                                            <div class="container-fluid">
                                                <div class="woocommerce">
                                                    <div class="products">
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
                    <!-- /.section-landscape-products-carousel -->
                    <section class="stretch-full-width section-products-carousel-with-vertical-tabs">
                        <header class="section-header">
                            <h2 class="section-title">
                                <strong>Today Gadgets &amp; Mobile </strong> accessories</h2>
                        </header>
                        <!-- /.section-header -->
                        <div class="products-carousel-with-vertical-tabs row">
                            <ul role="tablist" class="nav">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#desktop-pc" data-toggle="tab">
                                        <span class="category-title">
                                            <i class="tm tm-desktop-pc"></i> Desktop PCs</span>
                                        <i class="tm tm-arrow-right"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#ultrabooks" data-toggle="tab">
                                        <span class="category-title">
                                            <i class="tm tm-laptop"></i> Ultrabooks</span>
                                        <i class="tm tm-arrow-right"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#smartphones" data-toggle="tab">
                                        <span class="category-title">
                                            <i class="tm tm-smartphone"></i> Smartphones</span>
                                        <i class="tm tm-arrow-right"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#internet-cams" data-toggle="tab">
                                        <span class="category-title">
                                            <i class="tm tm-digital-camera"></i> Internet Cams</span>
                                        <i class="tm tm-arrow-right"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#accessories" data-toggle="tab">
                                        <span class="category-title">
                                            <i class="tm tm-accesories"></i> Accessories</span>
                                        <i class="tm tm-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                            <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/vertical-bg.png ); height: 552px;" class="tab-content">
                                <div id="desktop-pc" class="tab-pane active" role="tabpanel">
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1600,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce columns-5">
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
                                                </div>
                                            </div>
                                            <!-- .woocommerce-->
                                        </div>
                                        <!-- .container-fluid -->
                                    </div>
                                    <!-- .products-carousel -->
                                </div>
                                <!-- .tab-pane -->
                                <div id="ultrabooks" class="tab-pane" role="tabpanel">
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1600,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce columns-5">
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
                                <!-- .tab-pane -->
                                <div id="smartphones" class="tab-pane" role="tabpanel">
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1600,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce columns-5">
                                                <div class="products">
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
                                                </div>
                                            </div>
                                            <!-- .woocommerce-->
                                        </div>
                                        <!-- .container-fluid -->
                                    </div>
                                    <!-- .products-carousel -->
                                </div>
                                <!-- .tab-pane -->
                                <div id="internet-cams" class="tab-pane" role="tabpanel">
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1600,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce columns-5">
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
                                <!-- .tab-pane -->
                                <div id="accessories" class="tab-pane" role="tabpanel">
                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1600,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                        <div class="container-fluid">
                                            <div class="woocommerce columns-5">
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
                                                </div>
                                            </div>
                                            <!-- .woocommerce-->
                                        </div>
                                        <!-- .container-fluid -->
                                    </div>
                                    <!-- .products-carousel -->
                                </div>
                                <!-- .tab-pane -->
                            </div>
                            <!-- .tab-content -->
                        </div>
                        <!-- /.products-carousel-with-vertical-tabs -->
                    </section>
                    <!-- /.section-products-carousel-with-vertical-tabs -->
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

<style>
.text-gradient {
    background: linear-gradient(45deg, #2196F3, #00BCD4);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.product-card {
    transition: box-shadow 0.3s, transform 0.3s;
    border-radius: 1rem;
    box-shadow: 0 2px 12px rgba(0,0,0,0.07);
    background: #fff;
    min-height: 220px;
    max-width: 100%;
    width: 100%;
    position: relative;
}
.product-card:hover {
    box-shadow: 0 8px 32px rgba(33,150,243,0.12), 0 2px 8px rgba(0,0,0,0.08);
    transform: translateY(-6px) scale(1.02);
    z-index: 2;
}
.product-image-wrapper {
    background: linear-gradient(135deg, #f8fafc 60%, #e3f2fd 100%);
    border-radius: 1rem 1rem 0 0;
    min-height: unset;
    height: 140px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}
.product-thumbnail {
    transition: transform 0.4s cubic-bezier(.4,2,.6,1);
    max-height: 110px;
}
.product-card:hover .product-thumbnail {
    transform: scale(1.08) rotate(-2deg);
}
.card-body {
    min-height: unset;
    padding: 0.5rem 0.5rem 0.5rem 0.5rem;
}
.btn-gradient {
    background: linear-gradient(45deg, #2196F3, #00BCD4);
    color: #fff;
    border: none;
    transition: background 0.3s, box-shadow 0.3s;
    box-shadow: 0 2px 8px rgba(33,150,243,0.08);
}
.btn-gradient:hover {
    background: linear-gradient(45deg, #1976D2, #0097A7);
    color: #fff;
    box-shadow: 0 4px 16px rgba(33,150,243,0.16);
}
.btn-light.rounded-circle {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: box-shadow 0.2s, transform 0.2s;
    background: #f8fafc;
}
.btn-light.rounded-circle:hover {
    box-shadow: 0 2px 8px rgba(33,150,243,0.12);
    transform: scale(1.12);
}
.card-body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 180px;
}
.product-price {
    display: flex;
    align-items: baseline;
    gap: 0.5rem;
    font-size: 1rem;
}
.product-rating {
    display: flex;
    align-items: center;
    gap: 0.25rem;
    font-size: 0.85rem;
}
.card-body.text-center {
    align-items: center;
    text-align: center;
}
.product-price {
    justify-content: center !important;
    align-items: baseline !important;
    gap: 0.5rem;
    font-size: 1rem;
    width: 100%;
}
.product-rating {
    justify-content: center !important;
    align-items: center !important;
    gap: 0.25rem;
    font-size: 0.85rem;
    width: 100%;
}
@media (max-width: 768px) {
    .product-card {
        min-height: 180px;
    }
    .btn-light.rounded-circle {
        width: 28px;
        height: 28px;
    }
}
</style>
@endsection