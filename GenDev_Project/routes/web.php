<?php



session_start();

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryMiniController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Client\CartDetailController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Client\ClientOrderController;

// ================= TRANG CHÍNH =================

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('client.pages.about');
})->name('about');
Route::get('/products', function () {
    return view('client.pages.product');
})->name('products');
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
Route::get('/shop', [ClientProductController::class, 'shop'])->name('shop');
Route::get('/product', function () {
    return view('client.product.product');
})->name('product');

Route::get('/product/{id}', [App\Http\Controllers\Client\ProductController::class, 'show'])->name('client.product.show');

// ================= GIỎ HÀNG & THANH TOÁN =================

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.submit');
Route::get('/vnpay_return', [PaymentController::class, 'vnpayReturn'])->name('vnpay_return');
Route::get('/order/retry/{orderId}', [CheckoutController::class, 'retryPayment'])->name('order.retry');

Route::get('/checkout-success', function () {
    return view('client.checkout.checkout-success');
})->name('checkout.success');
Route::get('/checkout-failed', function () {
    return view('client.checkout.checkout-failed');
})->name('checkout.failed');
Route::post('/apply_coupon', [CouponController::class, 'apply'])->name('apply_coupon');

// hành dộng trang cart
Route::match(['post', 'put'], '/handleaction', [CartDetailController::class, 'handleAction'])->name('cart.handleaction');


Route::get('/cart', [CartController::class, 'index'])->name('cart')->middleware('auth');
Route::post('/cart-detail', [CartDetailController::class, 'store'])->name('cart-detail')->middleware('auth');
Route::put('/cart-detail/update', [CartDetailController::class, 'update'])->name('update')->middleware('auth');
Route::delete('/cart-detail/delete/{id}', [CartDetailController::class, 'destroy'])->name('destroy')->middleware('auth');
// Route::get('/cart', function () {
//     return view('client.cart.cart');
// })->name('cart');
// Route::get('/wishlist', function () {
//     return view('client.cart.wishlist');
// })->name('wishlist');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/order', function () {
    return view('client.checkout.order');
})->name('order');
Route::get('/track-order', function () {
    return view('client.checkout.track-order');
})->name('track-order');

// ================= ADMIN =================

