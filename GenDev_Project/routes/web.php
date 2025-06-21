<?php
session_start();


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryMiniController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;

// Route::get('/', function () {
//     return view('admin.apps-chat');
// });


Route::resource('/products', ProductController::class);
Route::patch('/products/{id}/trash', [ProductController::class, 'trash'])->name('products.trash');
Route::patch('/products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');

// Route::get('/products', function () {

//     return view('products.index');

// });
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

// ================= ADMIN =================

Route::prefix('/admin')->group(function () {
    Route::view('/', 'admin.index')->name('admin.dashboard');
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

    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
    Route::put('admin/users/{user}/update', [UserController::class, 'update'])->name('admin.users.update');
    Route::post('/admin/users/{user}/ban', [UserController::class, 'ban'])->name('admin.users.ban');
    Route::post('/admin/users/{user}/unban', [UserController::class, 'unban'])->name('admin.users.unban');

    Route::resource('categories', CategoryController::class);
    Route::get('/categories/{id}/minis', [CategoryMiniController::class, 'index'])->name('admin.categories_minis.index');
    Route::get('/categories/{id}/minis/create', [CategoryMiniController::class, 'create'])->name('admin.categories_minis.create');
    Route::post('/categories/{id}/minis/store', [CategoryMiniController::class, 'store'])->name('admin.categories_minis.store');
    Route::get('admin/categories/{category_id}/minis/{id}/edit', [CategoryMiniController::class, 'edit'])->name('categories_minis.edit');
    Route::put('admin/categories/{category_id}/minis/{id}', [CategoryMiniController::class, 'update'])->name('categories_minis.update');
    Route::delete('admin/categories/{category_id}/minis/{id}', [CategoryMiniController::class, 'destroy'])->name('categories_minis.destroy');
});


// ================= TÀI KHOẢN =================

Auth::routes();


// Email Verification Routes
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
// Giao diện nhập email để gửi OTP
Route::get('/forgot-password', function () {
    return view('auth.passwords.reset'); // form gửi OTP
})->name('password.request');

// Gửi OTP
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetOtp'])->name('password.email');

// Hiển thị form nhập email để gửi OTP
Route::get('/forgot-password', function () {
    return view('auth.passwords.forgot_password');
})->middleware('guest')->name('password.request');

// Xử lý gửi OTP qua email
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetOtp'])
    ->middleware('guest')
    ->name('password.email');

// Hiển thị form nhập OTP + mật khẩu mới
Route::get('/reset-password', function () {
    return view('auth.passwords.reset_password');
})->middleware('guest')->name('password.reset');

// Xử lý xác minh OTP và cập nhật mật khẩu mới
Route::post('/reset-password', [ForgotPasswordController::class, 'verifyResetOtp'])
    ->middleware('guest')
    ->name('password.update');

Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyResetOtp'])->name('password.verify');

// ================= PROFILE =================
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
});
