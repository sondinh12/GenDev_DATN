<?php
session_start();
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ImportController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryMiniController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Client\ProductReviewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Client\CartDetailController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Client\ClientOrderController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Client\FavoriteController;

use Spatie\Permission\Models\Role;

// ================= TRANG CHÍNH =================

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/best-sellers', [HomeController::class, 'paginateBestSellers'])->name('best-sellers.paginate');
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

Route::get('/product/{id}', [ClientProductController::class, 'show'])->name('client.product.show');
Route::post('/products/{product}/questions', [ProductController::class, 'storeQuestion'])->name('product.question.store');

// ================= GIỎ HÀNG & THANH TOÁN =================
Route::middleware(['auth', 'check_ban'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.submit');
    Route::get('/vnpay_return', [PaymentController::class, 'vnpayReturn'])->name('vnpay_return');
    //mua tiếp nếu trong thời gian còn mã
    Route::get('/order/retry/{orderId}', [CheckoutController::class, 'retryPayment'])->name('order.retry');
    // mua lại
    // Route::get('/reorder/{orderId}', [CheckoutController::class, 'checkoutFromOrder'])->name('checkout.reorder');
});



Route::get('/checkout-success', function () {
    return view('client.checkout.checkout-success');
})->name('checkout.success');
Route::get('/checkout-failed', function () {
    return view('client.checkout.checkout-failed');
})->name('checkout.failed');
Route::post('/apply-coupon', [CouponController::class, 'apply'])->name('apply_coupon');
Route::post('/coupon/remove', [CouponController::class, 'remove'])->name('coupon.remove');

// Hành động trang cart
Route::middleware(['auth', 'check_ban'])->group(function () {
    Route::match(['post', 'put'], '/handleaction', [CartDetailController::class, 'handleAction'])->name('cart.handleaction');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart-detail', [CartDetailController::class, 'store'])->name('cart-detail');
    Route::put('/cart-detail/update', [CartDetailController::class, 'update'])->name('update');
    Route::delete('/cart-detail/delete/{id}', [CartDetailController::class, 'destroy'])->name('destroy');
});

Route::get('/order', function () {
    return view('client.checkout.order');
})->name('order');
Route::get('/track-order', function () {
    return view('client.checkout.track-order');
})->name('track-order');

// ================= ADMIN =================
//