Route::prefix('/admin')->middleware(['role:admin|staff'])->group(function () {
    Route::view('/', 'admin.index')->name('admin.dashboard');
    // Sản phẩm
    Route::middleware(['permission:manage products'])->group(function () {
        Route::resource('/products', ProductController::class);
        Route::patch('/products/{id}/trash', [ProductController::class, 'trash'])->name('products.trash');
        Route::patch('/products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
        Route::get('/attributes', [ProductController::class, 'allAttributes'])->name('admin.attributes.index');
        Route::get('/attributes/create', [ProductController::class, 'createAttribute'])->name('admin.attributes.create');
        Route::post('/attributes', [ProductController::class, 'storeAttribute'])->name('admin.attributes.store');
        Route::get('/attributes/{id}/edit', [ProductController::class, 'editAttribute'])->name('admin.attributes.edit');
        Route::put('/attributes/{id}', [ProductController::class, 'updateAttribute'])->name('admin.attributes.update');
        Route::post('attributes/trash/{id}', [ProductController::class, 'trashAttribute'])->name('admin.attributes.trash');
        Route::get('/attribute-values/{id}/edit', [ProductController::class, 'editAttributeValue'])->name('admin.attribute_values.edit');
        Route::put('/attribute-values/{id}', [ProductController::class, 'updateAttributeValue'])->name('admin.attribute_values.update');
        Route::post('/admin/attributes/restore/{id}', [ProductController::class, 'restoreAttribute'])->name('admin.attributes.restore');
        Route::delete('/attribute-values/{id}', [ProductController::class, 'destroyAttributeValue'])->name('admin.attribute_values.destroy');
        Route::get('/attributes/trash', [ProductController::class, 'trashList'])->name('admin.attributes.trashList');
        Route::delete('/attributes/force-delete/{id}', [ProductController::class, 'forceDeleteAttribute'])->name('admin.attributes.forceDelete');
        Route::get('/products/trash/list', [ProductController::class, 'trashList'])->name('products.trash.list');
    });

    // Đơn hàng
    Route::middleware(['permission:manage orders'])->group(function () {
        Route::resource('/orders', OrderController::class);
        Route::put('orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.update-status');
        Route::put('orders/{order}/update-payment-status', [OrderController::class, 'updatePaymentStatus'])->name('admin.orders.update-payment-status');
    });


    // Danh mục
    Route::middleware(['permission:manage categories'])->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::get('admin/categories/trash', [CategoryController::class, 'trash_Category'])->name('categories.trash');
        Route::put('admin/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
        Route::delete('admin/categories/{id}/force-delete', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');
        Route::get('/categories/{id}/minis', [CategoryMiniController::class, 'index'])->name('admin.categories_minis.index');
        Route::get('/categories/{id}/minis/create', [CategoryMiniController::class, 'create'])->name('admin.categories_minis.create');
        Route::post('/categories/{id}/minis/store', [CategoryMiniController::class, 'store'])->name('admin.categories_minis.store');
        Route::get('admin/categories/{category_id}/minis/{id}/edit', [CategoryMiniController::class, 'edit'])->name('categories_minis.edit');
        Route::put('admin/categories/{category_id}/minis/{id}', [CategoryMiniController::class, 'update'])->name('categories_minis.update');
        Route::delete('admin/categories/{category_id}/minis/{id}', [CategoryMiniController::class, 'destroy'])->name('categories_minis.destroy');
        Route::get('admin/categories/minis/trash', [CategoryMiniController::class, 'trash_catemini'])->name('categories_mini.trash');
        Route::patch('admin/categories/minis/{id}/restore', [CategoryMiniController::class, 'restore'])->name('categories_mini.restore');
        Route::delete('admin/categories/minis/{id}/force-delete', [CategoryMiniController::class, 'forceDelete'])->name('categories_mini.forceDelete');
    });

    // Người dùng
    Route::middleware(['permission:manage users'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
        Route::put('/users/{user}/update', [UserController::class, 'update'])->name('admin.users.update');
        Route::post('/admin/users/{user}/ban', [UserController::class, 'ban'])->name('admin.users.ban');
        Route::post('/admin/users/{user}/unban', [UserController::class, 'unban'])->name('admin.users.unban');
    });
    Route::get('coupons/trashed', [CouponsController::class, 'trashed'])->name('admin.coupons.trashed');
    Route::resource('coupons', CouponsController::class);
    Route::post('coupons/{id}/restore', [CouponsController::class, 'restore'])->name('coupons.restore');
    Route::delete('coupons/{id}/force-delete', [CouponsController::class, 'forceDelete'])->name('coupons.forceDelete');

    // TODO: Thêm route cho các chức năng khác như banner, bình luận, bài viết, mã giảm giá, thống kê nếu có controller tương ứng
});

Route::resource('/product', ClientProductController::class);
Route::middleware(['auth', 'verified'])->prefix('orders')->name('client.orders.')->group(function () {
    Route::get('/', [ClientOrderController::class, 'index'])->name('index');
    Route::get('/{order}', [ClientOrderController::class, 'show'])->name('show');
    Route::put('/{order}/cancel', [ClientOrderController::class, 'cancel'])->name('cancel');
    Route::get('/retry/{orderId}', [ClientOrderController::class, 'retry'])->name('order.retry');
    Route::put('{order}/complete', [ClientOrderController::class, 'markAsCompleted'])->name('complete');
});


// ================= TÀI KHOẢN =================


Auth::routes(['verify' => true]); // Xác thực email

Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile');
Route::put('/profile', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');
Route::post('/profile/update-avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update_avatar');
Route::get('/profile/change-password', function () {
    return view('auth.passwords.change_password');
})->middleware('auth')->name('profile.change_password');
Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->middleware('auth')->name('profile.change_password.update');


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
