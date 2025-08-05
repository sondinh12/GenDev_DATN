<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Helpers\ProductHelper;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy danh mục chính
        $categories = Category::with('categoryMinis')
            ->where('status', 1)
            ->orderBy('name')
            ->get();

        // Lấy sản phẩm nổi bật (có sale_price)
        $featuredProducts = Product::with([
            'galleries',
            'variants.variantAttributes.attribute',
            'variants.variantAttributes.value',
            'category'
        ])
            ->where(function ($query) {
                // Sản phẩm có sale_price trực tiếp
                $query->where('sale_price', '>', 0)
                    // Hoặc có biến thể với sale_price
                    ->orWhereHas('variants', function ($variantQuery) {
                        $variantQuery->where('sale_price', '>', 0);
                    });
            })
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        // Debug: Kiểm tra logic hiển thị giá
        foreach ($featuredProducts as $product) {
            $priceInfo = ProductHelper::getProductPriceInfo($product);
            Log::info("Product: {$product->name}", [
                'has_variants' => $product->variants->count(),
                'price_info' => $priceInfo
            ]);
        }

        // Lấy sản phẩm mới nhất
        $newProducts = Product::with([
            'galleries',
            'variants.variantAttributes.attribute',
            'variants.variantAttributes.value',
            'category'
        ])
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        // Lấy sản phẩm theo từng danh mục
        $categoryProducts = [];
        foreach ($categories as $category) {
            $categoryProducts[$category->id] = Product::with([
                'galleries',
                'variants.variantAttributes.attribute',
                'variants.variantAttributes.value',
                'category'
            ])
                ->where('category_id', $category->id)
                ->where('status', 1)
                ->orderBy('created_at', 'desc')
                ->take(8)
                ->get();
        }

        // Lấy sản phẩm bán chạy (dựa trên số lượng trong giỏ hàng)
        $bestSellingProducts = Product::with([
            'galleries',
            'variants.variantAttributes.attribute',
            'variants.variantAttributes.value',
            'category'
        ])
            ->withCount([
                'cartdetails as total_sold' => function ($query) {
                    $query->select(DB::raw('SUM(quantity)'));
                }
            ])
            ->where('status', 1)
            ->orderBy('total_sold', 'desc')
            ->paginate(14);
        if ($request->ajax()) {
            return view('client.components.best_sellers', compact('bestSellingProducts'))->render();
        }
        $products = Product::all();

        return view('client.pages.home', compact(
            'categories',
            'featuredProducts',
            'newProducts',
            'categoryProducts',
            'bestSellingProducts',
            'products'
        ));
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
