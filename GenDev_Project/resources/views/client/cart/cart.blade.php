{{-- @include('Admin.layouts.head-css') --}}
@extends('client.layout.master')

@section('content')
    <div id="content" class="site-content">
        <div class="col-full">
            <div class="row">
                <nav class="woocommerce-breadcrumb">
                    <a href="{{ route('home') }}">Trang chủ</a>
                    <span class="delimiter">
                        <i class="tm tm-breadcrumbs-arrow-right"></i>
                    </span>
                    Giỏ hàng
                </nav>
                <!-- .woocommerce-breadcrumb -->
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                </div>
                @endif

                @if(session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('warning') }}
                </div>
                @endif
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <div class="type-page hentry">
                            <div class="entry-content">
                                <div class="woocommerce">
                                    <form action="{{route('cart.handleaction')}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="cart-wrapper row align-items-start">
                                            <div class="woocommerce-cart-form col-md-8 col-sm-12 mb-4">
                                                    <table class="shop_table shop_table_responsive cart">
                                                        <thead>
                                                            <tr>
                                                                <th class="product-select" style="width: 30px;"><input
                                                                        type="checkbox" id="select-all-checkbox" checked>
                                                                </th>
                                                                <th class="product-thumbnail">Ảnh</th>
                                                                <th class="product-name">Tên sản phẩm</th>
                                                                <th class="product-price">Giá</th>
                                                                <th class="product-quantity">Số lượng</th>
                                                                <th class="product-subtotal">Thành tiền</th>
                                                                <th class="product-remove">&nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $cartSubtotal = 0;
                                                                foreach ($cart->details as $item) {
                                                                    $product = $item->product;
                                                                    $variant = $item->variant;
                                                                    $item->price = $variant
                                                                    ? ($variant->sale_price ?? $variant->price)
                                                                    : ($product->sale_price ?? $product->price);
                                                                    $cartSubtotal += $item->price * $item->quantity;
                                                                }
                                                            @endphp
                                                            @if($cart->details->isEmpty())
                                                            <tr>
                                                                    <td colspan="6" style="text-align: center; padding: 50px;">
                                                                        <p><strong>Chưa có sản phẩm nào trong giỏ hàng.</strong></p>
                                                                        <a href="{{ route('home') }}" class="button">Mua ngay</a>
                                                                    </td>
                                                                </tr>
                                                            @else
                                                            @foreach ($cart->details as $item)
                                                                <tr class="cart_item">
                                                                    <td class="product-select">
                                                                        <input type="checkbox" class="cart-item-checkbox"
                                                                            checked
                                                                            data-item-subtotal="{{ $item->price * $item->quantity }}"
                                                                            data-item-name="{{ $item->product->name }}"
                                                                            data-item-price="{{ $item->price }}"
                                                                            data-item-quantity="{{ $item->quantity }}"
                                                                            data-item-image="{{ asset('storage/' . ($item->product->image ?? 'default.jpg')) }}"
                                                                            name="selected_items[]" value="{{$item->id}}">
                                                                    </td>
                                                                    <!-- Thumbnail (ảnh phụ nhỏ) -->
                                                                    <td class="product-thumbnail">
                                                                        <a href="#">
                                                                            <img width="180" height="180" alt=""
                                                                                class="wp-post-image"
                                                                                src="{{ asset('storage/' . ($item->product->image ?? 'default.jpg')) }}">
                                                                        </a>
                                                                    </td>

                                                                    <!-- Tên sản phẩm + thuộc tính biến thể -->
                                                                    <td data-title="Product" class="product-name">
                                                                        <div style="display: flex; align-items: center;">
                                                                            <img src="{{ asset('storage/' . ($item->product->image ?? 'default.jpg')) }}"
                                                                                alt="{{ $item->product->name }}"
                                                                                style="width:36px; height:36px; object-fit:cover; border-radius:6px; margin-right:10px;">
                                                                            <div>
                                                                                <a href="#">{{ $item->product->name }}</a><br>
                                                                                @if ($item->variant && $item->variant->variantAttributes)
                                                                                    @foreach ($item->variant->variantAttributes as $attr)
                                                                                        <small>{{ $attr->attribute->name }}:
                                                                                            {{ $attr->value->value }}</small><br>
                                                                                    @endforeach
                                                                                @else
                                                                                    <small>Không có biến thể</small>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <!-- Giá -->
                                                                    <td data-title="Price" class="product-price">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            {{ number_format($item->price) }}<span
                                                                                class="woocommerce-Price-currencySymbol">
                                                                                VNĐ</span>
                                                                        </span>
                                                                    </td>

                                                                    <!-- Số lượng -->
                                                                    <td class="product-quantity" data-title="Quantity">

                                                                        <div class="quantity">
                                                                            <label
                                                                                for="quantity-input-{{ $item->id }}">Quantity</label>
                                                                            <input id="quantity-input-{{ $item->id }}"
                                                                                type="number" name="quantities[{{ $item->id }}]"
                                                                                value="{{ $item->quantity }}" title="Qty"
                                                                                class="input-text qty text" size="4" min="1">
                                                                        </div>
                                                                    </td>
                                                                    <!-- Tổng giá sản phẩm -->
                                                                    <td data-title="Total" class="product-subtotal">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            {{ number_format($item->price * $item->quantity) }}<span
                                                                                class="woocommerce-Price-currencySymbol">
                                                                                VNĐ</span>
                                                                        </span>
                                                                    </td>
                                                                    <td class="product-remove">
                                                                        <button type="button" class="remove"
                                                                            style="background: none !important;
                                                                                                                    border: none ;
                                                                                                                    color: #dc3545;
                                                                                                                    font-size: 16px;" title="Xóa sản phẩm"
                                                                            onclick="deleteCartItem(this)"
                                                                            data-action="{{ route('destroy', $item->id) }}">
                                                                            <i class="fa-solid fa-trash-can"></i>
                                                                        </button>

                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                            <tr>
                                                                <td class="actions" colspan="7">
                                                                    <div class="coupon">
                                                                        <label for="coupon_code">Mã giảm giá:</label> <br>
                                                                        <input type="text" placeholder="Nhập mã giảm giá"
                                                                            value="" id="coupon_code" class="input-text"
                                                                            name="coupon_code">
                                                                        <input type="submit" value="Áp dụng"
                                                                            name="apply_coupon" class="button">
                                                                    </div>

                                                                    {{-- <input type="submit" value="Cập nhật"
                                                                        name="update_cart" class="button"> --}}
                                                                    <button type="submit" name="update_cart"
                                                                        class="button">Cập nhật</button>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                        <!-- .shop_table shop_table_responsive -->
                                    </form>
                                    </div>
                                            <!-- .woocommerce-cart-form -->
                                            <div class="cart-collaterals col-md-4 col-sm-12">
                                                <div class="cart_totals ">
                                                    <h2>Tổng giỏ hàng</h2>
                                                    <div id="selected-products-list"></div>
                                                    <table class="shop_table shop_table_responsive">
                                                        <tbody>
                                                            <tr class="cart-subtotal">
                                                                <th>Tạm tính</th>
                                                                <td data-title="Subtotal">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span
                                                                            id="cart-subtotal-value">{{ number_format($cartSubtotal) }}</span><span
                                                                            class="woocommerce-Price-currencySymbol">
                                                                            VNĐ</span>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr class="shipping">
                                                                <th>Vận chuyển</th>
                                                                <td data-title="Shipping">Phí cố định</td>
                                                            </tr>
                                                            <tr class="order-total">
                                                                <th>Tổng cộng</th>
                                                                <td data-title="Total">
                                                                    <strong>
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span
                                                                                id="cart-total-value">{{ number_format($cartSubtotal) }}</span><span
                                                                                class="woocommerce-Price-currencySymbol">
                                                                                VNĐ</span>
                                                                        </span>
                                                                    </strong>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- .shop_table shop_table_responsive -->
                                                    <div class="wc-proceed-to-checkout">
                                                        <!-- .wc-proceed-to-checkout -->
                                                        <button type="submit" name="btn_checkout"
                                                            class="button wc-forward text-center">Checkout</button>
                                                        <a class="back-to-shopping" href="shop.html">Back to Shopping</a>
                                                    </div>
                                                    <!-- .cart_totals -->
                                                </div>
                                                <!-- .cart-collaterals -->
                                            </div>
                                            <!-- .cart-wrapper -->
                                        </div>
                                        <!-- .woocommerce -->
                                    </form>
                                </div>
                                <!-- .entry-content -->
                            </div>
                            <!-- .hentry -->
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
<form id="delete-cart-item-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectAllCheckbox = document.getElementById('select-all-checkbox');
        const itemCheckboxes = document.querySelectorAll('.cart-item-checkbox');
        const subtotalElement = document.getElementById('cart-subtotal-value');
        const totalElement = document.getElementById('cart-total-value');

        function formatCurrency(value) {
            return new Intl.NumberFormat('vi-VN').format(value);
        }

        function updateTotals() {
            let subtotal = 0;
            let selectedProducts = [];
            itemCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    const name = checkbox.getAttribute('data-item-name');
                    const price = parseFloat(checkbox.getAttribute('data-item-price'));
                    const quantity = parseInt(checkbox.getAttribute('data-item-quantity'));
                    subtotal += price * quantity;
                    selectedProducts.push({
                        name,
                        price,
                        quantity
                    });
                }
            });

            subtotalElement.textContent = formatCurrency(subtotal);
            totalElement.textContent = formatCurrency(subtotal);

            // Hiển thị danh sách sản phẩm đã chọn
            const selectedProductsList = document.getElementById('selected-products-list');
            if (selectedProducts.length > 0) {
                selectedProductsList.innerHTML = selectedProducts.map(p =>
                    `<div style=\"display: flex; align-items: center; padding: 6px 0;\">
                        <div style=\"flex:2; color: #222; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;\">
                            <span>${p.name}</span>
                            <span style=\"color:#888; margin:0 4px;\">×</span>
                            <span style=\"color: #007bff; \">${p.quantity}</span>
                        </div>
                        <div style=\"flex:1; text-align:right; color: #e53935; min-width: 120px;\">${formatCurrency(p.price * p.quantity)} VNĐ</div>
                    </div>`
                ).join('');
                if (selectedProducts.length === 0) {
                    selectedProductsList.innerHTML = '<em>Chưa chọn sản phẩm nào</em>';
                }
            }
        }

        selectAllCheckbox.addEventListener('change', function () {
            itemCheckboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
            updateTotals();
        });

        itemCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (!this.checked) {
                    selectAllCheckbox.checked = false;
                } else {
                    const allChecked = Array.from(itemCheckboxes).every(cb => cb.checked);
                    selectAllCheckbox.checked = allChecked;
                }
                updateTotals();
            });
        });

        // Initial calculation on page load
        updateTotals();
    });


    function deleteCartItem(button) {
        if (confirm("Bạn có chắc chắn muốn xoá sản phẩm này khỏi giỏ hàng không?")) {
            const form = document.getElementById('delete-cart-item-form');
            form.action = button.getAttribute('data-action');
            form.submit();
        }
    }

</script>
