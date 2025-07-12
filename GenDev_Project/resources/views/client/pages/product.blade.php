@extends('client.layout.master')

@section('content')
<div id="content" class="site-content" tabindex="-1">
    <div class="col-full">
        <div class="row">
            <nav class="woocommerce-breadcrumb">
                <a href="/">Trang chủ</a>
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span>Sản phẩm
            </nav>
            <!-- .woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <!-- .shop-archive-header -->
                    <div class="shop-control-bar">
                        <div class="handheld-sidebar-toggle">
                            <button type="button" class="btn sidebar-toggler">
                                <i class="fa fa-sliders"></i>
                                <span>Bộ lọc</span>
                            </button>
                        </div>
                        <!-- .handheld-sidebar-toggle -->
                        <h1 class="woocommerce-products-header__title page-title">Tất cả sản phẩm</h1>
                        <!-- .shop-view-switcher -->
                        <form class="form-techmarket-wc-ppp" method="POST">
                            <select class="techmarket-wc-wppp-select c-select" onchange="this.form.submit()" name="ppp">
                                <option value="20">Hiển thị 20</option>
                                <option value="40">Hiển thị 40</option>
                                <option value="-1">Hiển thị tất cả</option>
                            </select>
                            <input type="hidden" value="5" name="shop_columns">
                            <input type="hidden" value="15" name="shop_per_page">
                            <input type="hidden" value="right-sidebar" name="shop_layout">
                        </form>
                        <!-- .form-techmarket-wc-ppp -->
                        <form method="get" class="woocommerce-ordering">
                            <select class="orderby" name="orderby">
                                <option value="popularity">Sắp xếp theo phổ biến</option>
                                <option value="rating">Sắp xếp theo đánh giá</option>
                                <option selected="selected" value="date">Sắp xếp theo mới nhất</option>
                                <option value="price">Sắp xếp theo giá: thấp đến cao</option>
                                <option value="price-desc">Sắp xếp theo giá: cao đến thấp</option>
                            </select>
                            <input type="hidden" value="5" name="shop_columns">
                            <input type="hidden" value="15" name="shop_per_page">
                            <input type="hidden" value="right-sidebar" name="shop_layout">
                        </form>
                        <!-- .woocommerce-ordering -->
                        <nav class="techmarket-advanced-pagination">
                            <form class="form-adv-pagination" method="post">
                                <input type="number" value="1" class="form-control" step="1" max="5" min="1" size="2" id="goto-page">
                            </form> trong 5<a href="#" class="next page-numbers">→</a>
                        </nav>
                        <!-- .techmarket-advanced-pagination -->
                    </div>
                    <!-- .shop-control-bar -->
                    <div class="tab-content">
                        <div id="grid" class="tab-pane active" role="tabpanel">
                            <div class="woocommerce columns-5">
                                <div class="products">
                                    <div class="product first">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Thêm vào yêu thích</a>
                                        </div>
                                        <!-- .yith-wcwl-add-to-wishlist -->
                                        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="single-product-fullwidth.html">
                                            <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="assets/images/products/1.jpg">
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                            </span>
                                            <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen LED-Lit Monitorss Buds</h2>
                                        </a>
                                        <!-- .woocommerce-LoopProduct-link -->
                                        <div class="hover-area">
                                            <a class="button" href="cart.html">Thêm vào giỏ hàng</a>
                                            <a class="add-to-compare-link" href="compare.html">So sánh</a>
                                        </div>
                                        <!-- .hover-area -->
                                    </div>
                                    <!-- .product -->
                                    <div class="product ">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Thêm vào yêu thích</a>
                                        </div>
                                        <!-- .yith-wcwl-add-to-wishlist -->
                                        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="single-product-fullwidth.html">
                                            <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="assets/images/products/2.jpg">
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                            </span>
                                            <h2 class="woocommerce-loop-product__title">Bluetooth on-ear PureBass Headphones</h2>
                                        </a>
                                        <!-- .woocommerce-LoopProduct-link -->
                                        <div class="hover-area">
                                            <a class="button" href="cart.html">Thêm vào giỏ hàng</a>
                                            <a class="add-to-compare-link" href="compare.html">So sánh</a>
                                        </div>
                                        <!-- .hover-area -->
                                    </div>
                                    <!-- .product -->
                                    <div class="product ">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Thêm vào yêu thích</a>
                                        </div>
                                        <!-- .yith-wcwl-add-to-wishlist -->
                                        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="single-product-fullwidth.html">
                                            <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="assets/images/products/3.jpg">
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                            </span>
                                            <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50</h2>
                                        </a>
                                        <!-- .woocommerce-LoopProduct-link -->
                                        <div class="hover-area">
                                            <a class="button" href="cart.html">Thêm vào giỏ hàng</a>
                                            <a class="add-to-compare-link" href="compare.html">So sánh</a>
                                        </div>
                                        <!-- .hover-area -->
                                    </div>
                                    <!-- .product -->
                                    <div class="product ">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Thêm vào yêu thích</a>
                                        </div>
                                        <!-- .yith-wcwl-add-to-wishlist -->
                                        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="single-product-fullwidth.html">
                                            <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="assets/images/products/4.jpg">
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                            </span>
                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                        </a>
                                        <!-- .woocommerce-LoopProduct-link -->
                                        <div class="hover-area">
                                            <a class="button" href="cart.html">Thêm vào giỏ hàng</a>
                                            <a class="add-to-compare-link" href="compare.html">So sánh</a>
                                        </div>
                                        <!-- .hover-area -->
                                    </div>
                                    <!-- .product -->
                                    <div class="product last">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Thêm vào yêu thích</a>
                                        </div>
                                        <!-- .yith-wcwl-add-to-wishlist -->
                                        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="single-product-fullwidth.html">
                                            <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="assets/images/products/5.jpg">
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                            </span>
                                            <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                        </a>
                                        <!-- .woocommerce-LoopProduct-link -->
                                        <div class="hover-area">
                                            <a class="button" href="cart.html">Thêm vào giỏ hàng</a>
                                            <a class="add-to-compare-link" href="compare.html">So sánh</a>
                                        </div>
                                        <!-- .hover-area -->
                                    </div>
                                    <!-- .product -->
                                    <div class="product first">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Thêm vào yêu thích</a>
                                        </div>
                                        <!-- .yith-wcwl-add-to-wishlist -->
                                        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="single-product-fullwidth.html">
                                            <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="assets/images/products/6.jpg">
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                            </span>
                                            <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG</h2>
                                        </a>
                                        <!-- .woocommerce-LoopProduct-link -->
                                        <div class="hover-area">
                                            <a class="button" href="cart.html">Thêm vào giỏ hàng</a>
                                            <a class="add-to-compare-link" href="compare.html">So sánh</a>
                                        </div>
                                        <!-- .hover-area -->
                                    </div>
                                    <!-- .product -->
                                    <div class="product ">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Thêm vào yêu thích</a>
                                        </div>
                                        <!-- .yith-wcwl-add-to-wishlist -->
                                        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="single-product-fullwidth.html">
                                            <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="assets/images/products/7.jpg">
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                            </span>
                                            <h2 class="woocommerce-loop-product__title">Xtreme ultimate splashproof portable speaker</h2>
                                        </a>
                                        <!-- .woocommerce-LoopProduct-link -->
                                        <div class="hover-area">
                                            <a class="button" href="cart.html">Thêm vào giỏ hàng</a>
                                            <a class="add-to-compare-link" href="compare.html">So sánh</a>
                                        </div>
                                        <!-- .hover-area -->
                                    </div>
                                    <!-- .product -->
                                    <div class="product ">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Thêm vào yêu thích</a>
                                        </div>
                                        <!-- .yith-wcwl-add-to-wishlist -->
                                        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="single-product-fullwidth.html">
                                            <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="assets/images/products/8.jpg">
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                            </span>
                                            <h2 class="woocommerce-loop-product__title">Gear Virtual Reality 3D with Bluetooth Glasses</h2>
                                        </a>
                                        <!-- .woocommerce-LoopProduct-link -->
                                        <div class="hover-area">
                                            <a class="button" href="cart.html">Thêm vào giỏ hàng</a>
                                            <a class="add-to-compare-link" href="compare.html">So sánh</a>
                                        </div>
                                        <!-- .hover-area -->
                                    </div>
                                    <!-- .product -->
                                    <div class="product ">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Thêm vào yêu thích</a>
                                        </div>
                                        <!-- .yith-wcwl-add-to-wishlist -->
                                        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="single-product-fullwidth.html">
                                            <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="assets/images/products/9.jpg">
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                            </span>
                                            <h2 class="woocommerce-loop-product__title">Watch Stainless with Grey Suture Leather Strap</h2>
                                        </a>
                                        <!-- .woocommerce-LoopProduct-link -->
                                        <div class="hover-area">
                                            <a class="button" href="cart.html">Thêm vào giỏ hàng</a>
                                            <a class="add-to-compare-link" href="compare.html">So sánh</a>
                                        </div>
                                        <!-- .hover-area -->
                                    </div>
                                    <!-- .product -->
                                    <div class="product last">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Thêm vào yêu thích</a>
                                        </div>
                                        <!-- .yith-wcwl-add-to-wishlist -->
                                        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="single-product-fullwidth.html">
                                            <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="assets/images/products/10.jpg">
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                            </span>
                                            <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook 8GB 512SSD W10</h2>
                                        </a>
                                        <!-- .woocommerce-LoopProduct-link -->
                                        <div class="hover-area">
                                            <a class="button" href="cart.html">Thêm vào giỏ hàng</a>
                                            <a class="add-to-compare-link" href="compare.html">So sánh</a>
                                        </div>
                                        <!-- .hover-area -->
                                    </div>
                                    <!-- .product -->
                                </div>
                                <!-- .products -->
                            </div>
                            <!-- .woocommerce -->
                        </div>
                    </div>
                    <!-- .tab-content -->
                    <div class="shop-control-bar-bottom">
                        <form class="form-techmarket-wc-ppp" method="POST">
                            <select class="techmarket-wc-wppp-select c-select" onchange="this.form.submit()" name="ppp">
                                <option value="20">Hiển thị 20</option>
                                <option value="40">Hiển thị 40</option>
                                <option value="-1">Hiển thị tất cả</option>
                            </select>
                            <input type="hidden" value="5" name="shop_columns">
                            <input type="hidden" value="15" name="shop_per_page">
                            <input type="hidden" value="right-sidebar" name="shop_layout">
                        </form>
                        <!-- .form-techmarket-wc-ppp -->
                        <p class="woocommerce-result-count">
                            Showing 1&ndash;15 of 73 results
                        </p>
                        <!-- .woocommerce-result-count -->
                        <nav class="woocommerce-pagination">
                            <ul class="page-numbers">
                                <li>
                                    <span class="page-numbers current">1</span>
                                </li>
                                <li><a href="#" class="page-numbers">2</a></li>
                                <li><a href="#" class="page-numbers">3</a></li>
                                <li><a href="#" class="page-numbers">4</a></li>
                                <li><a href="#" class="page-numbers">5</a></li>
                                <li><a href="#" class="next page-numbers">→</a></li>
                            </ul>
                            <!-- .page-numbers -->
                        </nav>
                        <!-- .woocommerce-pagination -->
                    </div>
                    <!-- .shop-control-bar-bottom -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
            <div id="secondary" class="widget-area shop-sidebar" role="complementary">
                <div class="widget woocommerce widget_product_categories techmarket_widget_product_categories" id="techmarket_product_categories_widget-2">
                    <ul class="product-categories ">
                        <li class="product_cat">
                            <span>Danh mục sản phẩm</span>
                            <ul>
                                <li class="cat-item">
                                    <a href="product-category.html">
                                        <span class="no-child"></span>Tivi</a>
                                </li>
                                <li class="cat-item">
                                    <a href="product-category.html">
                                        <span class="no-child"></span>Âm thanh &amp; rạp hát tại nhà</a>
                                </li>
                                <li class="cat-item">
                                    <a href="product-category.html">
                                        <span class="child-indicator">
                                            <i class="fa fa-angle-right"></i>
                                        </span>Tai nghe</a>
                                </li>
                                <li class="cat-item">
                                    <a href="product-category.html">
                                        <span class="child-indicator">
                                            <i class="fa fa-angle-right"></i>
                                        </span>Máy ảnh kỹ thuật số</a>
                                </li>
                                <li class="cat-item">
                                    <a href="product-category.html">
                                        <span class="child-indicator">
                                            <i class="fa fa-angle-right"></i>
                                        </span>Điện thoại &amp; máy tính bảng</a>
                                </li>
                                <li class="cat-item">
                                    <a href="product-category.html">
                                        <span class="no-child"></span>Đồng hồ thông minh</a>
                                </li>
                                <li class="cat-item">
                                    <a href="product-category.html">
                                        <span class="child-indicator">
                                            <i class="fa fa-angle-right"></i>
                                        </span>Trò chơi &amp; máy chơi game</a>
                                </li>
                                <li class="cat-item">
                                    <a href="product-category.html">
                                        <span class="no-child"></span>Máy in</a>
                                </li>
                                <li class="cat-item">
                                    <a href="product-category.html">
                                        <span class="no-child"></span>TV &amp; Video</a>
                                </li>
                                <li class="cat-item">
                                    <a href="product-category.html">
                                        <span class="child-indicator">
                                            <i class="fa fa-angle-right"></i>
                                        </span>Giải trí tại nhà</a>
                                </li>
                                <li class="cat-item">
                                    <a href="product-category.html">
                                        <span class="child-indicator">
                                            <i class="fa fa-angle-right"></i>
                                        </span>Máy tính &amp; laptop</a>
                                </li>
                                <li class="cat-item">
                                    <a href="product-category.html">
                                        <span class="no-child"></span>Notebook</a>
                                </li>
                                <li class="cat-item">
                                    <a href="product-category.html">
                                        <span class="child-indicator">
                                            <i class="fa fa-angle-right"></i>
                                        </span>Máy tính để bàn</a>
                                </li>
                                <li class="cat-item">
                                    <a href="product-category.html">
                                        <span class="no-child"></span>Máy tính Mac</a>
                                </li>
                                <li class="cat-item">
                                    <a href="product-category.html">
                                        <span class="child-indicator">
                                            <i class="fa fa-angle-right"></i>
                                        </span>PC All in One</a>
                                </li>
                                <li class="cat-item">
                                    <a href="product-category.html">
                                        <span class="child-indicator">
                                            <i class="fa fa-angle-right"></i>
                                        </span>Âm nhạc &amp; âm thanh</a>
                                </li>
                                <li class="cat-item">
                                    <a href="product-category.html">
                                        <span class="no-child"></span>Linh kiện máy tính</a>
                                </li>
                                <li class="cat-item">
                                    <a href="product-category.html">
                                        <span class="child-indicator">
                                            <i class="fa fa-angle-right"></i>
                                        </span>Máy tính để bàn</a>
                                </li>
                                <li class="cat-item">
                                    <a href="product-category.html">
                                        <span class="no-child"></span>Màn hình</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="techmarket_products_filter-3" class="widget widget_techmarket_products_filter">
                    <span class="gamma widget-title">Bộ lọc</span>
                    <div class="widget woocommerce widget_price_filter" id="woocommerce_price_filter-2">
                        <p>
                            <span class="gamma widget-title">Lọc theo giá</span>
                            <div class="price_slider_amount">
                                <input id="amount" type="text" placeholder="Giá tối thiểu" data-min="6" value="33" name="min_price" style="display: none;">
                                <button class="button" type="submit">Lọc</button>
                            </div>
                            <div id="slider-range" class="price_slider"></div>
                    </div>
                    <div class="widget woocommerce widget_layered_nav maxlist-more" id="woocommerce_layered_nav-2">
                        <span class="gamma widget-title">Thương hiệu</span>
                        <ul>
                            <li class="wc-layered-nav-term ">
                                <a href="#">apple</a>
                                <span class="count">(2)</span>
                            </li>
                            <li class="wc-layered-nav-term "><a href="#">bosch</a>
                                <span class="count">(1)</span>
                            </li>
                            <li class="wc-layered-nav-term "><a href="#">cannon</a>
                                <span class="count">(1)</span>
                            </li>
                            <li class="wc-layered-nav-term "><a href="#">connect</a>
                                <span class="count">(1)</span>
                            </li>
                            <li class="wc-layered-nav-term "><a href="#">galaxy</a>
                                <span class="count">(3)</span>
                            </li>
                            <li class="wc-layered-nav-term "><a href="#">gopro</a>
                                <span class="count">(1)</span>
                            </li>
                            <li class="wc-layered-nav-term "><a href="#">kinova</a>
                                <span class="count">(1)</span>
                            </li>
                            <li class="wc-layered-nav-term "><a href="#">samsung</a>
                                <span class="count">(1)</span>
                            </li>
                        </ul>
                    </div>
                    <!-- .woocommerce widget_layered_nav -->
                    <div class="widget woocommerce widget_layered_nav maxlist-more" id="woocommerce_layered_nav-3">
                        <span class="gamma widget-title">Màu sắc</span>
                        <ul>
                            <li class="wc-layered-nav-term "><a href="#">Đen</a>
                                <span class="count">(4)</span>
                            </li>
                            <li class="wc-layered-nav-term "><a href="#">Xanh dương</a>
                                <span class="count">(4)</span>
                            </li>
                            <li class="wc-layered-nav-term "><a href="#">Xanh lá</a>
                                <span class="count">(5)</span>
                            </li>
                            <li class="wc-layered-nav-term "><a href="#">Cam</a>
                                <span class="count">(5)</span>
                            </li>
                            <li class="wc-layered-nav-term "><a href="#">Đỏ</a>
                                <span class="count">(4)</span>
                            </li>
                            <li class="wc-layered-nav-term "><a href="#">Vàng</a>
                                <span class="count">(5)</span>
                            </li>
                            <li class="wc-layered-nav-term "><a href="#">Green</a>
                                <span class="count">(5)</span>
                            </li>
                            <li class="wc-layered-nav-term "><a href="#">Orange</a>
                                <span class="count">(5)</span>
                            </li>
                            <li class="wc-layered-nav-term "><a href="#">Red</a>
                                <span class="count">(4)</span>
                            </li>
                            <li class="wc-layered-nav-term "><a href="#">Yellow</a>
                                <span class="count">(5)</span>
                            </li>
                        </ul>
                    </div>
                    <!-- .woocommerce widget_layered_nav -->
                </div>
                <div class="widget widget_techmarket_products_carousel_widget">
                    <section id="single-sidebar-carousel" class="section-products-carousel">
                        <header class="section-header">
                            <h2 class="section-title">Sản phẩm mới nhất</h2>
                            <nav class="custom-slick-nav"></nav>
                        </header>
                        <!-- .section-header -->
                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#single-sidebar-carousel .custom-slick-nav&quot;}">
                            <div class="container-fluid">
                                <div class="woocommerce columns-1">
                                    <div class="products">
                                        <div class="landscape-product-widget product">
                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/sm-1.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="price">
                                                            <ins>
                                                                <span class="amount"> 50.99</span>
                                                            </ins>
                                                            <del>
                                                                <span class="amount">26.99</span>
                                                            </del>
                                                        </span>
                                                        <!-- .price -->
                                                        <h2 class="woocommerce-loop-product__title">S100 Wireless Bluetooth Speaker – Neon Green</h2>
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
                                        <div class="landscape-product-widget product">
                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/sm-2.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="price">
                                                            <ins>
                                                                <span class="amount"> 50.99</span>
                                                            </ins>
                                                            <del>
                                                                <span class="amount">26.99</span>
                                                            </del>
                                                        </span>
                                                        <!-- .price -->
                                                        <h2 class="woocommerce-loop-product__title">S100 Wireless Bluetooth Speaker – Neon Green</h2>
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
                                        <div class="landscape-product-widget product">
                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/sm-3.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="price">
                                                            <ins>
                                                                <span class="amount"> 50.99</span>
                                                            </ins>
                                                            <del>
                                                                <span class="amount">26.99</span>
                                                            </del>
                                                        </span>
                                                        <!-- .price -->
                                                        <h2 class="woocommerce-loop-product__title">S100 Wireless Bluetooth Speaker – Neon Green</h2>
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
                                        <div class="landscape-product-widget product">
                                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                                <div class="media">
                                                    <img class="wp-post-image" src="assets/images/products/sm-4.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="price">
                                                            <ins>
                                                                <span class="amount"> 50.99</span>
                                                            </ins>
                                                            <del>
                                                                <span class="amount">26.99</span>
                                                            </del>
                                                        </span>
                                                        <!-- .price -->
                                                        <h2 class="woocommerce-loop-product__title">S100 Wireless Bluetooth Speaker – Neon Green</h2>
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
                                    </div>
                                    <!-- .products -->
                                </div>
                                <!-- .woocommerce -->
                            </div>
                            <!-- .container-fluid -->
                        </div>
                        <!-- .products-carousel -->
                    </section>
                    <!-- .section-products-carousel -->
                </div>
                <!-- .widget_techmarket_products_carousel_widget -->
            </div>
            <!-- #secondary -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</div>
@endsection