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

                        {{-- Active banner lookup --}}
                        @php
                            $activeBanner = \App\Models\Banner::where('status', 'using')->first();
                        @endphp

                        @if ($activeBanner)
                            <div class="home-v1-slider home-slider">
                                @if ($activeBanner->type === 'static')
                                    <div class="slider-1"
                                        style="background-image: url('{{ asset('storage/' . $activeBanner->image) }}');">
                                        {{-- Static banner slide --}}
                                    </div>
                                @else
                                    @foreach (json_decode($activeBanner->images, true) as $slide)
                                        <div class="slider-1"
                                            style="background-image: url('{{ asset('storage/' . $slide) }}');">
                                            {{-- Dynamic banner slide --}}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @else
                            {{-- Fallback to your original hard-coded sliders --}}
                            <div class="home-v1-slider home-slider">
                                <div class="slider-1"
                                    style="background-image: url(assets/images/slider/home-v1-background.jpg);">
                                    <img src="assets/images/slider/home-v1-img-1.png" alt="">
                                    <div class="caption">
                                        <div class="title">
                                            Turn. Click. Expand. Smart modular design simplifies adding storage
                                            for growing media.
                                        </div>
                                        <div class="sub-title">
                                            Powerful Six Core processor, vibrant 4KUHD display output and
                                            fast SSD elegantly cased in a soft alloy design.
                                        </div>
                                        <div class="button">
                                            Get Yours now <i class="tm tm-long-arrow-right"></i>
                                        </div>
                                        <div class="bottom-caption">Free shipping on US Territory</div>
                                    </div>
                                </div>
                                <div class="slider-1 slider-2"
                                    style="background-image: url(assets/images/slider/home-v1-background.jpg);">
                                    <img src="assets/images/slider/home-v1-img-2.png" alt="">
                                    <div class="caption">
                                        <div class="title">
                                            The new-tech gift you<br>
                                            are wishing for is<br>
                                            right here
                                        </div>
                                        <div class="sub-title">
                                            Big screens in incredibly slim designs<br>
                                            that fit in your hand.
                                        </div>
                                        <div class="button">
                                            Browse now <i class="tm tm-long-arrow-right"></i>
                                        </div>
                                        <div class="bottom-caption">Free shipping on US Territory</div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- .home-v1-slider -->

                        <div class="features-list">
                            <div class="features">
                                <div class="feature">
                                    <div class="media">
                                        <i class="feature-icon d-flex mr-3 tm tm-free-delivery"></i>
                                        <div class="media-body feature-text">
                                            <h5 class="mt-0">Miễn phí giao hàng</h5>
                                            <span>cho đơn từ 5.000.000đ</span>
                                            <h5 class="mt-0">Miễn phí giao hàng</h5>
                                            <span>cho đơn từ 5.000.000đ</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feature">
                                    <div class="media">
                                        <i class="feature-icon d-flex mr-3 tm tm-feedback"></i>
                                        <div class="media-body feature-text">
                                            <h5 class="mt-0">99% Phản hồi</h5>
                                            <span>từ khách hàng</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feature">
                                    <div class="media">
                                        <i class="feature-icon d-flex mr-3 tm tm-free-return"></i>
                                        <div class="media-body feature-text">
                                            <h5 class="mt-0">Đổi trả hàng</h5>
                                            <span>miễn phí trong 365 ngày</span>
                                            <h5 class="mt-0">Đổi trả hàng</h5>
                                            <span>miễn phí trong 365 ngày</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feature">
                                    <div class="media">
                                        <i class="feature-icon d-flex mr-3 tm tm-safe-payments"></i>
                                        <div class="media-body feature-text">
                                            <h5 class="mt-0">Thanh toán</h5>
                                            <span>an toàn & bảo mật</span>
                                            <h5 class="mt-0">Thanh toán</h5>
                                            <span>an toàn & bảo mật</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="feature">
                                    <div class="media">
                                        <i class="feature-icon d-flex mr-3 tm tm-best-brands"></i>
                                        <div class="media-body feature-text">
                                            <h5 class="mt-0">Thương hiệu</h5>
                                            <span>uy tín hàng đầu</span>
                                            <h5 class="mt-0">Thương hiệu</h5>
                                            <span>uy tín hàng đầu</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <section class="section-top-categories section-categories-carousel" id="categories-carousel-1">
                            <header class="section-header">
                                <h2 class="section-title">Danh mục<br> sản phẩm</h2>
                                <nav class="custom-slick-nav"></nav>
                            </header>
                            <div class="product-categories-1 product-categories-carousel" data-ride="tm-slick-carousel"
                                data-wrap=".products"
                                data-slick='{"slidesToShow":5,"slidesToScroll":1,"dots":false,"arrows":true,"prevArrow":"<a href=\"#\"><i class=\"tm tm-arrow-left\"></i></a>","nextArrow":"<a href=\"#\"><i class=\"tm tm-arrow-right\"></i></a>","appendArrows":"#categories-carousel-1 .custom-slick-nav","responsive":[{"breakpoint":1200,"settings":{"slidesToShow":2,"slidesToScroll":2}},{"breakpoint":1400,"settings":{"slidesToShow":4,"slidesToScroll":4}}]}'>
                                <div class="woocommerce columns-5">
                                    <div class="products">
                                        @foreach ($categories as $category)
                                            <div class="product-category product">
                                                <a href="{{ route('shop', ['category' => $category->id]) }}">
                                                    <img class="category-img" width="224" height="197"
                                                        src="{{ Str::startsWith($category->image, ['http://', 'https://'])
                                                            ? $category->image
                                                            : (file_exists(public_path($category->image))
                                                                ? asset($category->image)
                                                                : asset('storage/' . $category->image)) }}"
                                                        alt="{{ $category->name }}">
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

                        <div class="section-deals-carousel-and-products-carousel-tabs row">
                            <div id="grid-extended" class="tab-pane" role="tabpanel">
                                <div class="woocommerce columns-7">
                                    <h2 class="section-title">Sản phẩm bán chạy nhất</h2>
                                    <div id="best-selling-wrapper">
                                        @include('client.components.best_sellers')
                                        <div id="best-selling-wrapper">
                                            @include('client.components.best_sellers')
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </main>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // AJAX pagination for best sellers
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