// Lấy danh sách role name admin từ DB
$adminRoles = Role::where('name', 'like', '%admin%')->orWhere('name', 'like', '%nhan vien%')->pluck('name')->toArray();
Route::prefix('/admin')->middleware(['role:' . implode('|', $adminRoles)])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Sản phẩm
    Route::middleware(['permission:Quản lý sản phẩm'])->group(function () {
        Route::resource('/products', ProductController::class);
        Route::patch('/products/{id}/trash', [ProductController::class, 'trash'])->name('products.trash');
        Route::patch('/products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
        Route::get('/products/trash/list', [ProductController::class, 'listTrashed'])->name('products.trash.list');
    });
    Route::middleware(['permission:Quản lý thuộc tính'])->group(function () {
        Route::get('/attributes', [ProductController::class, 'allAttributes'])->name('admin.attributes.index');
        Route::get('/attributes/create', [ProductController::class, 'createAttribute'])->name('admin.attributes.create');
        Route::post('/attributes', [ProductController::class, 'storeAttribute'])->name('admin.attributes.store');
        Route::get('/attributes/{id}/edit', [ProductController::class, 'editAttribute'])->name('admin.attributes.edit');
        Route::put('/attributes/{id}', [ProductController::class, 'updateAttribute'])->name('admin.attributes.update');
        Route::post('attributes/trash/{id}', [ProductController::class, 'trashAttribute'])->name('admin.attributes.trash');
        Route::get('/attribute-values/{id}/edit', [ProductController::class, 'editAttributeValue'])->name('admin.attribute_values.edit');
        Route::put('/attribute-values/{id}', [ProductController::class, 'updateAttributeValue'])->name('admin.attribute_values.update');
        Route::post('/attributes/restore/{id}', [ProductController::class, 'restoreAttribute'])->name('admin.attributes.restore');
        Route::delete('/attribute-values/{id}', [ProductController::class, 'destroyAttributeValue'])->name('admin.attribute_values.destroy');
        Route::get('/attributes/trash', [ProductController::class, 'trashList'])->name('admin.attributes.trashList');
        Route::delete('/attributes/force-delete/{id}', [ProductController::class, 'forceDeleteAttribute'])->name('admin.attributes.forceDelete');
    });
    // Đơn hàng
    Route::middleware(['permission:Quản lý đơn hàng'])->group(function () {
        Route::resource('/orders', OrderController::class);
        Route::put('orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.update-status');
        Route::put('orders/{order}/update-payment-status', [OrderController::class, 'updatePaymentStatus'])->name('admin.orders.update-payment-status');
    });

    // Danh mục
    Route::middleware(['permission:Quản lý danh mục'])->group(function () {
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

    // Bình luận
    Route::middleware(['auth', 'check_ban', 'permission:Quản lý bình luận'])->group(function () {
        Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
        Route::get('/reviews/{question}', [ReviewController::class, 'show'])->name('reviews.show');
        Route::post('/reviews/{question}/violation', [ReviewController::class, 'handleViolation'])->name('reviews.violation');
    });

    // Tài khoản người dùng
    Route::middleware(['permission:Quản lý tài khoản'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::post('/users/store', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
        Route::put('/users/{user}/update', [UserController::class, 'update'])->name('admin.users.update');
        Route::post('/users/{user}/ban', [UserController::class, 'ban'])->name('admin.users.ban');
        Route::post('/users/{user}/unban', [UserController::class, 'unban'])->name('admin.users.unban');
    });


    // Vai trò
    Route::middleware(['permission:Quản lý vai trò'])->group(function () {
        Route::resource('roles', RoleController::class);
    });
    
    // Mã giảm giá
    Route::middleware(['permission:Quản lý mã giảm giá'])->group(function () {
        Route::get('coupons/trashed', [CouponsController::class, 'trashed'])->name('admin.coupons.trashed');
        Route::resource('coupons', CouponsController::class);
        Route::post('coupons/{id}/restore', [CouponsController::class, 'restore'])->name('coupons.restore');
        Route::delete('coupons/{id}/force-delete', [CouponsController::class, 'forceDelete'])->name('coupons.forceDelete');
    });

    // quan lý banner
    Route::middleware(['permission:Quản lý banner'])->group(function () {
    Route::post('banner/{id}/use', [BannerController::class, 'useBanner'])
    ->name('banner.use');
    Route::get('banner-trash', [BannerController::class, 'trash'])->name('admin.banner.trash');
    Route::get('banner-restore/{id}', [BannerController::class, 'restore'])->name('admin.banner.restore');
    Route::delete('banner-force-delete/{id}', [BannerController::class, 'forceDelete'])->name('admin.banner.forceDelete');
    Route::resource('banner', BannerController::class);
    });

    // TODO: Thêm route cho các chức năng khác như banner, bình luận, bài viết, mã giảm giá, thống kê nếu có controller tương ứng
    //Quản lý hóa đơn nhập hàng
    Route::middleware(['permission:Quản lý hóa đơn nhập hàng'])->group(function () {
        Route::get('/imports', [ImportController::class, 'index'])->name('admin.imports.index');
        Route::get('/imports/show/{id}', [ImportController::class, 'show'])->name('admin.imports.show');
        Route::get('/imports/create', [ImportController::class, 'create'])->name('admin.imports.create');
        Route::post('/imports/store', [ImportController::class, 'store'])->name('admin.imports.store');
        Route::get('/imports/edit/{id}', [ImportController::class, 'edit'])->name('admin.imports.edit');
        Route::put('/imports/upadte/{id}', [ImportController::class, 'update'])->name('admin.imports.update');
        Route::post('/imports/updateStatus/{id}', [ImportController::class, 'show'])->name('admin.imports.updateStatus');
        Route::delete('/imports/destroy/{id}', [ImportController::class, 'destroy'])->name('admin.imports.destroy');
        Route::get('imports/{id}/export', [ImportController::class, 'export'])->name('admin.imports.export');
    });
    //Nhà cung cấp
    Route::middleware(['permission:Quản lý nhà cung cấp'])->group(function () {
        Route::get('/suppliers', [SupplierController::class, 'index'])->name('admin.suppliers.index');
        Route::get('/suppliers/show/{id}', [SupplierController::class, 'show'])->name('admin.suppliers.show');
        Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('admin.suppliers.create');
        Route::post('/suppliers/store', [SupplierController::class, 'store'])->name('admin.suppliers.store');
        Route::get('/suppliers/edit/{id}', [SupplierController::class, 'edit'])->name('admin.suppliers.edit');
        Route::put('/suppliers/upadte/{id}', [SupplierController::class, 'update'])->name('admin.suppliers.update');
        Route::delete('/suppliers/destroy/{id}', [SupplierController::class, 'destroy'])->name('admin.suppliers.destroy');
        Route::get('admin/imports/trash', [ImportController::class, 'trash'])->name('admin.imports.trash');
        Route::post('admin/imports/{id}/restore', [ImportController::class, 'restore'])->name('admin.imports.restore');
        Route::delete('admin/imports/{id}/force', [ImportController::class, 'forceDelete'])->name('admin.imports.forceDelete');
    });
});

Route::resource('/product', ClientProductController::class);
Route::middleware(['auth', 'check_ban', 'verified'])->prefix('orders')->name('client.orders.')->group(function () {
    Route::get('/', [ClientOrderController::class, 'index'])->name('index');
    Route::get('/{order}', [ClientOrderController::class, 'show'])->name('show');
    Route::put('/{order}/cancel', [ClientOrderController::class, 'cancel'])->name('cancel');
    Route::get('/retry/{orderId}', [ClientOrderController::class, 'retry'])->name('order.retry');
    Route::put('{order}/complete', [ClientOrderController::class, 'markAsCompleted'])->name('complete');
    Route::put('{order}/return', [ClientOrderController::class, 'return'])->name('return');
});

// ================= TÀI KHOẢN =================

Auth::routes(['verify' => true]);
Route::middleware(['auth', 'check_ban'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/profile/update-avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update_avatar');
});

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
Route::middleware('auth')->group(function () {
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('client.favorites.index');
    Route::post('/favorites/toggle/{product}', [FavoriteController::class, 'toggle'])->name('client.favorites.toggle');
});
// Xử lý xác minh OTP và cập nhật mật khẩu mới
Route::post('/reset-password', [ForgotPasswordController::class, 'verifyResetOtp'])
    ->middleware('guest')
    ->name('password.update');

Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyResetOtp'])->name('password.verify');
Route::post('/product/{id}/review', [ProductReviewController::class, 'store'])->name('product.review.store');
