@extends('client.layout.master')

@push('styles')
<style>
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
<div class="container py-4">
    <!-- Breadcrumb -->
    <nav class="woocommerce-breadcrumb mb-4">
        <a href="{{ route('home') }}">Trang chủ</a>
        <span class="delimiter"><i class="tm tm-breadcrumbs-arrow-right"></i></span>
        <span>Cửa hàng</span>
    </nav>
    <div class="row">
        <!-- Sidebar -->
        <aside class="col-lg-3 col-md-4 mb-4 mb-lg-0">
            <div class="widget widget_product_categories">
                <h3 class="widget-title">Danh mục sản phẩm</h3>
                <ul class="product-categories">
                    @foreach($categories as $category)
                    <li
                        class="cat-item cat-item-{{ $category->id }} {{ request('category') == $category->id ? 'current-cat' : '' }}">
                        <a href="{{ route('shop', array_merge(request()->query(), ['category' => $category->id])) }}">{{
                            $category->name }}</a>
                        {{-- Comment phần danh mục con
                        @if($category->categoryMinis->count())
                        <ul class="children">
                            @foreach($category->categoryMinis as $mini)
                            <li
                                class="cat-item cat-item-{{ $mini->id }} {{ request('category_mini') == $mini->id ? 'current-cat' : '' }}">
                                <a
                                    href="{{ route('shop', array_merge(request()->query(), ['category_mini' => $mini->id])) }}">{{
                                    $mini->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        --}}
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="widget">
                <h3 class="widget-title">Lọc theo giá</h3>
                <form method="get" class="woocommerce-widget-layered-nav-form" id="priceFilterForm"
                    onsubmit="return validatePriceFilter();">
                    <div class="form-group mb-2">
                        <input type="number" name="min_price" class="form-control mb-2" placeholder="Từ"
                            value="{{ request('min_price') }}" min="{{ $priceRange->min_price ?? 0 }}"
                            max="{{ $priceRange->max_price ?? '' }}" id="minPriceInput">
                        <input type="number" name="max_price" class="form-control" placeholder="Đến"
                            value="{{ request('max_price') }}" min="{{ $priceRange->min_price ?? 0 }}"
                            max="{{ $priceRange->max_price ?? '' }}" id="maxPriceInput">
                        <div id="priceFilterError" class="text-danger small mt-1" style="display:none;"></div>
                    </div>
                    <button type="submit" class="button btn btn-primary btn-block w-100">Lọc giá</button>
                </form>
            </div>
        </aside>
        <!-- Main Content -->
        <main class="col-lg-9 col-md-8">
            <div class="shop-control-bar mb-3 d-flex flex-wrap align-items-center justify-content-between">
                <form class="woocommerce-ordering d-flex flex-wrap gap-2 align-items-center" method="get">
                    <input type="text" name="search" class="form-control me-2" style="max-width:200px"
                        placeholder="Tìm kiếm sản phẩm..." value="{{ request('search') }}">
                    <select name="orderby" class="orderby form-select me-2" style="max-width:160px"
                        onchange="this.form.submit()">
                        <option value="date" {{ request('orderby')=='date' ? 'selected' : '' }}>Mới nhất</option>
                        <option value="price" {{ request('orderby')=='price' ? 'selected' : '' }}>Giá tăng dần</option>
                        <option value="price-desc" {{ request('orderby')=='price-desc' ? 'selected' : '' }}>Giá giảm dần
                        </option>
                        <option value="name" {{ request('orderby')=='name' ? 'selected' : '' }}>Tên A-Z</option>
                        <option value="popularity" {{ request('orderby')=='popularity' ? 'selected' : '' }}>Bán chạy
                        </option>
                    </select>
                    <button type="submit" class="button btn btn-outline-primary">Lọc</button>
                    <a href="{{ route('shop') }}" class="button btn btn-outline-secondary ms-2">Xóa bộ lọc</a>
                </form>
                <div class="woocommerce-result-count mt-2 mt-md-0">
                    Hiển thị {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} trong {{
                    $products->total() }} sản phẩm
                </div>
            </div>
            @if($products->count() > 0)
            <div class="row">
                @foreach($products as $product)
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <div class="product h-100 d-flex flex-column text-center p-2 border rounded">
                    <a href="{{ route('client.product.show', $product->id) }}"
                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                        @php $priceInfo = App\Helpers\ProductHelper::getProductPriceInfo($product); @endphp
                        @if($priceInfo['has_discount'])
                        <span class="onsale">-{{ $priceInfo['discount_percent'] }}%</span>
                        @endif
                        <img src="https://sakurafashion.vn/upload/a/3927-mypage-8987.jpg" alt="{{ $product->name }}"
                            class="attachment-shop_catalog size-shop_catalog wp-post-image">
                        <h2 class="woocommerce-loop-product__title">{{ $product->name }}</h2>
                        <span class="price">
                            @if($priceInfo['has_discount'])
                            <ins class="text-danger fw-bold fs-6">{{ $priceInfo['display_price'] }}</ins>
                            <del>{{ number_format($priceInfo['original_price']) }}đ</del>
                            @else
                            <ins>{{ $priceInfo['display_price'] }}</ins>
                            @endif
                        </span>
                    </a>
                    <a href="{{ route('client.product.show', $product->id) }}" class="button add_to_cart_button">Xem chi
                        tiết</a>
                    </div>
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
                <a href="{{ route('shop') }}" class="button btn btn-primary">Xem tất cả sản phẩm</a>
            </div>
            @endif
        </main>
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