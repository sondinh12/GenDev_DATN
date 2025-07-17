@extends('client.layout.master')

@section('title', 'Thanh toán thành công')

@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        {{ session('success') }}
    </div>
@endif

{{-- <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card shadow p-4">
                <div class="mb-4 text-success">
                    <i class="bi bi-check-circle" style="font-size: 4rem;"></i>
                </div>
                <h2 class="mb-3">Thanh toán thành công!</h2>
                <p class="mb-4">Cảm ơn bạn đã đặt hàng. Chúng tôi đã gửi email xác nhận đơn hàng cho bạn.</p>
                <a href="{{ route('home') }}" class="btn btn-primary">
                    Quay về trang chủ
                </a>
            </div>
        </div>
    </div>
</div> --}}

<div id="content" class="site-content" tabindex="-1">
    <div class="col-full">
        <div class="row">
            <nav class="woocommerce-breadcrumb">
                <a href="/">Trang chủ</a>
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span>
                <a href="/checkout">Thanh toán</a>
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span>Đã nhận đơn hàng
            </nav>
            <!-- .woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="page hentry">
                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="woocommerce-order">
                                    <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
                                        Cảm ơn bạn đã đặt hàng, đơn hàng đã được ghi nhận.
                                        Chúng tôi đã gửi email xác nhận đơn hàng cho bạn.
                                    </p>
                                    <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
                                        <li class="woocommerce-order-overview__order order">
                                            Mã đơn hàng:
                                            <strong>3001</strong>
                                        </li>
                                        <li class="woocommerce-order-overview__date date">
                                            Ngày đặt:
                                            <strong>November 6, 2017</strong>
                                        </li>
                                        <li class="woocommerce-order-overview__total total">
                                            Tổng cộng:
                                            <strong>
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>1,476.99</span>
                                            </strong>
                                        </li>
                                        <li class="woocommerce-order-overview__payment-method method">
                                            Phương thức thanh toán:
                                            <strong>Chuyển khoản ngân hàng</strong>
                                        </li>
                                    </ul>
                                    <!-- .woocommerce-order-overview -->
                                    <section class="woocommerce-order-details">
                                        <h2 class="woocommerce-order-details__title">Chi tiết đơn hàng</h2>
                                        <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
                                            <thead>
                                                <tr>
                                                    <th class="woocommerce-table__product-name product-name">Sản phẩm</th>
                                                    <th class="woocommerce-table__product-table product-total">Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="woocommerce-table__line-item order_item">
                                                    <td class="woocommerce-table__product-name product-name">
                                                        <a href="single-product-fullwidth.html">Snap White Instant Digital Camera in White</a>
                                                        <strong class="product-quantity">× 1</strong>
                                                    </td>
                                                    <td class="woocommerce-table__product-total product-total">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">$</span>179.99</span>
                                                    </td>
                                                </tr>
                                                <tr class="woocommerce-table__line-item order_item">
                                                    <td class="woocommerce-table__product-name product-name">
                                                        <a href="single-product-fullwidth.html">XPS 13 Laptop 6GB W10 Infinity Edge Display</a>
                                                        <strong class="product-quantity">× 1</strong>
                                                    </td>
                                                    <td class="woocommerce-table__product-total product-total">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">$</span>1,197.00</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="row">Tạm tính:</th>
                                                    <td>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">$</span>1,376.99</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Phí vận chuyển:</th>
                                                    <td>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">$</span>100.00</span>&nbsp;
                                                        <small class="shipped_via">bằng Giao hàng thông thường</small>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Phương thức thanh toán:</th>
                                                    <td>Chuyển khoản ngân hàng</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Tổng cộng:</th>
                                                    <td>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">$</span>1,476.99</span>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <!-- .woocommerce-table -->
                                    </section>
                                    <!-- .woocommerce-order-details -->
                                </div>
                                <!-- .woocommerce-order -->
                            </div>
                            <!-- .woocommerce -->
                        </div>
                        <!-- .entry-content -->
                    </div>
                    <!-- .hentry -->
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
