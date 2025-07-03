<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantAttribute;
use App\Models\AttributeValue;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\CategoryMini;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with([
            'category',
            'categoryMini',
            'galleries',
            'variants.variantAttributes.attribute',
            'variants.variantAttributes.value'
            ])->findOrFail($id);

        // Lấy danh sách ảnh cho gallery
        $galleryImageUrls = [];
        // Add main product image first
        if ($product->image) {
            $galleryImageUrls[] = asset('storage/' . $product->image);
        }
        // Add gallery images
        if ($product->galleries) {
            foreach ($product->galleries as $gallery) {
                $galleryImageUrls[] = asset('storage/' . $gallery->image);
            }
        }

        return view('client.product.showProduct', compact('product', 'galleryImageUrls'));
    }

    public function shop(Request $request)
    {
        $query = Product::with(['category', 'categoryMini']);

        // Filter by category if provided
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter by category mini if provided
        if ($request->has('category_mini')) {
            $query->where('category_mini_id', $request->category_mini);
        }

        // Filter by price range if provided
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Sort products
        switch ($request->get('orderby', 'date')) {
            case 'price':
                $query->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $query->orderBy('price', 'desc');
                break;
            case 'popularity':
                // You might want to implement a popularity metric
                $query->orderBy('created_at', 'desc');
                break;
            case 'rating':
                // You might want to implement a rating system
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        // Get all categories for the sidebar
        $categories = Category::with('categoryMinis')->get();

        // Paginate products
        $products = $query->paginate(12);

        return view('client.product.shop', compact('products', 'categories'));
    }
}
