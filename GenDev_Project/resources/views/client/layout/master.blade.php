<!DOCTYPE html>
<html lang="en-US" itemscope itemtype="http://schema.org/WebPage">

<!-- Mirrored from transvelo.github.io/techmarket-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 May 2025 14:25:19 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    @include('client.layout.partials.head')
</head>
@php
$route = Route::currentRouteName();
$bodyClass = match($route) {
'home' => 'woocommerce-active page-template-template-homepage-v2 can-uppercase',
'blog' => 'right-sidebar blog-list',
'blog-single' => 'right-sidebar single single-post',
'shop', 'categories' => 'woocommerce-active left-sidebar',
'product' => 'woocommerce-active single-product full-width normal',
'order' => 'page-template-default woocommerce-checkout woocommerce-page woocommerce-order-received can-uppercase
woocommerce-active',
'wishlist' => 'page-template-default page woocommerce-wishlist can-uppercase',
default => 'page home page-template-default'
};
@endphp

<body class="{{ $bodyClass }}">
    <div id="page" class="site">
        @include('client.layout.partials.topbar')
        @include('client.layout.partials.header')
        @yield('content')
        @include('client.layout.partials.footer')
    </div>
    @include('client.layout.partials.script')
    @yield('scripts')
</body>

<!-- Mirrored from transvelo.github.io/techmarket-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 May 2025 14:26:03 GMT -->

</html>