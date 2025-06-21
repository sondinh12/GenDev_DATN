<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $newProducts = Product::orderBy('created_at', 'desc')->take(8)->get();
        
        // Lấy sản phẩm theo từng danh mục
        $categoryProducts = [];
        foreach ($categories as $category) {
            $categoryProducts[$category->id] = Product::where('category_id', $category->id)
                ->orderBy('created_at', 'desc')
                ->take(8)
                ->get();
        }

        return view('client.pages.home', compact('categories', 'newProducts', 'categoryProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
