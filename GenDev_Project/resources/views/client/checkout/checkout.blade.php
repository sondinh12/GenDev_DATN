@extends('client.layout.master')

@section('content')
    @if (session('error_order_coupon') || session('error_shipping_coupon'))
        <div class="alert alert-danger">
            {{ session('error_order_coupon') ?? session('error_shipping_coupon') }}
        </div>
    @endif

    @if (session('success_order_coupon') || session('success_shipping_coupon'))
        <div class="alert alert-success">
            {{ session('success_order_coupon') ?? session('success_shipping_coupon') }}
        </div>
    @endif
<div id="content" class="site-content">
    <div class="col-full">
        <div class="row">
            <nav class="woocommerce-breadcrumb custom-breadcrumb mb-4">
    <a href="/" class="breadcrumb-link"></i> Trang chủ</a>
    <span class="breadcrumb-separator">
        <i class="fa fa-angle-right"></i>
    </span>
    <a href="/cart" class="breadcrumb-link"></i> Giỏ hàng</a>
    <span class="breadcrumb-separator">
        <i class="fa fa-angle-right"></i>
    </span>
    <span class="breadcrumb-current"></i> Thanh toán</span>
</nav>
            <!-- .woocommerce-breadcrumb -->
            <div class="content-area" id="primary">
                <main class="site-main" id="main">
                    <div class="type-page hentry">
                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="woocommerce-info">Bạn có mã giảm giá không?
                                    <a data-toggle="collapse" href="#checkoutCouponForm" aria-expanded="false" aria-controls="checkoutCouponForm" class="showlogin">
                                        Nhấn vào đây để nhập mã
                                    </a>
                                </div>

                                <div class="collapse" id="checkoutCouponForm">
                                    <!-- Order Coupon Form -->
                                    @if(session('applied_order_coupon'))
                                        <p>Mã giảm giá đơn hàng đã được áp dụng: <strong>{{ session('applied_order_coupon.code') }}</strong> – giảm {{ number_format(session('applied_order_coupon.discount')) }}đ 
                                            <form method="post" action="{{ route('coupon.remove') }}" style="display:inline;">
                                                @csrf
                                                <input type="hidden" name="type" value="order">
                                                <button type="submit" class="text-danger" style="background:none;border:none;padding:0;">Xóa</button>
                                            </form>
                                            <span id="order-coupon-status" class="text-danger" style="display:none;"></span>
                                        </p>
                                    @else
                                        <form method="post" class="checkout_coupon" action="{{route('apply_coupon')}}">
                                            @csrf
                                            <div style="position: relative; margin-bottom: 15px;">
                                                <input type="text" id="coupon_code_order" placeholder="Nhập mã giảm giá đơn hàng" class="input-text" name="coupon_code" autocomplete="off" style="width:350px;" onfocus="document.getElementById('coupon-list-order').style.display='block'">
                                                <div id="coupon-list-order" style="display:none; position:absolute; background:#fff; border:1px solid #ccc; z-index:1000; width:350px;">
                                                    @foreach($coupons->where('type', 'order') as $coupon)
                                                        <div style="padding: 5px; cursor:pointer;" onclick="document.getElementById('coupon_code_order').value='{{ $coupon->coupon_code }}';document.getElementById('coupon-list-order').style.display='none'">
                                                            <b>{{ $coupon->coupon_code }}</b> - {{ $coupon->name }}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <input type="hidden" name="subtotal" value="{{$subtotal}}">
                                            <input type="hidden" name="coupon_type" value="order">
                                            <input type="hidden" name="shipping_fee" value="0">
                                            <p class="form-row form-row-last">
                                                <button type="submit" class="button">Áp dụng mã đơn hàng</button>
                                            </p>
                                            <div class="clear"></div>
                                        </form>
                                    @endif

                                    <!-- Shipping Coupon Form -->
                                    @if(session('applied_shipping_coupon'))
                                        <p>Mã giảm giá vận chuyển đã được áp dụng: <strong>{{ session('applied_shipping_coupon.code') }}</strong> – giảm {{ number_format(session('applied_shipping_coupon.discount')) }}đ 
                                            <form method="post" action="{{ route('coupon.remove') }}" style="display:inline;">
                                                @csrf
                                                <input type="hidden" name="type" value="shipping">
                                                <button type="submit" class="text-danger" style="background:none;border:none;padding:0;">Xóa</button>
                                            </form>
                                            <span id="shipping-coupon-status" class="text-danger" style="display:none;"></span>
                                        </p>
                                    @else
                                        <form method="post" class="checkout_coupon" action="{{route('apply_coupon')}}">
                                            @csrf
                                            <div style="position: relative; margin-bottom: 15px;">
                                                <input type="text" id="coupon_code_shipping" placeholder="Nhập mã giảm giá vận chuyển" class="input-text" name="coupon_code" autocomplete="off" style="width:350px;" onfocus="document.getElementById('coupon-list-shipping').style.display='block'">
                                                <div id="coupon-list-shipping" style="display:none; position:absolute; background:#fff; border:1px solid #ccc; z-index:1000; width:350px;">
                                                    @foreach($coupons->where('type', 'shipping') as $coupon)
                                                        <div style="padding: 5px; cursor:pointer;" onclick="document.getElementById('coupon_code_shipping').value='{{ $coupon->coupon_code }}';document.getElementById('coupon-list-shipping').style.display='none'">
                                                            <b>{{ $coupon->coupon_code }}</b> - {{ $coupon->name }}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <input type="hidden" name="subtotal" value="{{$subtotal}}">
                                            <input type="hidden" name="coupon_type" value="shipping">
                                            <input type="hidden" name="shipping_fee" value="0">
                                            <p class="form-row form-row-last">
                                                <button type="submit" class="button">Áp dụng mã vận chuyển</button>
                                            </p>
                                            <div class="clear"></div>
                                        </form>
                                    @endif

                                    <script>
                                        // Ẩn dropdown khi click ra ngoài
                                        document.addEventListener('click', function(e) {
                                            var couponInputOrder = document.getElementById('coupon_code_order');
                                            var couponListOrder = document.getElementById('coupon-list-order');
                                            var couponInputShipping = document.getElementById('coupon_code_shipping');
                                            var couponListShipping = document.getElementById('coupon-list-shipping');
                                            if (couponInputOrder && !couponInputOrder.contains(e.target) && couponListOrder && !couponListOrder.contains(e.target)) {
                                                couponListOrder.style.display = 'none';
                                            }
                                            if (couponInputShipping && !couponInputShipping.contains(e.target) && couponListShipping && !couponListShipping.contains(e.target)) {
                                                couponListShipping.style.display = 'none';
                                            }
                                        });
                                    </script>
                                </div>
                                <!-- .collapse -->
                                <form action="{{route('checkout.submit')}}" class="checkout woocommerce-checkout" method="post" name="checkout">
                                    @csrf
                                    @if(isset($reorder_mode) && $reorder_mode)
                                        <input type="hidden" name="reorder_mode" value="1">
                                        <input type="hidden" name="reorder_cart_items" value="{{ htmlentities(json_encode($cartItems)) }}">
                                    @endif
                                    <div id="customer_details" class="col2-set">
                                        <div class="col-1">
                                            <div class="woocommerce-billing-fields">
                                                <h3>Thông tin thanh toán</h3>
                                                <div class="woocommerce-billing-fields__field-wrapper-outer">
                                                    <div class="woocommerce-billing-fields__field-wrapper">
                                                        <p id="billing_first_name_field" class="form-row validate-required woocommerce-invalid woocommerce-invalid-required-field">
                                                            <label class="" for="billing_first_name">Họ và tên
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" value="{{$user->name}}" placeholder="" id="billing_first_name" name="name" class="input-text ">
                                                            @error('name')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </p>
                                                        <div class="clear"></div>                      
                                                        <p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required">
                                                            <label class="" for="billing_city">Thành phố
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" value="{{$user->city}}" placeholder="" id="billing_city" name="city" class="input-text ">
                                                            @error('city')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </p>
                                                        <p id="billing_state_field" class="form-row form-row-wide validate-required validate-email">
                                                            <label class="" for="billing_ward">Xã, Phường
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" value="{{$user->ward}}" placeholder="" id="billing_ward" name="ward" class="input-text ">
                                                            @error('ward')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </p>
                                                        <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                            <label class="" for="billing_address_1">Địa chỉ cụ thể
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" value="{{$user->address}}" placeholder="Address" id="billing_address_1" name="address" class="input-text ">
                                                            @error('address')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </p>
                                                        <p id="billing_postcode_field" class="form-row form-row-wide address-field validate-postcode validate-required" data-o_class="form-row form-row form-row-last address-field validate-required validate-postcode">
                                                            <label class="" for="billing_postcode">Mã bưu điện
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" value="{{$user->postcode}}" placeholder="" id="billing_postcode" name="postcode" class="input-text ">
                                                            @error('postcode')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </p>
                                                        <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                            <label class="" for="billing_phone">Số điện thoại
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="tel" value="{{$user->phone}}" placeholder="" id="phone" name="phone" class="input-text ">
                                                            @error('phone')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </p>
                                                        <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                            <label class="" for="billing_email">Email
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="email" value="{{$user->email}}" placeholder="" id="email" name="email" class="input-text ">
                                                            @error('email')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </p>
                                                        <p id="billing_note_field" class="form-row form-row-wide address-field validate-postcode validate-required" data-o_class="form-row form-row form-row-last address-field">
                                                            <label class="" for="billing_note">Ghi chú</label>
                                                            <textarea name="note" placeholder="Nhập ghi chú của bạn" rows="4" cols="50"></textarea>
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- .woocommerce-billing-fields__field-wrapper-outer -->
                                            </div>
                                            <!-- .woocommerce-billing-fields -->
                                            <div class="woocommerce-account-fields">
                                                <p class="form-row form-row-wide woocommerce-validated"></p>
                                                    <label class="collapsed woocommerce-form__label woocommerce-form__label-for-checkbox checkbox" data-toggle="collapse" data-target="#createLogin" aria-controls="createLogin">
                                                        <input type="checkbox" value="1" name="createaccount" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox">
                                                        <span>Tạo tài khoản mới?</span>
                                                    </label>
                                                </p>
                                                <div class="create-account collapse" id="createLogin">
                                                    <p data-priority="" id="account_password_field" class="form-row validate-required woocommerce-invalid woocommerce-invalid-required-field">
                                                        <label class="" for="account_password">Mật khẩu tài khoản
                                                            <abbr title="required" class="required">*</abbr>
                                                        </label>
                                                        <input type="password" value="" placeholder="Password" id="account_password" name="account_password" class="input-text ">
                                                    </p>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            <!-- .woocommerce-account-fields -->
                                        </div>
                                        <!-- .col-1 -->
                                        <div class="col-2">
                                            <div class="woocommerce-shipping-fields">
                                                <h3 id="ship-to-different-address">
                                                    <label class="collapsed woocommerce-form__label woocommerce-form__label-for-checkbox checkbox" data-toggle="collapse" data-target="#shipping-address" aria-controls="shipping-address">
                                                        <input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" type="checkbox" value="1" name="ship_to_different_address">
                                                        <span>Giao hàng tới địa chỉ khác?</span>
                                                    </label>
                                                </h3>
                                                <div class="shipping_address collapse" id="shipping-address">
                                                    <div class="woocommerce-shipping-fields__field-wrapper">
                                                        <p id="shipping_first_name_field" class="form-row form-row-first validate-required">
                                                            <label class="" for="shipping_first_name">Họ
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" autofocus="autofocus" autocomplete="given-name" value="" placeholder="" id="shipping_first_name" name="shipping_first_name" class="input-text ">
                                                        </p>
                                                        <p id="shipping_last_name_field" class="form-row form-row-last validate-required">
                                                            <label class="" for="shipping_last_name">Tên
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" autocomplete="family-name" value="" placeholder="" id="shipping_last_name" name="shipping_last_name" class="input-text ">
                                                        </p>
                                                        <p id="shipping_company_field" class="form-row form-row-wide">
                                                            <label class="" for="shipping_company">Tên công ty</label>
                                                            <input type="text" autocomplete="organization" value="" placeholder="" id="shipping_company" name="shipping_company" class="input-text ">
                                                        </p>
                                                        <p id="shipping_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                                                            <label class="" for="shipping_country">Quốc gia
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <select autocomplete="country" class="country_to_state country_select select2-hidden-accessible" id="shipping_country" name="shipping_country" tabindex="-1" aria-hidden="true">
                                                                <option value="">Chọn quốc gia...</option>                                                              
                                                                <option value="VN">Vietnam</option>
                                                                <option value="WF">Wallis and Futuna</option>
                                                                <option value="EH">Western Sahara</option>
                                                                <option value="YE">Yemen</option>
                                                                <option value="ZM">Zambia</option>
                                                                <option value="ZW">Zimbabwe</option>
                                                            </select>
                                                        </p>
                                                        <p id="shipping_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                            <label class="" for="shipping_address_1">Địa chỉ
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" autocomplete="address-line1" value="" placeholder="Số nhà và tên đường" id="shipping_address_1" name="shipping_address_1" class="input-text ">
                                                        </p>
                                                        <p id="shipping_address_2_field" class="form-row form-row-wide address-field">
                                                            <input type="text" autocomplete="address-line2" value="" placeholder="Căn hộ, phòng, đơn vị... (không bắt buộc)" id="shipping_address_2" name="shipping_address_2" class="input-text ">
                                                        </p>
                                                        <p id="shipping_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                                                            <label class="" for="shipping_city">Thành phố
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" autocomplete="address-level2" value="" placeholder="" id="shipping_city" name="shipping_city" class="input-text ">
                                                        </p>
                                                        <p id="shipping_state_field" class="form-row form-row-wide address-field validate-state woocommerce-invalid woocommerce-invalid-required-field validate-required" data-o_class="form-row form-row-wide address-field validate-required validate-state woocommerce-invalid woocommerce-invalid-required-field">
                                                            <label class="" for="shipping_state">Tỉnh / Huyện
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <select data-placeholder="" autocomplete="address-level1" class="state_select select2-hidden-accessible" id="shipping_state" name="shipping_state" tabindex="-1" aria-hidden="true">
                                                                <option value="">Chọn...</option>
                                                                <option value="AP">Andhra Pradesh</option>                                                             
                                                                <option value="DL">Delhi</option>
                                                                <option value="LD">Lakshadeep</option>
                                                                <option value="PY">Pondicherry (Puducherry)</option>
                                                            </select>
                                                        </p>
                                                        <p data-priority="90" id="shipping_postcode_field" class="form-row form-row-wide address-field validate-postcode validate-required" data-o_class="form-row form-row-wide address-field validate-required validate-postcode">
                                                            <label class="" for="shipping_postcode">Mã bưu điện
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" autocomplete="postal-code" value="" placeholder="" id="shipping_postcode" name="shipping_postcode" class="input-text ">
                                                        </p>
                                                    </div>
                                                    <!-- .woocommerce-shipping-fields__field-wrapper -->
                                                </div>
                                                <!-- .shipping_address -->
                                            </div>
                                            <!-- .woocommerce-shipping-fields -->
                                            <div class="woocommerce-additional-fields">
                                                <div class="woocommerce-additional-fields__field-wrapper">
                                                    <p id="order_comments_field" class="form-row notes">
                                                        <label class="" for="order_comments">Ghi chú về đơn hàng</label>
                                                        <textarea cols="5" rows="2" placeholder="Ghi chú về đơn hàng, ví dụ: lưu ý giao hàng." id="order_comments" class="input-text " name="order_comments"></textarea>
                                                    </p>
                                                </div>
                                                <!-- .woocommerce-additional-fields__field-wrapper-->
                                            </div>
                                            <!-- .woocommerce-additional-fields -->
                                        </div>
                                        <!-- .col-2 -->
                                    </div>
                                    <!-- .col2-set -->
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
                                                            if ($item->variant) {
                                                                $price = $item->variant->sale_price && $item->variant->sale_price > 0
                                                                    ? $item->variant->sale_price
                                                                    : $item->variant->price;
                                                            } else {
                                                                $price = $item->product->sale_price && $item->product->sale_price > 0
                                                                    ? $item->product->sale_price
                                                                    : $item->product->price;
                                                            }
                                                        @endphp
                                                        {{-- @php
                                                            if (!empty($item['variant']) && $item['variant']['sale_price'] > 0) {
                                                                $price = $item['variant']['sale_price'];
                                                            } elseif (!empty($item['variant'])) {
                                                                $price = $item['variant']['price'];
                                                            } elseif (!empty($item['product']['sale_price']) && $item['product']['sale_price'] > 0) {
                                                                $price = $item['product']['sale_price'];
                                                            } else {
                                                                $price = $item['product']['price'];
                                                            }
                                                        @endphp --}}
                                                        <tr>
                                                            <td colspan="2">
                                                                <div class="d-flex justify-content-between align-items-start">
                                                                    <div>
                                                                        <div class="fw-bold">{{ $item['product']['name'] }}</div>
                                                                        <div class="text-muted small">Số lượng: {{ $item['quantity'] }}</div>
                                                                        <div class="text-muted small">Giá: {{ number_format($price) }} VNĐ</div>
                                                                        @if ($item->variant && $item->variant->variantAttributes)

                                                                            <div class="text-muted small">
                                                                                @foreach ($item['variant']['variantAttributes'] as $att)
                                                                                    <div>{{ $att['attribute']['name'] ?? '' }}: {{ $att['value']['value'] ?? '' }}</div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endif
                                                                    </div>

                                                                    <div class="fw-bold text-end">{{ number_format($price * $item['quantity']) }} VNĐ</div>
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
                                                            <span id="shipping-fee" data-value="0">{{ number_format(0) }} VNĐ</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="discount-row">
                                                        <th>Giảm giá</th>
                                                        <td>
                                                            <span id="discount-amount"
                                                                data-value="{{ (session('applied_order_coupon.discount') ?? 0) + (session('applied_shipping_coupon.discount') ?? 0) }}">
                                                                {{ number_format((session('applied_order_coupon.discount') ?? 0) + (session('applied_shipping_coupon.discount') ?? 0)) }} VNĐ
                                                            </span>
                                                        </td>
                                                    </tr>

                                                    <tr class="order-total">
                                                        <th>Tổng cộng</th>
                                                        <td>
                                                            <strong>
                                                                <span id="total-amount">{{ number_format($subtotal) }} VNĐ</span>
                                                            </strong>
                                                        </td>
                                                    </tr>
                                                     {{-- <tr class="order-total">
                                                        <th>Total</th>
                                                        <td>
                                                            <strong>
                                                                <span id="total-amount">{{ number_format($subtotal) }} VNĐ</span>
                                                            </strong>
                                                        </td>
                                                    </tr> --}}
                                                </tfoot>
                                            </table>
                                            <!-- /.woocommerce-checkout-review-order-table -->
                                            <div class="woocommerce-checkout-payment" id="payment">
                                                <ul class="wc_payment_methods payment_methods methods">
                                                    <li class="wc_payment_method payment_method_cod">
                                                        <input type="radio" data-order_button_text="" id="payment_method_cod" value="cod" name="payment_method" class="input-radio">
                                                        <label for="payment_method_cod">Thanh toán khi nhận hàng</label>
                                                    </li>
                                                    <li class="wc_payment_method payment_method_bank">
                                                        <input type="radio" data-order_button_text="" id="payment_method_bank" checked="checked" value="banking" name="payment_method" class="input-radio">
                                                        <label for="payment_method_bank">Chuyển khoản ngân hàng</label>
                                                    </li>
                                                </ul>
                                                @foreach($ships as $ship)
                                                    <label>
                                                        <input type="radio" name="ship_id" value="{{ $ship->id }}" class="ship-option" data-price="{{ $ship->shipping_price }}">
                                                        {{ $ship->name }} - {{ number_format($ship->shipping_price) }} VNĐ
                                                    </label><br>
                                                @endforeach
                                                <div class="form-row place-order">
                                                    <p class="form-row terms wc-terms-and-conditions woocommerce-validated">
                                                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                                            <input type="checkbox" id="terms" name="terms" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox">
                                                            <span>Tôi đã đọc và đồng ý với các điều khoản & điều kiện</span>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input type="hidden" value="1" name="terms-field">
                                                    </p>
                                                    <button type="submit" class="button wc-forward text-center">Đặt hàng</button>
                                                </div>
                                            </div>
                                            <!-- /.woocommerce-checkout-payment -->
                                        </div>
                                        <!-- /.order-review-wrapper -->
                                    </div>
                                    <!-- .woocommerce-checkout-review-order -->
                                </form>
                                <!-- .woocommerce-checkout -->
                            </div>
                            <!-- .woocommerce -->
                        </div>
                        <!-- .entry-content -->
                    </div>
                    <!-- #post-## -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const subtotal = parseInt(document.getElementById('subtotal').dataset.value);
    let shipping = parseInt(document.querySelector('.ship-option:checked').dataset.price) || 0;
    let discount = parseInt(document.getElementById('discount-amount').dataset.value) || 0;

    const totalEl = document.getElementById('total-amount');
    const shippingEl = document.getElementById('shipping-fee');
    const discountEl = document.getElementById('discount-amount');
    const orderCouponStatus = document.getElementById('order-coupon-status');
    const shippingCouponStatus = document.getElementById('shipping-coupon-status');

    function formatVND(number) {
        return new Intl.NumberFormat('vi-VN').format(number) + ' VNĐ';
    }

    function updateTotal() {
        const total = Math.max(subtotal + shipping - discount, 0);  
        totalEl.textContent = formatVND(total);
        shippingEl.textContent = formatVND(shipping);
        discountEl.textContent = formatVND(discount);
    }

    // Kiểm tra mã giảm giá hợp lệ
    function checkCouponValidity() {
        @if(session('applied_order_coupon'))
            const orderCoupon = {
                code: '{{ session('applied_order_coupon.code') }}',
                min_coupon: {{ session('applied_order_coupon.min_coupon') ?? 0 }},
                max_coupon: {{ session('applied_order_coupon.max_coupon') ?? 'Infinity' }},
                discount: {{ session('applied_order_coupon.discount') ?? 0 }}
            };
            if (subtotal < orderCoupon.min_coupon || (orderCoupon.max_coupon !== 'Infinity' && subtotal > orderCoupon.max_coupon)) {
                orderCouponStatus.textContent = `Mã ${orderCoupon.code} không hợp lệ do tổng đơn hàng không đáp ứng điều kiện (Min: ${formatVND(orderCoupon.min_coupon)}, Max: ${formatVND(orderCoupon.max_coupon)}).`;
                orderCouponStatus.style.display = 'inline';
                fetch('{{ route('coupon.remove') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: 'type=order'
                }).then(() => {
                    discount -= orderCoupon.discount;
                    updateTotal();
                });
            }
        @endif

        @if(session('applied_shipping_coupon'))
            const shippingCoupon = {
                code: '{{ session('applied_shipping_coupon.code') }}',
                min_coupon: {{ session('applied_shipping_coupon.min_coupon') ?? 0 }},
                max_coupon: {{ session('applied_shipping_coupon.max_coupon') ?? 'Infinity' }},
                discount: {{ session('applied_shipping_coupon.discount') ?? 0 }}
            };
            if (shipping < shippingCoupon.min_coupon || (shippingCoupon.max_coupon !== 'Infinity' && shipping > shippingCoupon.max_coupon)) {
                shippingCouponStatus.textContent = `Mã ${shippingCoupon.code} không hợp lệ do phí vận chuyển không đáp ứng điều kiện (Min: ${formatVND(shippingCoupon.min_coupon)}, Max: ${formatVND(shippingCoupon.max_coupon)}).`;
                shippingCouponStatus.style.display = 'inline';
                fetch('{{ route('coupon.remove') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: 'type=shipping'
                }).then(() => {
                    discount -= shippingCoupon.discount;
                    updateTotal();
                });
            }
        @endif
    }

    document.querySelectorAll('.ship-option').forEach(function (radio) {
        radio.addEventListener('change', function () {
            shipping = parseInt(this.dataset.price) || 0;
            document.querySelectorAll('input[name="shipping_fee"]').forEach(function(input) {
                input.value = shipping;
            });
            updateTotal();
            checkCouponValidity(); // Kiểm tra lại mã khi thay đổi phí vận chuyển
        });
    });

    updateTotal();
    checkCouponValidity(); // Kiểm tra mã giảm giá khi tải trang
});
</script>

@endsection