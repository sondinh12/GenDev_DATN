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
                                    <div class="bottom-caption">Miễn phí vận chuyển toàn quốc </div>
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
                                            <h5 class="mt-0">Miễn phí giao hàng</h5>
                                            <span>cho đơn từ 5.000.000đ</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- .feature -->
                                <div class="feature">
                                    <div class="media">
                                        <i class="feature-icon d-flex mr-3 tm tm-feedback"></i>
                                        <div class="media-body feature-text">
                                            <h5 class="mt-0">99% Khách hàng</h5>
                                            <span>phản hồi tích cực</span>
                                        </div>
                                    </div>
                                    <!-- .media -->
                                </div>
                                <!-- .feature -->
                                <div class="feature">
                                    <div class="media">
                                        <i class="feature-icon d-flex mr-3 tm tm-free-return"></i>
                                        <div class="media-body feature-text">
                                            <h5 class="mt-0">Đổi trả hàng</h5>
                                            <span>miễn phí trong 365 ngày</span>
                                        </div>
                                    </div>
                                    <!-- .media -->
                                </div>
                                <!-- .feature -->
                                <div class="feature">
                                    <div class="media">
                                        <i class="feature-icon d-flex mr-3 tm tm-safe-payments"></i>
                                        <div class="media-body feature-text">
                                            <h5 class="mt-0">Thanh toán</h5>
                                            <span>an toàn & bảo mật</span>
                                        </div>
                                    </div>
                                    <!-- .media -->
                                </div>
                                <!-- .feature -->
                                <div class="feature">
                                    <div class="media">
                                        <i class="feature-icon d-flex mr-3 tm tm-best-brands"></i>
                                        <div class="media-body feature-text">
                                            <h5 class="mt-0">Thương hiệu</h5>
                                            <span>uy tín hàng đầu</span>
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
                                                <a href="{{ route('shop', ['category' => $category->id]) }}">
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
                                    <div id="best-selling-wrapper">
                                        @include('client.components.best_sellers')
                                    </div>
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
@push('scripts')
    <script>
        $(document).on('click', '#best-selling-wrapper .pagination a', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            $.ajax({
                url: url,
                type: 'GET',
                beforeSend: function() {
                    $('#best-selling-wrapper').html('<div class="text-center p-4">Đang tải...</div>');
                },
                success: function(data) {
                    $('#best-selling-wrapper').html(data);
                },
                error: function() {
                    alert('Không thể tải dữ liệu. Vui lòng thử lại sau.');
                }
            });
        });
    </script>
@endpush
