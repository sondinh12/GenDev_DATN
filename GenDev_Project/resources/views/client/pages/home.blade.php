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

<div id="content" class="site-content" tabindex="-1">
    <div class="col-full">
        <div class="row">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                    <!-- Hero Section với Slider -->
                    <div class="home-v1-slider home-slider">
                        <div class="slider-1"
                            style="background-image: url(assets/images/slider/home-v1-background.jpg);">
                            <img src="assets/images/slider/home-v1-img-1.png" alt="">
                            <div class="caption">
                                <div class="title">Xoay. Nhấn. Mở rộng. Thiết kế mô-đun thông minh giúp thêm bộ nhớ dễ
                                    dàng cho dữ liệu ngày càng tăng.</div>
                                <div class="sub-title">Bộ xử lý sáu nhân mạnh mẽ, hiển thị sống động 4K UHD và SSD tốc
                                    độ cao trong thiết kế hợp kim mềm mại.</div>
                                <div class="button">Sở hữu ngay
                                    <i class="tm tm-long-arrow-right"></i>
                                </div>
                                <div class="bottom-caption">Miễn phí vận chuyển toàn quốc</div>
                            </div>
                        </div>
                        <!-- .slider-1 -->
                        <div class="slider-1 slider-2"
                            style="background-image: url(assets/images/slider/home-v1-background.jpg);">
                            <img src="assets/images/slider/home-v1-img-2.png" alt="">
                            <div class="caption">
                                <div class="title">Món quà công nghệ mới
                                    <br> bạn đang mong chờ
                                    <br> có ngay tại đây
                                </div>
                                <div class="sub-title">Màn hình lớn trong thiết kế siêu mỏng
                                    <br>gọn gàng trong tay bạn.
                                </div>
                                <div class="button">Khám phá ngay
                                    <i class="tm tm-long-arrow-right"></i>
                                </div>
                                <div class="bottom-caption">Miễn phí vận chuyển toàn quốc</div>
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
                        <div class="product-categories product-categories-carousel" data-ride="tm-slick-carousel"
                            data-wrap=".products">
                            <div class="woocommerce columns-7">
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
                            </div>
                        </div>
                    </section>

                    <!-- Sản phẩm nổi bật -->
                    @if($featuredProducts->count() > 0)
                    <section class="section-featured-products mb-5">
                        <header class="section-header text-center">
                            <h2 class="section-title">
                                <span>🔥<span class="text-gradient">Sản phẩm nổi bật</span></span>
                                <span class="d-block text-primary mt-1">Khuyến mãi đặc biệt</span>
                            </h2>
                        </header>
                        <div class="product-cards-grid">
                            <div class="row row-cols-2 row-cols-md-4 g-3">
                                @foreach($featuredProducts as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                                    @include('client.components.product-card', ['product' => $product])
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    @endif

                    <!-- Sản phẩm bán chạy -->
                    @if($bestSellingProducts->count() > 0)
                    <section class="section-best-selling mb-5">
                        <header class="section-header text-center">
                            <h2 class="section-title">
                                <span>⭐<span class="text-gradient">Sản phẩm bán chạy</span></span>
                                <span class="d-block text-primary mt-1">Được yêu thích nhất</span>
                            </h2>
                        </header>
                        <div class="product-cards-grid">
                            <div class="row row-cols-2 row-cols-md-4 g-3">
                                @foreach($bestSellingProducts as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                                    @include('client.components.product-card', ['product' => $product])
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    @endif

                    <!-- Sản phẩm mới nhất -->
                    @if($newProducts->count() > 0)
                    <section class="section-new-products mb-5">
                        <header class="section-header text-center">
                            <h2 class="section-title">
                                <span>🆕<span class="text-gradient">Sản phẩm mới nhất</span></span>
                                <span class="d-block text-primary mt-1">Cập nhật hàng ngày</span>
                            </h2>
                        </header>
                        <div class="product-cards-grid">
                            <div class="row row-cols-2 row-cols-md-4 g-3">
                                @foreach($newProducts as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                                    @include('client.components.product-card', ['product' => $product])
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    @endif

                    <!-- Sản phẩm theo danh mục -->
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
                                            href="#category-{{ $category->id }}" data-toggle="tab">{{ $category->name
                                            }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </header>
                            <div class="tab-content">
                                @foreach($categories as $category)
                                <div id="category-{{ $category->id }}"
                                    class="tab-pane {{ $loop->first ? 'active' : '' }}" role="tabpanel">
                                    <div class="product-cards-3-2-3-with-featured-product">
                                        <div class="row row-cols-2 row-cols-md-4 g-3">
                                            @foreach($categoryProducts[$category->id] as $product)
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                                                @include('client.components.product-card', ['product' => $product])
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>

                </main>
            </div>
        </div>
    </div>
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
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.07);
        background: #fff;
        min-height: 220px;
        max-width: 100%;
        width: 100%;
        position: relative;
    }

    .product-card:hover {
        box-shadow: 0 8px 32px rgba(33, 150, 243, 0.12), 0 2px 8px rgba(0, 0, 0, 0.08);
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
        transition: transform 0.4s cubic-bezier(.4, 2, .6, 1);
        max-height: 110px;
    }

    .product-card:hover .product-thumbnail {
        transform: scale(1.08) rotate(-2deg);
    }

    .btn-gradient {
        background: linear-gradient(45deg, #2196F3, #00BCD4);
        color: #fff;
        border: none;
        transition: background 0.3s, box-shadow 0.3s;
        box-shadow: 0 2px 8px rgba(33, 150, 243, 0.08);
    }

    .btn-gradient:hover {
        background: linear-gradient(45deg, #1976D2, #0097A7);
        color: #fff;
        box-shadow: 0 4px 16px rgba(33, 150, 243, 0.16);
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
        box-shadow: 0 2px 8px rgba(33, 150, 243, 0.12);
        transform: scale(1.12);
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