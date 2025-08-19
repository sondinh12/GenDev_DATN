@extends('client.layout.master')

@push('styles')
    <style>
        .col-lg-2-4 {
            flex: 0 0 20%;
            max-width: 20%;
        }

        .product img {
            max-height: 200px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .product .price {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product h2 {
            font-size: 1rem;
            min-height: 48px;
        }

        .product .onsale {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: red;
            color: white;
            padding: 2px 6px;
            font-size: 12px;
            border-radius: 3px;
        }

        .product a.add_to_cart_button {
            margin-top: auto;
        }
    </style>
@endpush

@section('content')
    <div id="content" class="site-content" tabindex="-1">
        <div class="col-full">
            <div class="row">
                <nav class="woocommerce-breadcrumb">
                    <a href="{{ route('home') }}">Trang chủ</a>
                    <span class="delimiter"><i class="tm tm-breadcrumbs-arrow-right"></i></span>
                    <span>Cửa hàng</span>
                </nav>

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
                            <form method="get" class="woocommerce-ordering">
                                <select class="orderby" name="orderby" onchange="this.form.submit()">
                                    <option value="popularity" {{ request('orderby') == 'popularity' ? 'selected' : '' }}>
                                        Sắp xếp theo lượt bán chạy</option>
                                    <option value="name" {{ request('orderby') == 'name' ? 'selected' : '' }}>Sắp xếp theo
                                        tên từ A -> Z</option>
                                    <option value="date" {{ request('orderby') == 'date' ? 'selected' : '' }}>Sắp xếp theo
                                        sản phẩm mới nhất</option>
                                    <option value="price" {{ request('orderby') == 'price' ? 'selected' : '' }}>Sắp xếp
                                        theo giá: thấp đến cao</option>
                                    <option value="price-desc" {{ request('orderby') == 'price-desc' ? 'selected' : '' }}>
                                        Sắp xếp theo giá: cao đến thấp</option>
                                </select>
                                <a href="{{ route('shop') }}" class="button btn btn-outline-secondary ms-2">Xóa bộ lọc</a>

                                <input type="hidden" value="5" name="shop_columns">
                                <input type="hidden" value="15" name="shop_per_page">
                                <input type="hidden" value="right-sidebar" name="shop_layout">
                            </form>
                            <!-- .woocommerce-ordering -->
                            <nav class="techmarket-advanced-pagination">
                                <form class="form-adv-pagination" method="post">
                                    <input type="number" value="1" class="form-control" step="1" max="5"
                                        min="1" size="2" id="goto-page">
                                </form> trong 5<a href="#" class="next page-numbers">→</a>
                            </nav>
                        </div>

                        <!-- Main Content -->
                        <div class="section-deals-carousel-and-products-carousel-tabs">
                            <div id="grid-extended" class="tab-pane" role="tabpanel">
                                @if ($products->count() > 0)
                                    <div class="row woocommerce columns-5">
                                        @foreach ($products as $product)
                                            <div class="col-md-4 col-lg-2-4 mb-4" id="best-selling-wrapper">
                                                @include('client.components.product-card', [
                                                    'product' => $product,
                                                ])
                                            </div>
                                        @endforeach
                                    </div>
                                    <nav class="woocommerce-pagination mt-4">
                                        {{ $products->links() }}
                                    </nav>
                                @else
                                    <div class="alert alert-info text-center py-5">
                                        <i class="fa fa-search fa-2x mb-3"></i>
                                        <h4>Không tìm thấy sản phẩm</h4>
                                        <p>Hãy thử thay đổi bộ lọc hoặc từ khóa tìm kiếm</p>
                                        <a href="{{ route('shop') }}" class="button btn btn-primary">Xem tất cả sản
                                            phẩm</a>
                                    </div>
                                @endif
                            </div>
                            {{-- <div class="woocommerce-result-count mt-2 mt-md-0">
                            Hiển thị {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} trong
                            {{ $products->total() }} sản phẩm
                        </div> --}}
                        </div>
                    </main>
                </div>

                <div id="secondary" class="widget-area shop-sidebar" role="complementary">
                    <div id="techmarket_products_filter-3" class="widget widget_techmarket_products_filter">
                        <span class="gamma widget-title">Bộ lọc</span>
                        <div class="widget woocommerce widget_price_filter" id="woocommerce_price_filter-2">
                            <div class="widget">
                                <h3 class="gamma widget-title">Lọc theo giá</h3>
                                <form method="get" class="woocommerce-widget-layered-nav-form" id="priceFilterForm"
                                    onsubmit="return validatePriceFilter();">
                                    <div class="form-group mb-2">
                                        <input type="number" name="min_price" class="form-control mb-2" placeholder="Từ"
                                            value="{{ request('min_price') }}" min="0" id="minPriceInput">
                                        <input type="number" name="max_price" class="form-control" placeholder="Đến"
                                            value="{{ request('max_price') }}" min="0" id="maxPriceInput">
                                        <div id="priceFilterError" class="text-danger small mt-1" style="display:none;">
                                        </div>
                                    </div>
                                    <button type="submit" class="button btn btn-outline-primary">Lọc giá</button>
                                </form>
                            </div>
                            <div id="slider-range" class="price_slider"></div>
                        </div>
                        @foreach ($attributes as $attribute)
                            <div class="widget woocommerce widget_layered_nav maxlist-more">
                                <span class="gamma widget-title">Lọc theo {{ $attribute->name }}</span>
                                <ul>
                                    @foreach ($attribute->values as $value)
                                        <li class="wc-layered-nav-term">
                                            <a
                                                href="{{ request()->fullUrlWithQuery(['attribute_values[]' => $value->id]) }}">
                                                {{ $value->value }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        @endsection

        @section('scripts')
            @parent
            <script>
                function validatePriceFilter() {
                    const minInput = document.getElementById('minPriceInput');
                    const maxInput = document.getElementById('maxPriceInput');
                    const errorDiv = document.getElementById('priceFilterError');
                    const min = minInput.value ? parseInt(minInput.value) : null;
                    const max = maxInput.value ? parseInt(maxInput.value) : null;
                    errorDiv.style.display = 'none';
                    errorDiv.textContent = '';
                    if (min !== null && min < 0) {
                        errorDiv.textContent = 'Giá tối thiểu phải lớn hơn hoặc bằng 0.';
                        errorDiv.style.display = 'block';
                        minInput.focus();
                        return false;
                    }
                    if (max !== null && max < 0) {
                        errorDiv.textContent = 'Giá tối đa phải lớn hơn hoặc bằng 0.';
                        errorDiv.style.display = 'block';
                        maxInput.focus();
                        return false;
                    }
                    if (min !== null && max !== null && min > max) {
                        errorDiv.textContent = 'Giá tối thiểu không được lớn hơn giá tối đa.';
                        errorDiv.style.display = 'block';
                        minInput.focus();
                        return false;
                    }
                    return true;
                }
            </script>
        @endsection
