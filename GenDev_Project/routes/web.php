<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.apps-chat');
});

Route::resource('/products',ProductController::class);
