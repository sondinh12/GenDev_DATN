@extends('client.layout.master')

@section('content')
<div id="content" class="site-content">
    <div class="col-full">
        <div class="row">
            {{-- Breadcrumb --}}
            <nav class="woocommerce-breadcrumb mb-4">
                <a href="/">Trang chủ</a>
                <span class="delimiter"><i class="tm tm-breadcrumbs-arrow-right"></i></span>
                Sản phẩm yêu thích
            </nav>

            {{-- Wishlist Section --}}
            <div class="section-deals-carousel-and-products-carousel-tabs row w-100">
    <div class="col-12">
        <div class="woocommerce">

            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 row-cols-xxl-7 g-3">
               <div id="grid-extended" class="tab-pane" role="tabpanel">
                                <div class="woocommerce columns-7">
                                    <h2 class="section-title">Sản phẩm bạn yêu thích</h2>
                                    <div id="best-selling-wrapper">
                                        @include('client.components.favorites_grid')
                                    </div>
                                </div>
                                <!-- .woocommerce -->
                            </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</div>
@endsection
<style>
    @media (min-width: 1400px) {
    .row-cols-7 > * {
        flex: 0 0 auto;
        width: 14.2857143%;
    }
}

</style>
