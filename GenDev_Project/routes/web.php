<?php


use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.apps-chat');
});


Route::resource('/products',ProductController::class);
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
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::get('/attributes', [ProductController::class, 'allAttributes'])->name('admin.attributes.index');
    Route::get('/attributes/create', [ProductController::class, 'createAttribute'])->name('admin.attributes.create');
    Route::post('/attributes', [ProductController::class, 'storeAttribute'])->name('admin.attributes.store');
    
    Route::get('/attributes/{id}/edit', [ProductController::class, 'editAttribute'])->name('admin.attributes.edit');
    Route::put('/attributes/{id}', [ProductController::class, 'updateAttribute'])->name('admin.attributes.update');
    Route::delete('/attributes/{id}', [ProductController::class, 'destroyAttribute'])->name('admin.attributes.destroy');

    Route::get('/attribute-values/{id}/edit', [ProductController::class, 'editAttributeValue'])->name('admin.attribute_values.edit');
    Route::put('/attribute-values/{id}', [ProductController::class, 'updateAttributeValue'])->name('admin.attribute_values.update');
    Route::delete('/attribute-values/{id}', [ProductController::class, 'destroyAttributeValue'])->name('admin.attribute_values.destroy');

    Route::view('/categories', 'admin.categories.index')->name('admin.categories.index');
    Route::view('/users', 'admin.users.index')->name('admin.users.index');
});


// ================= TÀI KHOẢN =================
Route::get('/login', function () {
    return view('client.auth.login-and-register');
})->name('login');

