<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;

class ProductController extends Controller
{
    // app/Http/Controllers/Admin/ProductController.php


public function index()
{
    $products = Product::with(['variants', 'category'])->get();
    return view('admin.products.index', compact('products'));
}
public function show($id)
{
    $product = Product::with([
        'category',
        'galleries',
        'variants.attributes.attribute',
        'variants.attributes.value'
    ])->findOrFail($id);

    return view('admin.products.show', compact('product'));
}

}
