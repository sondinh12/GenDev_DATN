@extends('client.layout.master')

@section('styles')
<style>
    .category-item {
        position: relative;
        width: 100%;
    }
    .parent-category {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        color: #333;
        text-decoration: none;
        cursor: pointer;
        width: 100%;
    }
    .parent-category:hover {
        color: #007bff;
    }
    .parent-category i {
        transition: transform 0.3s ease;
        margin-left: 5px;
    }
    .parent-category.active i {
        transform: rotate(180deg);
    }
    .sub-categories {
        list-style: none;
        padding-left: 20px;
        margin: 0;
        display: none;
        width: 100%;
        position: absolute;
        left: 100%;
        top: 0;
        background: white;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        min-width: 200px;
        z-index: 1000;
    }
    .category-item:hover .sub-categories {
        display: block;
    }
    .sub-categories li {
        margin: 5px 0;
        width: 100%;
    }
    .child-category {
        color: #666;
        text-decoration: none;
        display: block;
        padding: 8px 15px;
        width: 100%;
        transition: all 0.3s ease;
    }
    .child-category:hover {
        color: #007bff;
        background: #f8f9fa;
    }
    .woocommerce-widget-layered-nav-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .woocommerce-widget-layered-nav-list__item {
        margin: 0;
        padding: 0;
        width: 100%;
        position: relative;
    }
    .category-item:hover .parent-category {
        color: #007bff;
    }
</style>
@endsection

