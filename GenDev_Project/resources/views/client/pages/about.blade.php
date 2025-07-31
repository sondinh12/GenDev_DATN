@extends('client.layout.master')

@section('content')
<div id="content" class="site-content">
    <div class="col-full">
        <div class="row">
            <!-- Breadcrumb -->
            <nav class="woocommerce-breadcrumb">
                <a href="/">Trang chủ</a>
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span>
                Giới thiệu
            </nav>

            <!-- Nội dung chính -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="type-page hentry">

                        <!-- Header -->
                        <header class="entry-header">
                            <div class="page-featured-image">
                                <img width="1920" height="1391" alt="Giới thiệu" class="attachment-full size-full wp-post-image" src="{{ asset('assets/images/products/about-header.jpg') }}">
                            </div>
                            <div class="page-header-caption text-center">
                                <h1 class="entry-title">Về chúng tôi</h1>
                                <p class="entry-subtitle">Mang công nghệ đến gần hơn với người dùng Việt Nam – thông qua chất lượng, uy tín và tinh thần học tập.</p>
                            </div>
                        </header>

                        <!-- Nội dung -->
                        <div class="entry-content">

                            <!-- 3 cột giới thiệu -->
                            <div class="about-features row">
                                <div class="col-md-4 text-center">
                                    <img alt="" src="{{ asset('assets/images/products/3column1.jpg') }}" class="mb-3 img-fluid rounded">
                                    <h4>Chúng tôi là ai?</h4>
                                    <p>Trang web này là dự án thực hành của sinh viên ngành Công nghệ thông tin. Mục tiêu là tạo ra nền tảng thương mại điện tử phục vụ khách hàng thật sự.</p>
                                </div>

                                <div class="col-md-4 text-center">
                                    <img alt="" src="{{ asset('assets/images/products/3column3.jpg') }}" class="mb-3 img-fluid rounded">
                                    <h4>Tầm nhìn</h4>
                                    <p>Trở thành một nền tảng thương mại điện tử học thuật – nơi sinh viên có thể học hỏi và người dùng được phục vụ bằng sản phẩm chất lượng, giá hợp lý.</p>
                                </div>

                                <div class="col-md-4 text-center">
                                    <img alt="" src="{{ asset('assets/images/products/3column2.jpg') }}" class="mb-3 img-fluid rounded">
                                    <h4>Sứ mệnh</h4>
                                    <p>Kết nối công nghệ với cuộc sống, qua việc cung cấp các sản phẩm điện tử thiết thực, giao diện thân thiện và trải nghiệm mua sắm hiện đại.</p>
                                </div>
                            </div>

                            <!-- Dịch vụ hỗ trợ -->
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <h3>Chúng tôi mang đến điều gì?</h3>
                                    <ul class="list-unstyled">
                                        <li>✔ Sản phẩm điện tử chất lượng</li>
                                        <li>✔ Giao diện website dễ sử dụng</li>
                                        <li>✔ Dịch vụ hỗ trợ đơn giản, thân thiện</li>
                                        <li>✔ Giao hàng nhanh, đóng gói cẩn thận</li>
                                        <li>✔ Tất cả do sinh viên thực hiện, học hỏi và nâng cấp liên tục</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <img src="{{ asset('assets/images/products/support.jpg') }}" alt="Dịch vụ" class="img-fluid rounded">
                                </div>
                            </div>

                        </div> <!-- .entry-content -->

                    </div> <!-- .type-page -->
                </main>
            </div> <!-- #primary -->
        </div>
    </div>
</div>
@endsection
