<!DOCTYPE html>
<html lang="en-US" itemscope itemtype="http://schema.org/WebPage">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @include('client.layout.partials.head')
</head>
@php
$route = Route::currentRouteName();
$bodyClass = match($route) {
    'home' => 'woocommerce-active page-template-template-homepage-v3',
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
@stack('styles')
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

</html>
