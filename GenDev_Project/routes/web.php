<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('apps-chat');
});

Route::get('/products', function () {
    return view('products.index');
});
