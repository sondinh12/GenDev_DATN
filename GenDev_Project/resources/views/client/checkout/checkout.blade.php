@extends('client.layout.master')

@section('content')
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
<div id="content" class="site-content">
    <div class="col-full">
        <div class="row">
            <nav class="woocommerce-breadcrumb">
                <a href="/">Trang chủ</a>
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span>
                Thanh toán
            </nav>
            <!-- .woocommerce-breadcrumb -->
            <div class="content-area" id="primary">
                <main class="site-main" id="main">
                    <div class="type-page hentry">
                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="woocommerce-info">Bạn đã có tài khoản? <a data-toggle="collapse" href="#login-form" aria-expanded="false" aria-controls="login-form" class="showlogin">Nhấn vào đây để đăng nhập</a></div>
                                <div class="collapse" id="login-form">
                                    {{-- <form method="post" class="woocomerce-form woocommerce-form-login login">
                                        <p class="before-login-text">
                                            Vestibulum lacus magna, faucibus vitae dui eget, aliquam fringilla. In et commodo elit. Class aptent taciti sociosqu ad litora.
                                        </p>
                                        <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                        <p class="form-row form-row-first">
                                            <label for="username">Username or email
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" id="username" name="username" class="input-text">
                                        </p>
                                        <p class="form-row form-row-last">
                                            <label for="password">Password
                                                <span class="required">*</span>
                                            </label>
                                            <input type="password" id="password" name="password" class="input-text">
                                        </p>
                                        <div class="clear"></div>
                                        <p class="form-row">
                                            <input type="submit" value="Login" name="login" class="button">
                                            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                                                <input type="checkbox" value="forever" id="rememberme" name="rememberme" class="woocommerce-form__input woocommerce-form__input-checkbox">
                                                <span>Remember me</span>
                                            </label>
                                        </p>
                                        <p class="lost_password">
                                            <a href="#">Lost your password?</a>
                                        </p>
                                        <div class="clear"></div>
                                    </form> --}}
                                </div>
                                <!-- .collapse -->
                                <div class="woocommerce-info">Bạn có mã giảm giá không?
                                    <a data-toggle="collapse" href="#checkoutCouponForm" aria-expanded="false" aria-controls="checkoutCouponForm" class="showlogin">
                                        Nhấn vào đây để nhập mã
                                    </a>
                                </div>

                                {{-- coupon đổi thành select --}}
                                <div class="collapse" id="checkoutCouponForm">
                                        @if(session('applied_coupon'))
                                            <p>Mã đã được áp dụng: <strong>{{ session('applied_coupon.code') }}</strong> – giảm {{ number_format(session('applied_coupon.discount')) }}đ</p>
                                        @else
                                            {{-- coupon --}}
                                            <form method="post" class="checkout_coupon" action="{{route('apply_coupon')}}">
                                                @csrf
                                                <div style="position: relative;">
                                                    <input type="text" id="coupon_code" placeholder="Nhập mã giảm giá" class="input-text" name="coupon_code" autocomplete="off" style="width:350px;" onfocus="document.getElementById('coupon-list').style.display='block'">
                                                    <div id="coupon-list" style="display:none; position:absolute; background:#fff; border:1px solid #ccc; z-index:1000; width:350px;">
                                                        @foreach($coupons as $coupon)
                                                            <div style="padding: 5px; cursor:pointer;" onclick="document.getElementById('coupon_code').value='{{ $coupon->coupon_code }}';document.getElementById('coupon-list').style.display='none'">
                                                                <b>{{ $coupon->coupon_code }}</b> - {{ $coupon->name }}
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <script>
                                                    // Ẩn dropdown khi click ra ngoài
                                                    document.addEventListener('click', function(e) {
                                                        var couponInput = document.getElementById('coupon_code');
                                                        var couponList = document.getElementById('coupon-list');
                                                        if (!couponInput.contains(e.target) && !couponList.contains(e.target)) {
                                                            couponList.style.display = 'none';
                                                        }
                                                    });
                                                </script>
                                                <input type="hidden" name="subtotal" value="{{$subtotal}}">
                                                <p class="form-row form-row-last">
                                                    <button type="submit" class="button">Áp dụng</button>
                                                </p>
                                                <div class="clear"></div>
                                            </form>
                                        @endif

                                    @if(session('error')) <p style="color: red">{{ session('error') }}</p> @endif
                                    @if(session('success')) <p style="color: green">{{ session('success') }}</p> @endif
                                </div>
                                <!-- .collapse -->
                                <form action="{{route('checkout.submit')}}" class="checkout woocommerce-checkout" method="post" name="checkout">
                                    @csrf
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
                                                    <tr>
                                                        <td>
                                                        <div>
                                                            <input type="hidden" name="product_id" value="{{$item->product_id}}">
                                                            <strong>{{ $item->product->name }}</strong><br>
                                                            Số lượng: {{ $item['quantity'] }} <br>
                                                            Giá: {{ number_format($price) }} VNĐ <br>
                                                            @if ($item->variant && $item->variant->variantAttributes)
                                                                @foreach ($item->variant->variantAttributes as $att)
                                                                    {{ $att->attribute->name ?? '' }}: {{ $att->value->value ?? '' }} <br>
                                                                @endforeach
                                                            @endif
                                                            <hr>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr class="cart-subtotal">
                                                        <th>Tạm tính</th>
                                                        <td>
                                                            <span class="woocommerce-Price-amount amount">
                                                                <span class="woocommerce-Price-currencySymbol"></span>{{$subtotal}} VNĐ</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="order-total">
                                                        <th>Tổng cộng</th>
                                                        <td>
                                                            <strong>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol"></span>{{$subtotal}} VNĐ</span>
                                                            </strong>
                                                        </td>
                                                    </tr>
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
                                                    {{-- <li class="wc_payment_method payment_method_cod">
                                                        <input type="radio" data-order_button_text="" value="momo" name="payment_method" class="input-radio">
                                                        <label for="payment_method_cod">Cash on deliver</label>
                                                    </li> --}}
                                                </ul>
                                                @foreach($ships as $ship)
                                                    <label>
                                                        <input type="radio" name="ship_id" value="{{ $ship->id }}">
                                                        {{ $ship->name }} - {{ number_format($ship->shipping_price) }} VNĐ
                                                    </label><br>
                                                @endforeach
                                                </select>
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
@endsection