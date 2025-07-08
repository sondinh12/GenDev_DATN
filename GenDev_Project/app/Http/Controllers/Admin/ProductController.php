<?php

namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\AttributeRequest;
    use Illuminate\Http\Request;
    use App\Http\Requests\ProductRequest;
    use App\Models\AttributeValue;
    use App\Models\Category;
    use App\Models\CategoryMini;
    use App\Models\Attribute;
    use App\Models\Product;
    use App\Models\ProductGallery;
    use App\Models\ProductVariant;
    use App\Models\ProductVariantAttribute;
    use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::with(['category', 'categoryMini'])->orderBy('id', 'DESC')->paginate(5);
        return view('Admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $categories_mini = CategoryMini::all();
        $attributes = Attribute::with('values')->get();

        return view('Admin.products.create', compact('categories', 'attributes', 'categories_mini'));
    }

    /**
     * Lưu sản phẩm mới vào database
     * - Lưu ảnh đại diện
     * - Tạo bản ghi sản phẩm
     * - Lưu các ảnh gallery (nếu có)
     * - Lưu các biến thể sản phẩm (nếu có)
     */
    public function store(ProductRequest $request)
    {
        // Lưu ảnh đại diện sản phẩm vào thư mục storage/app/public/products
        $imagePath = $request->file('image')->store('products', 'public');

        // Tạo bản ghi sản phẩm mới
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'category_mini_id' => $request->category_mini_id,
            'image' => $imagePath,
            'price' => $request->price,
            'quantity'=>$request->quantity,
            'status'=>$request->status,
            'sale_price' => $request->sale_price,
        ]);

        // Nếu có upload nhiều ảnh gallery thì lưu từng ảnh vào bảng product_galleries
        if ($request->hasFile('galleries')) {
            foreach ($request->file('galleries') as $galleryImg) {
                $galleryPath = $galleryImg->store('products/gallery', 'public');
                ProductGallery::create([
                    'product_id' => $product->id,
                    'image' => $galleryPath
                ]);
            }
        }

        // Nếu có biến thể sản phẩm (màu, size, ...)
        if ($request->has('variant_combinations')) {
            foreach ($request->variant_combinations as $variant) {
                // Tạo bản ghi biến thể sản phẩm
                $variantModel = ProductVariant::create([
                    'product_id' => $product->id,
                    'price' => $variant['price'],
                    'sale_price' => $variant['sale_price'] ?? 0,
                    'quantity' => $variant['quantity'] ?? 0,
                    'status' => $variant['status']  ?? 1,
                ]);

                // Lấy danh sách value_id của các thuộc tính (màu, size, ...)
                // $valueIds = isset($variant['value_ids']) ? $variant['value_ids'] : [];
                $valueRaw = $variant['value_ids'] ?? [];  // có thể là chuỗi hoặc mảng
                $valueIds = is_array($valueRaw) ? $valueRaw : explode(',', $valueRaw);

                // Lưu từng thuộc tính của biến thể vào bảng product_variant_attributes
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

        // Chuyển hướng về trang danh sách sản phẩm với thông báo thành công
        return redirect()->route('products.index')->with('success', 'Tạo sản phẩm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with([
            'category',
            'categoryMini',
            'galleries',
            'variants.variantAttributes.attribute',
            'variants.variantAttributes.value'
        ])->findOrFail($id);
        return view('Admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Lấy thông tin sản phẩm, danh mục, thuộc tính và các giá trị liên quan
        $product = Product::with([

            'galleries',
            'variants.variantAttributes.attribute',
            'variants.variantAttributes.value'
        ])->findOrFail($id);
        $categories = Category::all();
        $categories_mini = CategoryMini::all();
        $attributes = Attribute::with('values')->get();
        return view('Admin.products.edit', compact('product', 'categories', 'attributes', 'categories_mini'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        // Lấy sản phẩm cần cập nhật
        $product = Product::findOrFail($id);

        // Nếu có ảnh mới thì lưu lại, không thì giữ ảnh cũ
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        // Cập nhật thông tin sản phẩm
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->category_mini_id = $request->category_mini_id;
        $product->status = $request->status;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->sale_price = $request->sale_price;
        $product->save();

        // Xử lý cập nhật gallery ảnh
        if ($request->hasFile('galleries')) {
            // Xóa ảnh gallery cũ
            ProductGallery::where('product_id', $product->id)->delete();
            // Lưu ảnh gallery mới
            foreach ($request->file('galleries') as $galleryImg) {
                $galleryPath = $galleryImg->store('products/gallery', 'public');
                ProductGallery::create([
                    'product_id' => $product->id,
                    'image' => $galleryPath
                ]);
            }
        }

        // Xử lý cập nhật biến thể sản phẩm
        if ($request->has('variant_combinations')) {
            // Xóa các biến thể cũ và thuộc tính liên quan
            $oldVariants = ProductVariant::where('product_id', $product->id)->get();
            foreach ($oldVariants as $variant) {
                ProductVariantAttribute::where('product_variant_id', $variant->id)->delete();
                $variant->delete();
            }
            // Tạo lại các biến thể mới
            foreach ($request->variant_combinations as $variant) {
                $variantModel = ProductVariant::create([
                    'product_id' => $product->id,
                    'price' => $variant['price'],
                    'sale_price' => $variant['sale_price'] ?? 0,
                    'quantity' => $variant['quantity'] ?? 0,
                    'status' => $variant['status'] ?? 1,
                ]);
                $valueRaw = $variant['value_ids'] ?? [];
                $valueIds = is_array($valueRaw) ? $valueRaw : explode(',', $valueRaw);
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

        // Chuyển hướng về trang danh sách sản phẩm với thông báo thành công
        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    /**
     * Xóa mềm sản phẩm: chỉ cập nhật trạng thái thành 2 (đã xóa)
     */
    public function trash(string $id)
    {
        $product = Product::findOrFail($id);
        // Đặt trạng thái sản phẩm thành 2 (đã xóa)
        $product->status = 2;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Xóa mềm sản phẩm thành công!');
    }
    public function restore(string $id)
    {
        $product = Product::findOrFail($id);
        // Đặt trạng thái sản phẩm thành 1 (hiển thị)
        $product->status = 1;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Khôi phục sản phẩm thành công!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        // Xóa sản phẩm và các ảnh liên quan
        $product->galleries()->delete(); // Xóa ảnh gallery
        $product->variants()->each(function ($variant) {
            $variant->variantAttributes()->delete(); // Xóa thuộc tính biến thể
            $variant->delete(); // Xóa biến thể
        });
        $product->delete(); // Xóa sản phẩm chính

        return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công!');
    }



    // Hiển thị danh sách thuộc tính
    public function allAttributes()
    {
        $attributes = Attribute::with('values')->get();
        return view('Admin.attributes.ProductsAttribute', compact('attributes'));
    }

    // Hiển thị form thêm thuộc tính
    public function createAttribute()
    {
        return view('Admin.attributes.create_attribute');
    }

    // Lưu thuộc tính mới + các value mới
    public function storeAttribute(AttributeRequest $request)
    {
        $attribute = Attribute::create([
            'name' => $request->name
        ]);

        if ($request->filled('values')) {
            $valueArr = explode(',', $request->values);
            foreach ($valueArr as $val) {
                $trimmed = trim($val);
                if (!empty($trimmed)) {
                    AttributeValue::create([
                        'attribute_id' => $attribute->id,
                        'value' => $trimmed
                    ]);
                }
            }
        }

        return redirect()->route('admin.attributes.index')->with('success', 'Thêm thuộc tính thành công!');
    }

    // Hiển thị form sửa thuộc tính + tất cả value con
    public function editAttribute($id)
    {
        $attribute = Attribute::with('values')->findOrFail($id);
        return view('Admin.attributes.edit_attribute', compact('attribute'));
    }

    // Cập nhật thuộc tính + value con cũ và thêm value con mới
    public function updateAttribute(Request $request, $id)
    {
        // Validate đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'values' => 'nullable|array',
            'values.*' => 'required|string|max:255',
            'new_values' => 'nullable|array',
            'new_values.*' => 'required|string|max:255',
        ]);

        // 1. Update tên thuộc tính cha
        $attribute = Attribute::findOrFail($id);
        $attribute->name = $request->name;
        $attribute->save();

        // 2. Update các giá trị con cũ
        if ($request->has('values')) {
            foreach ($request->values as $valueId => $val) {
                $valueModel = AttributeValue::find($valueId);
                if ($valueModel) {
                    $valueModel->value = $val;
                    $valueModel->save();
                }
            }
        }

        // 3. Thêm giá trị con mới nếu có
        if ($request->has('new_values')) {
            foreach ($request->new_values as $val) {
                if (trim($val)) {
                    AttributeValue::create([
                        'attribute_id' => $attribute->id,
                        'value' => $val,
                    ]);
                }
            }
        }

        return redirect()->route('admin.attributes.index')->with('success', 'Cập nhật thuộc tính và giá trị thành công!');
    }

    // Xóa thuộc tính + tất cả value con
    public function destroyAttribute($id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->values()->delete();
        $attribute->delete();
        return redirect()->route('admin.attributes.index')->with('success', 'Xóa thuộc tính thành công!');
    }

    // Xóa value con đơn lẻ (redirect về lại trang trước)
    public function destroyAttributeValue($id)
    {
        $value = AttributeValue::findOrFail($id);
        $value->delete();
        return redirect()->back()->with('success', 'Xóa giá trị thành công!');
    }

    public function search(Request $request)
    {
        $query = Product::query();

        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->paginate(12);

        // Lấy lại danh sách danh mục để truyền cho view nếu cần
        $categories = Category::all();

        return view('client.layout.partials.search', compact('products', 'categories'));
    }
}
