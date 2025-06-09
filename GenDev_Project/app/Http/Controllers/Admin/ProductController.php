<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\ProductGallery;
use App\Models\ProductVariant;
use App\Models\ProductVariantAttribute;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->orderBy('id','DESC')->get();
        return view('Admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $attributes = Attribute::with('values')->get();
        return view('Admin.products.create',compact('categories','attributes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate chung
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image',
            'gallery.*' => 'nullable|image',
        ]);

        // Nếu không có biến thể thì bắt buộc nhập giá
        if (!$request->has('variant_combinations')) {
            $validator->addRules([
                'price' => 'required|numeric|min:0',
                'sale_price' => 'nullable|numeric|min:0',
            ]);
        }

        $validator->validate();

        // 2. Lưu ảnh đại diện
        $imagePath = $request->file('image')->store('products', 'public');

        // 3. Tạo sản phẩm
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
        ]);

        // 4. Lưu ảnh gallery nếu có
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryImg) {
                $galleryPath = $galleryImg->store('products/gallery', 'public');
                ProductGallery::create([
                    'product_id' => $product->id,
                    'image' => $galleryPath
                ]);
            }
        }

        // 5. Tạo biến thể nếu có
        if ($request->has('variant_combinations')) {
            foreach ($request->variant_combinations as $variant) {
                // Tạo biến thể sản phẩm
                $variantModel = ProductVariant::create([
                    'product_id' => $product->id,
                    'price' => $variant['price'],
                    'sale_price' => $variant['sale_price'] ?? null,
                    'quantity' => $variant['quantity'] ?? 0,
                    'status' => $variant['status'] ?? 1,
                ]);

                // Gán từng giá trị của thuộc tính cho biến thể
                $valueIds = isset($variant['value_ids']) ? explode(',', $variant['value_ids'][0]) : [];

                foreach ($valueIds as $valueId) {
                    $attributeId = AttributeValue::find($valueId)?->attribute_id;

                    ProductVariantAttribute::create([
                        'product_variant_id' => $variantModel->id,
                        'attribute_value_id' => $valueId,
                        'attribute_id' => $attributeId
                    ]);
                }
            }
        }

        return redirect()->route('products.index')->with('success', 'Tạo sản phẩm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $product = Product::with([
            'category',
            'galleries',
            'variants.variantAttributes.attribute',
            'variants.variantAttributes.value'
        ])->findOrFail($id);
        return view('Admin.products.show',compact('product'));
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