@section('content')
<div id="content" class="site-content" tabindex="-1">
    <div class="col-full">
        <div class="row">
            <nav class="woocommerce-breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span>
                <a href="{{ route('shop') }}">Shop</a>
            </nav>
            <!-- .woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="shop-control-bar">
                        <div class="handheld-sidebar-toggle">
                            <button type="button" class="btn sidebar-toggler">
                                <i class="fa fa-sliders"></i>
                                <span>Filters</span>
                            </button>
                        </div>
                        <!-- .handheld-sidebar-toggle -->
                        <h1 class="woocommerce-products-header__title page-title">Shop</h1>
                        <ul role="tablist" class="shop-view-switcher nav nav-tabs">
                            <li class="nav-item">
                                <a href="#grid" title="Grid View" data-toggle="tab" class="nav-link active">
                                    <i class="tm tm-grid-small"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#list-view" title="List View" data-toggle="tab" class="nav-link">
                                    <i class="tm tm-listing"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- .shop-view-switcher -->
                        <form method="get" class="woocommerce-ordering">
                            <select class="orderby" name="orderby" onchange="this.form.submit()">
                                <option value="date" {{ request('orderby') == 'date' ? 'selected' : '' }}>Sort by newness</option>
                                <option value="price" {{ request('orderby') == 'price' ? 'selected' : '' }}>Sort by price: low to high</option>
                                <option value="price-desc" {{ request('orderby') == 'price-desc' ? 'selected' : '' }}>Sort by price: high to low</option>
                            </select>
                        </form>
                        <!-- .woocommerce-ordering -->
                    </div>
                    <!-- .shop-control-bar -->
                    <div class="tab-content">
                        <div id="grid" class="tab-pane active" role="tabpanel">
                            <div class="woocommerce columns-4">
                                <div class="products">
                                    @foreach($products as $product)
                                    <div class="product {{ $loop->first ? 'first' : '' }} {{ $loop->last ? 'last' : '' }}">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <a href="#" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                        </div>
                                        <!-- .yith-wcwl-add-to-wishlist -->
                                        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="{{ route('product.show', $product->id) }}">
                                            <img width="224" height="197" alt="{{ $product->name }}" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="{{ asset('storage/' . $product->image) }}">
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>{{ number_format($product->price, 2) }}
                                                </span>
                                                @if($product->sale_price)
                                                <del>
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol">$</span>{{ number_format($product->sale_price, 2) }}
                                                    </span>
                                                </del>
                                                @endif
                                            </span>
                                            <h2 class="woocommerce-loop-product__title">{{ $product->name }}</h2>
                                        </a>
                                        <!-- .woocommerce-LoopProduct-link -->
                                        <div class="hover-area">
                                            <a class="add-to-compare-link" href="#">Add to compare</a>
                                        </div>
                                        <!-- .hover-area -->
                                    </div>
                                    <!-- .product -->
                                    @endforeach
                                </div>
                                <!-- .products -->
                            </div>
                            <!-- .woocommerce -->
                            <div class="pagination">
                                {{ $products->links() }}
                            </div>
                        </div>
                        <!-- #grid -->
                        <div id="list-view" class="tab-pane" role="tabpanel">
                            <div class="woocommerce">
                                <div class="products">
                                    @foreach($products as $product)
                                    <div class="product">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <a href="#" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                        </div>
                                        <!-- .yith-wcwl-add-to-wishlist -->
                                        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="{{ route('product.show', $product->id) }}">
                                            <img width="224" height="197" alt="{{ $product->name }}" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="{{ asset('storage/' . $product->image) }}">
                                            <div class="product-details">
                                                <h2 class="woocommerce-loop-product__title">{{ $product->name }}</h2>
                                                <div class="product-short-description">
                                                    <p>{{ Str::limit($product->description, 200) }}</p>
                                                </div>
                                                <span class="price">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol">$</span>{{ number_format($product->price, 2) }}
                                                    </span>
                                                    @if($product->sale_price)
                                                    <del>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">$</span>{{ number_format($product->sale_price, 2) }}
                                                        </span>
                                                    </del>
                                                    @endif
                                                </span>
                                            </div>
                                        </a>
                                        <!-- .woocommerce-LoopProduct-link -->
                                        <div class="hover-area">
                                            <a class="add-to-compare-link" href="#">Add to compare</a>
                                        </div>
                                        <!-- .hover-area -->
                                    </div>
                                    <!-- .product -->
                                    @endforeach
                                </div>
                                <!-- .products -->
                                <div class="pagination">
                                    {{ $products->links() }}
                                </div>
                            </div>
                            <!-- .woocommerce -->
                        </div>
                        <!-- #list-view -->
                    </div>
                    <!-- .tab-content -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
            <div id="secondary" class="widget-area shop-sidebar" role="complementary">
                <aside class="widget widget_techmarket_products_filter">
                    <h3 class="widget-title">Filter Products</h3>
                    <form method="get" class="woocommerce-widget-layered-nav-form">
                        <div class="widget widget_techmarket_products_filter">
                            <h4 class="widget-title">Categories</h4>
                            <ul class="woocommerce-widget-layered-nav-list">
                                @foreach($categories as $category)
                                <li class="woocommerce-widget-layered-nav-list__item">
                                    <div class="category-item"> 
                                        <a href="{{ route('shop', ['category' => $category->id]) }}" class="parent-category">
                                            {{ $category->name }}
                                            @if($category->categoryMinis->count() > 0)
                                            <i class="fa fa-angle-right"></i>
                                            @endif
                                        </a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget widget_techmarket_products_filter">
                            <h4 class="widget-title">Price</h4>
                            <form method="get" class="price-filter">
                                <div class="price_slider_wrapper">
                                    <div class="price_slider" style="display:none;"></div>
                                    <div class="price_slider_amount">
                                        <input type="text" name="min_price" value="{{ request('min_price', '0') }}" data-min="0" placeholder="Min price" />
                                        <input type="text" name="max_price" value="{{ request('max_price', '1000') }}" data-max="1000" placeholder="Max price" />
                                        <button type="submit" class="button">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </form>
                </aside>
            </div>
            <!-- #secondary -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</div>
<!-- #content -->
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const parentCategories = document.querySelectorAll('.parent-category');
        
        parentCategories.forEach(category => {
            category.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                // Toggle active class on parent category
                this.classList.toggle('active');
            });
        });

        // Add click event to child categories
        const childCategories = document.querySelectorAll('.child-category');
        childCategories.forEach(category => {
            category.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });
    });
</script>
@endsection


