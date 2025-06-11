<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
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
        $products = Product::with('category')->orderBy('id','DESC')->paginate(5);
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $attributes = Attribute::with('values')->get();
        return view('admin.products.create',compact('categories','attributes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        // dd(session('errors')?->all(), $request->all());


        $imagePath = $request->file('image')->store('products', 'public');

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'price' => $request->price,
            'quantity'=>$request->quantity,
            'sale_price' => $request->sale_price,
        ]);

        if ($request->hasFile('galleries')) {
            foreach ($request->file('galleries') as $galleryImg) {
                $galleryPath = $galleryImg->store('products/gallery', 'public');
                ProductGallery::create([
                    'product_id' => $product->id,
                    'image' => $galleryPath
                ]);
            }
        }


        if ($request->has('variant_combinations')) {
            foreach ($request->variant_combinations as $variant) {
                $variantModel = ProductVariant::create([
                    'product_id' => $product->id,
                    'price' => $variant['price'],
                    'sale_price' => $variant['sale_price'] ?? 0,
                    'quantity' => $variant['quantity'] ?? 0,
                    'status' => $variant['status'] ?? 1,
                ]);

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
