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
#best-selling-wrapper .products{
  display: grid !important;
  gap: 16px;
  grid-template-columns: repeat(2, minmax(0, 1fr));         /* mobile mặc định 2 cột */
}

/* Gỡ ép width/float của theme */
#best-selling-wrapper .products .product{
  width: auto !important;
  max-width: none !important;
  float: none !important;
  margin: 0 !important;
  box-sizing: border-box;
}
@media (min-width: 576px){
  #best-selling-wrapper .products{ grid-template-columns: repeat(3, minmax(0,1fr)); }
}
@media (min-width: 768px){
  #best-selling-wrapper .products{ grid-template-columns: repeat(4, minmax(0,1fr)); }
}
@media (min-width: 992px){
  #best-selling-wrapper .products{ grid-template-columns: repeat(5, minmax(0,1fr)); }
}
@media (min-width: 1200px){
  #best-selling-wrapper .products{ grid-template-columns: repeat(6, minmax(0,1fr)); }
}
/* Màn rất rộng: KHÓA 7 cột, item thứ 7 KHÔNG rơi hàng */
@media (min-width: 1400px){
  #best-selling-wrapper .products{ grid-template-columns: repeat(7, minmax(0,1fr)); }
}

    </style>

