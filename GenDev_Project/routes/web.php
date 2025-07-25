<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// ================= TRANG CHÍNH =================
Route::get('/home', function () {
    return view('client.pages.home');
})->name('home');
Route::get('/about', function () {
    return view('client.pages.about');
})->name('about');
Route::get('/contact', function () {
    return view('client.pages.contact');
})->name('contact');
Route::get('/faq', function () {
    return view('client.pages.faq');
})->name('faq');

// ================= BLOG =================
Route::get('/blog', function () {
    return view('client.blog.blog');
})->name('blog');
Route::get('/blog-single', function () {
    return view('client.blog.blog-single');
})->name('blog-single');

// ================= SẢN PHẨM =================
Route::get('/categories', function () {
    return view('client.product.categories');
})->name('categories');
Route::get('/shop', function () {
    return view('client.product.shop');
})->name('shop');
Route::get('/product', function () {
    return view('client.product.product');
})->name('product');

// ================= GIỎ HÀNG & THANH TOÁN =================
Route::get('/cart', function () {
    return view('client.cart.cart');
})->name('cart');
Route::get('/wishlist', function () {
    return view('client.cart.wishlist');
})->name('wishlist');
Route::get('/checkout', function () {
    return view('client.checkout.checkout');
})->name('checkout');
Route::get('/order', function () {
    return view('client.checkout.order');
})->name('order');
Route::get('/track-order', function () {
    return view('client.checkout.track-order');
})->name('track-order');


// ================= TÀI KHOẢN =================
Route::get('/login', function () {
    return view('client.auth.login-and-register');
})->name('login');
