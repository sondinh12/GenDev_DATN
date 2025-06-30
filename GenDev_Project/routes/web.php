<?php

session_start();

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryMiniController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CouponController;

use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CartDetailController;

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\VerificationController;

// ================= TRANG CHÍNH =================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/about', fn() => view('client.pages.about'))->name('about');
Route::get('/contact', fn() => view('client.pages.contact'))->name('contact');
Route::get('/faq', fn() => view('client.pages.faq'))->name('faq');

// ================= BLOG =================
Route::get('/blog', fn() => view('client.blog.blog'))->name('blog');
Route::get('/blog-single', fn() => view('client.blog.blog-single'))->name('blog-single');

// ================= SẢN PHẨM =================
Route::get('/categories', fn() => view('client.product.categories'))->name('categories');
Route::get('/shop', [ClientProductController::class, 'shop'])->name('shop');
Route::get('/product', fn() => view('client.product.product'))->name('product');
Route::get('/product/{id}', [ClientProductController::class, 'show'])->name('client.product.show');

// ================= GIỎ HÀNG & THANH TOÁN =================
Route::get('/checkout', [CheckoutController::class,'index'])->name('checkout');
Route::post('/checkout',[CheckoutController::class,'store'])->name('checkout.submit');
Route::post('/apply_coupon',[CouponController::class,'apply'])->name('apply_coupon');

Route::match(['post','put'],'/handleaction',[CartDetailController::class,'handleAction'])->name('cart.handleaction');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart-detail', [CartDetailController::class, 'store'])->name('cart-detail');
    Route::put('/cart-detail/update', [CartDetailController::class, 'update'])->name('update');
    Route::delete('/cart-detail/delete/{id}', [CartDetailController::class, 'destroy'])->name('destroy');
});

// ================= ADMIN =================
Route::prefix('/admin')->middleware(['role:admin|staff'])->group(function () {
    Route::view('/', 'admin.index')->name('admin.dashboard');

    // SẢN PHẨM
    Route::middleware(['permission:manage products'])->group(function () {
        Route::resource('/products', ProductController::class);
        Route::patch('/products/{id}/trash', [ProductController::class, 'trash'])->name('products.trash');
        Route::patch('/products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
        Route::get('/attributes', [ProductController::class, 'allAttributes'])->name('admin.attributes.index');
        Route::get('/attributes/create', [ProductController::class, 'createAttribute'])->name('admin.attributes.create');
        Route::post('/attributes', [ProductController::class, 'storeAttribute'])->name('admin.attributes.store');
        Route::get('/attributes/{id}/edit', [ProductController::class, 'editAttribute'])->name('admin.attributes.edit');
        Route::put('/attributes/{id}', [ProductController::class, 'updateAttribute'])->name('admin.attributes.update');
        Route::delete('/attributes/{id}', [ProductController::class, 'destroyAttribute'])->name('admin.attributes.destroy');
        Route::get('/attribute-values/{id}/edit', [ProductController::class, 'editAttributeValue'])->name('admin.attribute_values.edit');
        Route::put('/attribute-values/{id}', [ProductController::class, 'updateAttributeValue'])->name('admin.attribute_values.update');
        Route::delete('/attribute-values/{id}', [ProductController::class, 'destroyAttributeValue'])->name('admin.attribute_values.destroy');
    });

    // MÃ GIẢM GIÁ
    Route::middleware(['permission:manage coupons'])->group(function () {
        Route::resource('/coupons', CouponController::class);
    });

    // ĐƠN HÀNG
    Route::middleware(['permission:manage orders'])->group(function () {
        Route::resource('/orders', OrderController::class);
    });

    // DANH MỤC
    Route::middleware(['permission:manage categories'])->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::get('/categories/{id}/minis', [CategoryMiniController::class, 'index'])->name('admin.categories_minis.index');
        Route::get('/categories/{id}/minis/create', [CategoryMiniController::class, 'create'])->name('admin.categories_minis.create');
        Route::post('/categories/{id}/minis/store', [CategoryMiniController::class, 'store'])->name('admin.categories_minis.store');
        Route::get('admin/categories/{category_id}/minis/{id}/edit', [CategoryMiniController::class, 'edit'])->name('categories_minis.edit');
        Route::put('admin/categories/{category_id}/minis/{id}', [CategoryMiniController::class, 'update'])->name('categories_minis.update');
        Route::delete('admin/categories/{category_id}/minis/{id}', [CategoryMiniController::class, 'destroy'])->name('categories_minis.destroy');
    });

    // NGƯỜI DÙNG
    Route::middleware(['permission:manage users'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
        Route::put('/users/{user}/update', [UserController::class, 'update'])->name('admin.users.update');
        Route::post('/users/{user}/ban', [UserController::class, 'ban'])->name('admin.users.ban');
        Route::post('/users/{user}/unban', [UserController::class, 'unban'])->name('admin.users.unban');
    });
});

// ================= TÀI KHOẢN =================
Auth::routes(['verify' => true]);

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

// FORGOT PASSWORD ROUTES (OTP)
Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', fn() => view('auth.passwords.forgot_password'))->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetOtp'])->name('password.email');
    Route::get('/reset-password', fn() => view('auth.passwords.reset_password'))->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'verifyResetOtp'])->name('password.update');
    Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyResetOtp'])->name('password.verify');
});
