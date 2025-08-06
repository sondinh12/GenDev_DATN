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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        if ($product->image) {
            $galleryImageUrls[] = asset('storage/' . $product->image);
        }
        if ($product->galleries) {
            foreach ($product->galleries as $gallery) {
                $galleryImageUrls[] = asset('storage/' . $gallery->image);
            }
        }

        // Lấy 10 sản phẩm liên quan cùng danh mục (trừ sản phẩm hiện tại)
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->whereNull('deleted_at')
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();

        return view('client.product.showProduct', compact('product', 'galleryImageUrls', 'relatedProducts'));
    }

    public function shop(Request $request)
    {
        $query = Product::with([
            'category',
            'categoryMini',
            'variants.variantAttributes.attribute',
            'variants.variantAttributes.value'
        ])->where('status', 1);

        // Lọc theo danh mục cha (bao gồm cả sản phẩm thuộc category_mini của danh mục cha)
        if ($request->has('category') && $request->category) {
            $categoryMiniIds = CategoryMini::where('category_id', $request->category)->pluck('id')->toArray();
            $query->where(function ($q) use ($request, $categoryMiniIds) {
                $q->where('category_id', $request->category);
                if (!empty($categoryMiniIds)) {
                    $q->orWhereIn('category_mini_id', $categoryMiniIds);
                }
            });
        }

        // Lọc theo danh mục con (nếu có)
        if ($request->has('category_mini') && $request->category_mini) {
            $query->where('category_mini_id', $request->category_mini);
        }

        // Lọc theo khoảng giá dựa trên giá hiển thị (biến thể đầu tiên hoặc giá sản phẩm)
        if (($request->has('min_price') && $request->min_price !== null && $request->min_price !== '') ||
            ($request->has('max_price') && $request->max_price !== null && $request->max_price !== '')
        ) {
            $min = $request->min_price !== null && $request->min_price !== '' ? (float)$request->min_price : 0;
            $max = $request->max_price !== null && $request->max_price !== '' ? (float)$request->max_price : null;

            // Lấy danh sách id sản phẩm thỏa mãn điều kiện giá hiển thị
            $productIds = Product::with(['variants' => function ($q) {
                $q->orderBy('id');
            }])->where('status', 1)->get()->filter(function ($product) use ($min, $max) {
                // Lấy giá hiển thị giống giao diện (biến thể đầu tiên hoặc giá sản phẩm)
                if ($product->variants && $product->variants->count() > 0) {
                    $variant = $product->variants->first();
                    $price = ($variant->sale_price && $variant->sale_price > 0) ? $variant->sale_price : $variant->price;
                } else {
                    $price = ($product->sale_price && $product->sale_price > 0) ? $product->sale_price : $product->price;
                }
                if ($max !== null) {
                    return $price >= $min && $price <= $max;
                } else {
                    return $price >= $min;
                }
            })->pluck('id')->toArray();

            $query->whereIn('id', $productIds);
        }

        // Lọc sản phẩm khuyến mãi
        if ($request->has('sale_only') && $request->sale_only) {
            $query->where(function ($q) {
                $q->where('sale_price', '>', 0)
                    ->orWhereHas('variants', function ($variantQuery) {
                        $variantQuery->where('sale_price', '>', 0);
                    });
            });
        }

        // Tìm kiếm theo tên
        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sắp xếp
        switch ($request->get('orderby', 'date')) {
            case 'price':
                // Sắp xếp theo giá tăng dần (ưu tiên sale_price nếu có)
                $query->orderByRaw("
                    CASE 
                        WHEN EXISTS (SELECT 1 FROM product_variants pv WHERE pv.product_id = products.id) THEN
                            (SELECT MIN(COALESCE(NULLIF(pv.sale_price, 0), pv.price)) 
                             FROM product_variants pv 
                             WHERE pv.product_id = products.id)
                        ELSE COALESCE(NULLIF(products.sale_price, 0), products.price)
                    END ASC
                ");
                break;
            case 'price-desc':
                // Sắp xếp theo giá giảm dần (ưu tiên sale_price nếu có)
                $query->orderByRaw("
                    CASE 
                        WHEN EXISTS (SELECT 1 FROM product_variants pv WHERE pv.product_id = products.id) THEN
                            (SELECT MIN(COALESCE(NULLIF(pv.sale_price, 0), pv.price)) 
                             FROM product_variants pv 
                             WHERE pv.product_id = products.id)
                        ELSE COALESCE(NULLIF(products.sale_price, 0), products.price)
                    END DESC
                ");
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'name-desc':
                $query->orderBy('name', 'desc');
                break;
            case 'popularity':
                $query->withCount(['cartdetails as total_sold' => function ($query) {
                    $query->select(DB::raw('SUM(quantity)'));
                }])->orderBy('total_sold', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        // Lấy danh sách danh mục cho sidebar
        $categories = Category::with('categoryMinis')
            ->where('status', 1)
            ->orderBy('name')
            ->get();

        // Lấy khoảng giá cho filter (bao gồm cả giá sản phẩm chính và giá biến thể)
        $priceRange = DB::select("
            SELECT 
                MIN(min_price) as min_price,
                MAX(max_price) as max_price
            FROM (
                -- Giá sản phẩm chính (ưu tiên sale_price nếu có)
                SELECT 
                    COALESCE(NULLIF(sale_price, 0), price) as min_price,
                    COALESCE(NULLIF(sale_price, 0), price) as max_price
                FROM products 
                WHERE status = 1
                
                UNION ALL
                
                -- Giá của các biến thể (ưu tiên sale_price nếu có)
                SELECT 
                    COALESCE(NULLIF(pv.sale_price, 0), pv.price) as min_price,
                    COALESCE(NULLIF(pv.sale_price, 0), pv.price) as max_price
                FROM product_variants pv
                INNER JOIN products p ON p.id = pv.product_id
                WHERE p.status = 1
            ) as all_prices
        ")[0];

        // Phân trang
        $products = $query->paginate(10)->withQueryString();

        return view('client.product.shop', compact('products', 'categories', 'priceRange'));
    }
}