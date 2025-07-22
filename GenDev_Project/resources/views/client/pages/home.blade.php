@extends('client.layout.master')

@section('content')
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3 shadow"
            role="alert" style="z-index:9999; min-width:300px; max-width:90vw;">
            <i class="fas fa-exclamation-triangle me-2"></i> {{ session('error') }}
        </div>
        <script>
            setTimeout(function () {
                $('.alert-danger').alert('close');
            }, 2500);
        </script>
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

                        <!-- Danh mục nổi bật -->
                        <section class="section-top-categories section-categories-carousel mb-5" id="categories-carousel-3">
                            <header class="section-header">
                                <h2 class="section-title">Danh mục<br>nổi bật<br>tuần này</h2>
                                <a class="readmore-link" href="{{ route('shop') }}">Xem tất cả</a>
                            </header>
                            <div class="product-categories product-categories-carousel" data-ride="tm-slick-carousel"
                                data-wrap=".products">
                                <div class="woocommerce columns-7">
                                    <div class="products">
                                        @foreach($categories as $category)
                                            <div class="product-category product">
                                                <a href="{{ route('shop', ['category' => $category->id]) }}">
                                                    <img width="400" height="200" alt="{{ $category->name }}"
                                                        src="{{ asset('storage/' . $category->image) }}">
                                                    <h2 class="woocommerce-loop-category__title">{{ $category->name }}</h2>
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

                                <!-- .features -->
                            </section>
                        @endif
                        <!-- .section-products-carousel-tabs-->

                    </main>
                </div>
            </div>
        </div>
    </div>
@endsection