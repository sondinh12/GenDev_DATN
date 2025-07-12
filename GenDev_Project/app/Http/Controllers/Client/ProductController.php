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

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with([
            'category',
            'categoryMini',
            'galleries',
            'variants.variantAttributes.attribute',
            'variants.variantAttributes.value',
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

        // Lấy sản phẩm liên quan
        $relatedProducts = Product::with([
            'variants.variantAttributes.attribute',
            'variants.variantAttributes.value',
            'category'
        ])
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 1)
            ->take(4)
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

        // Lọc theo khoảng giá (ưu tiên sale_price nếu có, áp dụng đúng cho cả sản phẩm có biến thể và không biến thể)
        if ($request->has('min_price') && $request->min_price) {
            $query->where(function ($q) use ($request) {
                // Sản phẩm không có biến thể: lọc theo giá chính (ưu tiên sale_price nếu có)
                $q->where(function ($noVariantQ) use ($request) {
                    $noVariantQ->whereDoesntHave('variants')
                        ->where(function ($subQ) use ($request) {
                            $subQ->where(function ($saleQ) use ($request) {
                                $saleQ->where('sale_price', '>', 0)
                                    ->where('sale_price', '>=', $request->min_price);
                            })
                                ->orWhere(function ($priceQ) use ($request) {
                                    $priceQ->where(function ($q2) {
                                        $q2->whereNull('sale_price')->orWhere('sale_price', 0);
                                    })
                                        ->where('price', '>=', $request->min_price);
                                });
                        });
                })
                    // Sản phẩm có biến thể: chỉ lọc theo giá của các biến thể (ưu tiên sale_price nếu có)
                    ->orWhere(function ($hasVariantQ) use ($request) {
                        $hasVariantQ->whereHas('variants', function ($variantQuery) use ($request) {
                            $variantQuery->where(function ($vQ) use ($request) {
                                $vQ->where('sale_price', '>', 0)
                                    ->where('sale_price', '>=', $request->min_price);
                            })
                                ->orWhere(function ($vQ) use ($request) {
                                    $vQ->where(function ($q2) {
                                        $q2->whereNull('sale_price')->orWhere('sale_price', 0);
                                    })
                                        ->where('price', '>=', $request->min_price);
                                });
                        });
                    });
            });
        }

        if ($request->has('max_price') && $request->max_price) {
            $query->where(function ($q) use ($request) {
                // Sản phẩm không có biến thể: lọc theo giá chính (ưu tiên sale_price nếu có)
                $q->where(function ($noVariantQ) use ($request) {
                    $noVariantQ->whereDoesntHave('variants')
                        ->where(function ($subQ) use ($request) {
                            $subQ->where(function ($saleQ) use ($request) {
                                $saleQ->where('sale_price', '>', 0)
                                    ->where('sale_price', '<=', $request->max_price);
                            })
                                ->orWhere(function ($priceQ) use ($request) {
                                    $priceQ->where(function ($q2) {
                                        $q2->whereNull('sale_price')->orWhere('sale_price', 0);
                                    })
                                        ->where('price', '<=', $request->max_price);
                                });
                        });
                })
                    // Sản phẩm có biến thể: chỉ lọc theo giá của các biến thể (ưu tiên sale_price nếu có)
                    ->orWhere(function ($hasVariantQ) use ($request) {
                        $hasVariantQ->whereHas('variants', function ($variantQuery) use ($request) {
                            $variantQuery->where(function ($vQ) use ($request) {
                                $vQ->where('sale_price', '>', 0)
                                    ->where('sale_price', '<=', $request->max_price);
                            })
                                ->orWhere(function ($vQ) use ($request) {
                                    $vQ->where(function ($q2) {
                                        $q2->whereNull('sale_price')->orWhere('sale_price', 0);
                                    })
                                        ->where('price', '<=', $request->max_price);
                                });
                        });
                    });
            });
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
        $products = $query->paginate(12)->withQueryString();

        return view('client.product.shop', compact('products', 'categories', 'priceRange'));
    }
}
