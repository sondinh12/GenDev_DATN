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
                    Thanh toán
                </nav>
                <div class="content-area" id="primary">
                    <main class="site-main" id="main">
                        <div class="type-page hentry">
                            <div class="entry-content">
                                <div class="woocommerce">
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if (session('error_order_coupon'))
                                        <div class="alert alert-danger">
                                            {{ session('error_order_coupon') }}
                                        </div>
                                    @endif
                                    @if (session('success_order_coupon'))
                                        <div class="alert alert-success">
                                            {{ session('success_order_coupon') }}
                                        </div>
                                    @endif
                                    @if (session('error_shipping_coupon'))
                                        <div class="alert alert-danger">
                                            {{ session('error_shipping_coupon') }}
                                        </div>
                                    @endif
                                    @if (session('success_shipping_coupon'))
                                        <div class="alert alert-success">
                                            {{ session('success_shipping_coupon') }}
                                        </div>
                                    @endif
                                    <div class="woocommerce-info">
                                        Bạn có mã giảm giá không?
                                        <a data-toggle="collapse" href="#checkoutCouponForm" aria-expanded="false" aria-controls="checkoutCouponForm" class="showlogin">
                                            Nhấn vào đây để nhập mã
                                        </a>
                                    </div>

                                    <div class="collapse" id="checkoutCouponForm">
                                        @if(session('applied_order_coupon'))
                                            <p>Mã giảm giá đơn hàng: <strong>{{ session('applied_order_coupon.code') }}</strong> – giảm {{ number_format(session('applied_order_coupon.discount')) }}đ
                                            <form method="POST" action="{{ route('coupon.remove') }}" style="display:inline;">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="type" value="order">
                                                <button type="submit" class="button">Xóa</button>
                                            </form></p>
                                        @endif
                                        @if(session('applied_shipping_coupon'))
                                            <p>Mã giảm giá phí ship: <strong>{{ session('applied_shipping_coupon.code') }}</strong> – giảm {{ number_format(session('applied_shipping_coupon.discount')) }}đ
                                            <form method="POST" action="{{ route('coupon.remove') }}" style="display:inline;">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="type" value="shipping">
                                                <button type="submit" class="button">Xóa</button>
                                            </form></p>
                                        @endif

                                        <form method="POST" class="checkout_coupon" action="{{ route('apply_coupon') }}">
                                            @csrf
                                            <div style="margin-bottom: 10px;">
                                                <label for="order_coupon_code">Mã giảm giá đơn hàng:</label>
                                                <div style="position: relative; display: inline-block;">
                                                    <select id="order_coupon_code" name="coupon_code" class="input-text" style="width:350px;">
                                                        <!-- <option value="">Chọn mã giảm giá đơn hàng</option> -->
                                                        @foreach($coupons as $coupon)
                                                            @if($coupon->type == 'order')
                                                                <option value="{{ $coupon->coupon_code }}" {{ session('applied_order_coupon.code') == $coupon->coupon_code ? 'selected' : '' }}>
                                                                    {{ $coupon->coupon_code }} - {{ $coupon->name }} (Đơn hàng)
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" name="type" value="order">
                                                </div>
                                                <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                                                <button type="submit" class="button">Áp dụng</button>
                                            </div>
                                        </form>

                                        <form method="POST" class="checkout_coupon" action="{{ route('apply_coupon') }}">
                                            @csrf
                                            <div>
                                                <label for="shipping_coupon_code">Mã giảm giá phí ship:</label>
                                                <div style="position: relative; display: inline-block;">
                                                    <select id="shipping_coupon_code" name="coupon_code" class="input-text" style="width:350px;">
                                                        <!-- <option value="">Chọn mã giảm giá phí ship</option> -->
                                                        @foreach($coupons as $coupon)
                                                            @if($coupon->type == 'shipping')
                                                                <option value="{{ $coupon->shipping_code }}" {{ session('applied_shipping_coupon.code') == $coupon->shipping_code ? 'selected' : '' }}>
                                                                    {{ $coupon->shipping_code }} - {{ $coupon->name }} (Phí ship)
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" name="type" value="shipping">
                                                </div>
                                                <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                                                <input type="hidden" name="shipping_fee" id="shipping_fee_input" value="{{ $ships->first()->shipping_price ?? 0 }}">
                                                <button type="submit" class="button">Áp dụng</button>
                                            </div>
                                        </form>
                                    </div>

                                    <form action="{{ route('checkout.submit') }}" class="checkout woocommerce-checkout" method="POST" name="checkout">
                                        @csrf
                                        <div id="customer_details" class="col2-set">
                                            <div class="col-1">
                                                <div class="woocommerce-billing-fields">
                                                    <h3>Thông tin thanh toán</h3>
                                                    <div class="woocommerce-billing-fields__field-wrapper">
                                                        <p id="billing_first_name_field" class="form-row validate-required">
                                                            <label for="billing_first_name">Họ và tên <span class="required">*</span></label>
                                                            <input type="text" value="{{ old('name', $user->name) }}" placeholder="Họ và tên" id="billing_first_name" name="name" class="input-text" required>
                                                            @error('name')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </p>

                                                        <p id="billing_city_field" class="form-row form-row-wide address-field validate-required">
                                                            <label for="billing_city">Thành phố <span class="required">*</span></label>
                                                            <input type="text" value="{{ old('city', $user->city) }}" placeholder="Thành phố" id="billing_city" name="city" class="input-text" required>
                                                            @error('city')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </p>

                                                        <p id="billing_state_field" class="form-row form-row-wide validate-required">
                                                            <label for="billing_ward">Xã, Phường <span class="required">*</span></label>
                                                            <input type="text" value="{{ old('ward', $user->ward) }}" placeholder="Xã, Phường" id="billing_ward" name="ward" class="input-text" required>
                                                            @error('ward')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </p>

                                                        <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                            <label for="billing_address_1">Địa chỉ cụ thể <span class="required">*</span></label>
                                                            <input type="text" value="{{ old('address', $user->address) }}" placeholder="Địa chỉ" id="billing_address_1" name="address" class="input-text" required>
                                                            @error('address')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </p>



                                                        <p id="billing_phone_field" class="form-row form-row-wide validate-required validate-phone">
                                                            <label for="billing_phone">Số điện thoại <span class="required">*</span></label>
                                                            <input type="tel" value="{{ old('phone', $user->phone) }}" placeholder="Số điện thoại" id="billing_phone" name="phone" class="input-text" required>
                                                            @error('phone')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </p>

                                                        <p id="billing_email_field" class="form-row form-row-wide validate-required validate-email">
                                                            <label for="billing_email">Email <span class="required">*</span></label>
                                                            <input type="email" value="{{ old('email', $user->email) }}" placeholder="Email" id="billing_email" name="email" class="input-text" required>
                                                            @error('email')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </p>

                                                        <p id="billing_note_field" class="form-row form-row-wide">
                                                            <label for="billing_note">Ghi chú</label>
                                                            <textarea name="note" placeholder="Nhập ghi chú của bạn" rows="4" cols="50">{{ old('note') }}</textarea>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="woocommerce-account-fields">


                                                    <div class="create-account collapse" id="createLogin">
                                                        <p id="account_password_field" class="form-row validate-required">
                                                            <label for="account_password">Mật khẩu tài khoản <span class="required">*</span></label>
                                                            <input type="password" placeholder="Mật khẩu" id="account_password" name="account_password" class="input-text">
                                                            @error('account_password')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-2">
                                                <div class="woocommerce-shipping-fields">
                                                 

                                                    <div class="shipping_address collapse" id="shipping-address">
                                                        <div class="woocommerce-shipping-fields__field-wrapper">
                                                            <p id="shipping_first_name_field" class="form-row form-row-first validate-required">
                                                                <label for="shipping_first_name">Họ <span class="required">*</span></label>
                                                                <input type="text" value="{{ old('shipping_first_name') }}" placeholder="Họ" id="shipping_first_name" name="shipping_first_name" class="input-text">
                                                            </p>

                                                            <p id="shipping_last_name_field" class="form-row form-row-last validate-required">
                                                                <label for="shipping_last_name">Tên <span class="required">*</span></label>
                                                                <input type="text" value="{{ old('shipping_last_name') }}" placeholder="Tên" id="shipping_last_name" name="shipping_last_name" class="input-text">
                                                            </p>

                                                            <p id="shipping_company_field" class="form-row form-row-wide">
                                                                <label for="shipping_company">Tên công ty</label>
                                                                <input type="text" value="{{ old('shipping_company') }}" placeholder="Tên công ty" id="shipping_company" name="shipping_company" class="input-text">
                                                            </p>

                                                            <p id="shipping_country_field" class="form-row form-row-wide validate-required">
                                                                <label for="shipping_country">Quốc gia <span class="required">*</span></label>
                                                                <select id="shipping_country" name="shipping_country" class="country_to_state country_select">
                                                                    <option value="">Chọn quốc gia...</option>
                                                                    <option value="VN" {{ old('shipping_country') == 'VN' ? 'selected' : '' }}>Vietnam</option>
                                                                </select>
                                                            </p>

                                                            <p id="shipping_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                                <label for="shipping_address_1">Địa chỉ <span class="required">*</span></label>
                                                                <input type="text" value="{{ old('shipping_address_1') }}" placeholder="Số nhà và tên đường" id="shipping_address_1" name="shipping_address_1" class="input-text">
                                                            </p>

                                                            <p id="shipping_address_2_field" class="form-row form-row-wide address-field">
                                                                <label for="shipping_address_2">Địa chỉ 2</label>
                                                                <input type="text" value="{{ old('shipping_address_2') }}" placeholder="Căn hộ, phòng, đơn vị..." id="shipping_address_2" name="shipping_address_2" class="input-text">
                                                            </p>

                                                            <p id="shipping_city_field" class="form-row form-row-wide address-field validate-required">
                                                                <label for="shipping_city">Thành phố <span class="required">*</span></label>
                                                                <input type="text" value="{{ old('shipping_city') }}" placeholder="Thành phố" id="shipping_city" name="shipping_city" class="input-text">
                                                            </p>

                                                            <p id="shipping_state_field" class="form-row form-row-wide address-field validate-required">
                                                                <label for="shipping_state">Tỉnh / Huyện <span class="required">*</span></label>
                                                                <input type="text" value="{{ old('shipping_state') }}" placeholder="Tỉnh / Huyện" id="shipping_state" name="shipping_state" class="input-text">
                                                            </p>

                                                           
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="woocommerce-additional-fields">
                                                    <div class="woocommerce-additional-fields__field-wrapper">
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="woocommerce-checkout-review-order" id="order_review">
                                            <div class="order-review-wrapper">
                                                <h3 class="order_review_heading">Đơn hàng của bạn</h3>
                                                <table class="shop_table woocommerce-checkout-review-order-table">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-name">Sản phẩm</th>
                                                            <th class="product-total">Thành tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($selectedItemIds as $id)
                                                            <input type="hidden" name="selected_items[]" value="{{ $id }}">
                                                        @endforeach

                                                        @foreach ($cartItems as $item)
                                                            @php
                                                                $price = $item->variant
                                                                    ? ($item->variant->sale_price && $item->variant->sale_price > 0 ? $item->variant->sale_price : $item->variant->price)
                                                                    : ($item->product->sale_price && $item->product->sale_price > 0 ? $item->product->sale_price : $item->product->price);
                                                            @endphp
                                                            <tr>
                                                                <td colspan="2">
                                                                    <div class="d-flex justify-content-between align-items-start">
                                                                        <div>
                                                                            <div class="fw-bold">{{ $item->product->name }}</div>
                                                                            <div class="text-muted small">Số lượng: {{ $item->quantity }}</div>
                                                                            <div class="text-muted small">Giá: {{ number_format($price) }} VNĐ</div>
                                                                            @if ($item->variant && $item->variant->variantAttributes)
                                                                                <div class="text-muted small">
                                                                                    @foreach ($item->variant->variantAttributes as $att)
                                                                                        <div>{{ $att->attribute->name ?? '' }}: {{ $att->value->value ?? '' }}</div>
                                                                                    @endforeach
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="fw-bold text-end">{{ number_format($price * $item->quantity) }} VNĐ</div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr class="cart-subtotal">
                                                            <th>Tạm tính</th>
                                                            <td>
                                                                <span id="subtotal" data-value="{{ $subtotal }}">{{ number_format($subtotal) }} VNĐ</span>
                                                            </td>
                                                        </tr>
                                                        <tr class="shipping-fee">
                                                            <th>Phí vận chuyển</th>
                                                            <td>
                                                                <span id="shipping-fee" data-value="{{ $ships->first()->shipping_price ?? 0 }}">{{ number_format($ships->first()->shipping_price ?? 0) }} VNĐ</span>
                                                            </td>
                                                        </tr>
                                                        @if(session('applied_order_coupon'))
                                                            <tr class="discount-row order-discount">
                                                                <th>Giảm giá đơn hàng</th>
                                                                <td>
                                                                    <span id="order-discount" data-value="{{ session('applied_order_coupon.discount') }}">{{ number_format(session('applied_order_coupon.discount')) }} VNĐ</span>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @if(session('applied_shipping_coupon'))
                                                            <tr class="discount-row shipping-discount">
                                                                <th>Giảm giá phí ship</th>
                                                                <td>
                                                                    <span id="shipping-discount" data-value="{{ session('applied_shipping_coupon.discount') }}">{{ number_format(session('applied_shipping_coupon.discount')) }} VNĐ</span>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        <tr class="order-total">
                                                            <th>Tổng cộng</th>
                                                            <td>
                                                                <strong>
                                                                    <span id="total-amount" data-value="{{ $subtotal + ($ships->first()->shipping_price ?? 0) - (session('applied_order_coupon.discount') ?? 0) - (session('applied_shipping_coupon.discount') ?? 0) }}">{{ number_format($subtotal + ($ships->first()->shipping_price ?? 0) - (session('applied_order_coupon.discount') ?? 0) - (session('applied_shipping_coupon.discount') ?? 0)) }} VNĐ</span>
                                                                </strong>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <div class="woocommerce-checkout-payment" id="payment">
                                                    <ul class="wc_payment_methods payment_methods methods">
                                                        <li class="wc_payment_method payment_method_cod">
                                                            <input type="radio" id="payment_method_cod" value="cod" name="payment_method" class="input-radio">
                                                            <label for="payment_method_cod">Thanh toán khi nhận hàng</label>
                                                        </li>
                                                        <li class="wc_payment_method payment_method_bank">
                                                            <input type="radio" id="payment_method_bank" value="banking" name="payment_method" class="input-radio" checked>
                                                            <label for="payment_method_bank">Chuyển khoản ngân hàng</label>
                                                        </li>
                                                    </ul>

                                                    @foreach($ships as $ship)
                                                        <label>
                                                            <input type="radio" name="ship_id" value="{{ $ship->id }}" class="ship-option" data-price="{{ $ship->shipping_price }}" {{ $loop->first ? 'checked' : '' }}>
                                                            {{ $ship->name }} - {{ number_format($ship->shipping_price) }} VNĐ
                                                        </label><br>
                                                    @endforeach

                                                    <div class="form-row place-order">
                                                        <p class="form-row terms wc-terms-and-conditions">
                                                            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                                                <input type="checkbox" id="terms" name="terms" class="woocommerce-form__input woocommerce-form__input-checkbox" required>
                                                                <span>Tôi đã đọc và đồng ý với các điều khoản & điều kiện</span>
                                                                <span class="required">*</span>
                                                            </label>
                                                            <input type="hidden" value="1" name="terms-field">
                                                        </p>
                                                        <button type="submit" class="button wc-forward text-center">Đặt hàng</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const subtotal = parseInt(document.getElementById('subtotal').dataset.value);
        let shipping = parseInt(document.querySelector('.ship-option:checked').dataset.price) || 0;
        let orderDiscount = parseInt(document.getElementById('order-discount')?.dataset.value || 0);
        let shippingDiscount = parseInt(document.getElementById('shipping-discount')?.dataset.value || 0);

        const totalEl = document.getElementById('total-amount');
        const shippingEl = document.getElementById('shipping-fee');
        const orderDiscountEl = document.getElementById('order-discount');
        const shippingDiscountEl = document.getElementById('shipping-discount');
        const shippingFeeInput = document.getElementById('shipping_fee_input');

        function formatVND(number) {
            return new Intl.NumberFormat('vi-VN').format(number) + ' VNĐ';
        }

        function updateTotal() {
            const finalShipping = Math.max(shipping - shippingDiscount, 0);
            const total = Math.max(subtotal + finalShipping - orderDiscount, 0);
            totalEl.textContent = formatVND(total);
            totalEl.dataset.value = total;
            shippingEl.textContent = formatVND(finalShipping);
            shippingEl.dataset.value = finalShipping;
            if (orderDiscountEl) {
                orderDiscountEl.textContent = formatVND(orderDiscount);
            }
            if (shippingDiscountEl) {
                shippingDiscountEl.textContent = formatVND(shippingDiscount);
            }
        }

        document.querySelectorAll('.ship-option').forEach(function (radio) {
            radio.addEventListener('change', function () {
                shipping = parseInt(this.dataset.price) || 0;
                shippingFeeInput.value = shipping;
                updateTotal();
            });
        });

        updateTotal();
    });
    </script>
@endsection