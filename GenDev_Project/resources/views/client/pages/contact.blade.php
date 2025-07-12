@extends('client.layout.master')

@section('content')
<div id="content" class="site-content">
    <div class="col-full">
        <div class="row">
            <nav class="woocommerce-breadcrumb">
                <a href="/">Trang chủ</a>
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span>
                Liên hệ
            </nav>
            <!-- .woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="type-page hentry">
                        <!-- .entry-header -->
                        <div class="entry-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-block">
                                        <h2 class="contact-page-title">Gửi tin nhắn cho chúng tôi</h2>
                                        <p>Hãy để lại lời nhắn, chúng tôi sẽ phản hồi bạn sớm nhất có thể.</p>
                                    </div>
                                    <div class="contact-form">
                                        <div role="form" class="wpcf7" id="wpcf7-f425-o1" lang="en-US" dir="ltr">
                                            <div class="screen-reader-response"></div>
                                            <form class="wpcf7-form" novalidate="novalidate">
                                                <div style="display: none;">
                                                    <input type="hidden" name="_wpcf7" value="425" />
                                                    <input type="hidden" name="_wpcf7_version" value="4.5.1" />
                                                    <input type="hidden" name="_wpcf7_locale" value="en_US" />
                                                    <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f425-o1" />
                                                    <input type="hidden" name="_wpnonce" value="e6363d91dd" />
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-xs-12 col-md-6">
                                                        <label>Họ
                                                            <abbr title="required" class="required">*</abbr>
                                                        </label>
                                                        <br>
                                                        <span class="wpcf7-form-control-wrap first-name">
                                                            <input type="text" aria-invalid="false" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text" size="40" value="" name="first-name">
                                                        </span>
                                                    </div>
                                                    <!-- .col -->
                                                    <div class="col-xs-12 col-md-6">
                                                        <label>Tên
                                                            <abbr title="required" class="required">*</abbr>
                                                        </label>
                                                        <br>
                                                        <span class="wpcf7-form-control-wrap last-name">
                                                            <input type="text" aria-invalid="false" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text" size="40" value="" name="last-name">
                                                        </span>
                                                    </div>
                                                    <!-- .col -->
                                                </div>
                                                <!-- .form-group -->
                                                <div class="form-group">
                                                    <label>Chủ đề</label>
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap subject">
                                                        <input type="text" aria-invalid="false" class="wpcf7-form-control wpcf7-text input-text" size="40" value="" name="subject">
                                                    </span>
                                                </div>
                                                <!-- .form-group -->
                                                <div class="form-group">
                                                    <label>Nội dung tin nhắn</label>
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap your-message">
                                                        <textarea aria-invalid="false" class="wpcf7-form-control wpcf7-textarea" rows="10" cols="40" name="your-message"></textarea>
                                                    </span>
                                                </div>
                                                <!-- .form-group-->
                                                <div class="form-group clearfix">
                                                    <p>
                                                        <input type="submit" value="Gửi tin nhắn" class="wpcf7-form-control wpcf7-submit" />
                                                    </p>
                                                </div>
                                                <!-- .form-group-->
                                                <div class="wpcf7-response-output wpcf7-display-none"></div>
                                            </form>
                                            <!-- .wpcf7-form -->
                                        </div>
                                        <!-- .wpcf7 -->
                                    </div>
                                    <!-- .contact-form7 -->
                                </div>
                                <!-- .col -->
                                <div class="col-md-6 store-info store-info-v2">
                                    <div class="google-map">
                                        <iframe height="288" allowfullscreen="" style="border:0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2481.593303940039!2d-0.15470444843858283!3d51.53901886611164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761ae62edd5771%3A0x27f2d823e2be0249!2sPrincess+Rd%2C+London+NW1+8JR%2C+UK!5e0!3m2!1sen!2s!4v1458827996435"></iframe>
                                    </div>
                                    <!-- .google-map -->
                                    <div class="kc-elm kc-css-773435 kc_text_block">
                                        <h2 class="contact-page-title">Địa chỉ của chúng tôi</h2>
                                        <p>17 Princess Road London, Greater London NW1 8JR, UK
                                            <br> Hỗ trợ: (+800)856 800 604
                                            <br> Email: <a href="mailto:contact@yourstore.com">info@electro.com</a>
                                        </p>
                                        <h3>Giờ mở cửa</h3>
                                        <p class="operation-hours">Thứ 2 đến Thứ 6: 9h - 21h
                                            <br> Thứ 7 & Chủ nhật: 9h - 23h</p>
                                        <h3>Tuyển dụng</h3>
                                        <p>Nếu bạn quan tâm đến cơ hội việc làm tại Electro, vui lòng gửi email cho chúng tôi: <a href="mailto:contact@yourstore.com">contact@yourstore.com</a></p>
                                    </div>
                                </div>
                                <!-- .col -->
                            </div>
                            <!-- .row -->
                        </div>
                        <!-- .entry-header -->
                    </div>
                    <!-- .hentry -->
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