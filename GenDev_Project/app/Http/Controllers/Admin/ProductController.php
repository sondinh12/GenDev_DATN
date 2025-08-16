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
use App\Models\Cartdetail;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductQuestion;
use App\Models\ProductVariant;
use App\Models\ProductVariantAttribute;
use Illuminate\Support\Facades\Auth;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with(['category', 'categoryMini'])
            ->whereNull('deleted_at');

        // Tìm kiếm theo tên sản phẩm
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Nếu muốn tìm kiếm theo danh mục, có thể mở rộng ở đây
        // if ($request->filled('category_id')) {
        //     $query->where('category_id', $request->category_id);
        // }

        $products = $query->orderBy('id', 'DESC')->paginate(5)->appends($request->all());
        $trashedCount = Product::onlyTrashed()->count();
        // Nếu muốn truyền danh sách danh mục cho select box tìm kiếm:
        // $categories = Category::all();
        // return view('Admin.products.index', compact('products', 'trashedCount', 'categories'));
        return view('Admin.products.index', compact('products', 'trashedCount'));
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
            'quantity' => $request->quantity,
            'status' => $request->status,
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

        // Cập nhật thông tin sản phẩm chung
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->category_mini_id = $request->category_mini_id;
        $product->status = $request->status;

        // Xử lý loại sản phẩm: simple hoặc variable
        $productType = $request->input('product_type', $product->variants->count() ? 'variable' : 'simple');

        if ($productType === 'simple') {
            // Nếu là sản phẩm đơn, cập nhật giá trị đơn
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->sale_price = $request->sale_price;

            // Kiểm tra nếu sản phẩm đã có trong hóa đơn hoặc đã từng nhập kho thì không cho xóa biến thể
            $hasOrder = method_exists($product, 'orderDetails') && $product->orderDetails()->count() > 0;
            $hasImport = method_exists($product, 'importDetails') && $product->importDetails()->count() > 0;
            if ($hasOrder || $hasImport) {
                return redirect()->route('products.edit', $product->id)->with('error', 'Sản phẩm đã có trong hóa đơn hoặc đã từng nhập kho, chỉ được phép thêm hoặc sửa giá biến thể, không được xóa biến thể!');
            }

            // Xóa toàn bộ biến thể và thuộc tính biến thể chỉ của sản phẩm này
            $oldVariants = ProductVariant::where('product_id', $product->id)->pluck('id');
            if ($oldVariants->count() > 0) {
                // Xóa tất cả thuộc tính của các biến thể này
                ProductVariantAttribute::whereIn('product_variant_id', $oldVariants)->delete();
                // Xóa tất cả biến thể
                ProductVariant::whereIn('id', $oldVariants)->delete();
            }
    // Nếu là sản phẩm có biến thể, kiểm tra xóa biến thể khi đã có trong hóa đơn
    // (Đoạn này áp dụng cho cả logic xóa biến thể trong phần variable bên dưới)
        } else {
            // Nếu là sản phẩm có biến thể, không cập nhật giá trị đơn
            $product->price = null;
            $product->quantity = null;
            $product->sale_price = null;

            // Xử lý cập nhật biến thể sản phẩm
            if ($request->has('variant_combinations')) {
                $oldVariants = ProductVariant::where('product_id', $product->id)->get();
                $oldVariantMap = [];
                foreach ($oldVariants as $old) {
                    $key = $old->variantAttributes->pluck('attribute_value_id')->implode(',');
                    $oldVariantMap[$key] = $old;
                }

                $handledKeys = [];
                foreach ($request->variant_combinations as $variant) {
                    $price = isset($variant['price']) ? (int)$variant['price'] : 0;
                    $sale_price = isset($variant['sale_price']) ? (int)$variant['sale_price'] : 0;
                    // Validate giá
                    if ($price < 1000 || $sale_price < 0) {
                        return redirect()->route('products.edit', $product->id)->with('error', 'Giá và giá khuyến mãi của biến thể phải lớn hơn hoặc bằng 1000.');
                    }
                    if ($sale_price > $price) {
                        return redirect()->route('products.edit', $product->id)->with('error', 'Giá khuyến mãi của biến thể không được lớn hơn giá gốc.');
                    }
                    $valueRaw = $variant['value_ids'] ?? [];
                    $valueIds = is_array($valueRaw) ? $valueRaw : explode(',', $valueRaw);
                    $key = implode(',', $valueIds);
                    $handledKeys[] = $key;
                    if (isset($oldVariantMap[$key])) {
                        // Update variant (không kiểm tra số lượng trong giỏ hàng)
                        $variantModel = $oldVariantMap[$key];
                        $variantModel->price = $price;
                        $variantModel->sale_price = $sale_price;
                        $variantModel->quantity = $variant['quantity'] ?? 0;
                        $variantModel->status = $variant['status'] ?? 1;
                        $variantModel->save();
                    } else {
                        // Create new variant
                        if (method_exists($product, 'importDetails') && $product->importDetails()->count() > 0) {
                            return redirect()->route('products.trash.list')->with('error', 'Không thể xóa sản phẩm vì đã có phiếu nhập kho!');
                        }
                        $variantModel = ProductVariant::create([
                            'product_id' => $product->id,
                            'price' => $price,
                            'sale_price' => $sale_price,
                            'quantity' => $variant['quantity'] ?? 0,
                            'status' => $variant['status'] ?? 1,
                        ]);
                        // Lưu các thuộc tính của biến thể
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
                // Xóa các biến thể không còn trong tổ hợp mới
                // Nếu sản phẩm đã có trong hóa đơn hoặc đã từng nhập kho thì không cho xóa biến thể
                $hasOrder = method_exists($product, 'orderDetails') && $product->orderDetails()->count() > 0;
                $hasImport = method_exists($product, 'importDetails') && $product->importDetails()->count() > 0;
                if ($hasOrder || $hasImport) {
                    $deletedVariants = [];
                    foreach ($oldVariantMap as $key => $oldVariant) {
                        if (!in_array($key, $handledKeys)) {
                            $deletedVariants[] = $oldVariant;
                        }
                    }
                    if (count($deletedVariants) > 0) {
                        return redirect()->route('products.edit', $product->id)->with('error', 'Sản phẩm đã có trong hóa đơn hoặc đã từng nhập kho, chỉ được phép thêm hoặc sửa giá biến thể, không được xóa biến thể!');
                    }
                } else {
                foreach ($oldVariantMap as $key => $oldVariant) {
                    if (!in_array($key, $handledKeys)) {
                        ProductVariantAttribute::where('product_variant_id', $oldVariant->id)->delete();
                        $oldVariant->delete();
                    }
                }
                }
            }
        }

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


        // Chuyển hướng về trang danh sách sản phẩm với thông báo thành công
        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    /**
     * Xóa mềm sản phẩm: chuyển vào thùng rác (set deleted_at)
     */
    public function trash(string $id)
    {
        $product = Product::findOrFail($id);
        // Không cho vào thùng rác nếu sản phẩm còn trong giỏ hàng
        $cartCount = $product->cartdetails()->count();
        if ($cartCount > 0) {
            return redirect()->route('products.index')->with('error', 'Không thể chuyển vào thùng rác vì sản phẩm còn tồn tại trong giỏ hàng của khách!');
        }
        // Không cho vào thùng rác nếu sản phẩm còn liên kết với các bảng khác
        if (method_exists($product, 'supplierProductPrices') && $product->supplierProductPrices()->count() > 0) {
            return redirect()->route('products.index')->with('error', 'Không thể chuyển vào thùng rác vì vẫn còn thông tin giá nhập từ nhà cung cấp.');
        } else if (method_exists($product, 'orderDetails') && $product->orderDetails()->count() > 0) {
            return redirect()->route('products.index')->with('error', 'Không thể chuyển vào thùng rác vì đã từng được đặt hàng.');
        } else if (method_exists($product, 'favorites') && $product->favorites()->count() > 0) {
            return redirect()->route('products.index')->with('error', 'Không thể chuyển vào thùng rác vì khách hàng còn lưu trong danh sách yêu thích.');
        } else if (method_exists($product, 'importDetails') && $product->importDetails()->count() > 0) {
            return redirect()->route('products.index')->with('error', 'Không thể chuyển vào thùng rác vì đã từng nhập kho.');
        }
        $product->delete(); // Soft delete: cập nhật deleted_at
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được chuyển vào thùng rác!');
    }

    /**
     * Khôi phục sản phẩm từ thùng rác
     */
    public function restore(string $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->route('products.trash.list')->with('success', 'Khôi phục sản phẩm thành công!');
    }

    /**
     * Xóa vĩnh viễn sản phẩm
     */
    public function destroy(string $id) 
    {
        $product = Product::onlyTrashed()->findOrFail($id);

        // Không cho xoá nếu sản phẩm còn trong giỏ hàng
        $cartCount = $product->cartdetails()->count();
        if ($cartCount > 0) {
            return redirect()->route('products.trash.list')->with('success', 'Không thể xoá vĩnh viễn sản phẩm vì còn tồn tại trong giỏ hàng của khách!');
        }

        try {
            // Kiểm tra liên kết với các bảng khác, trả về thông báo chi tiết đầu tiên gặp phải
            if (method_exists($product, 'supplierProductPrices') && $product->supplierProductPrices()->count() > 0) {
                return redirect()->route('products.trash.list')->with('error', 'Không thể xóa sản phẩm vì vẫn còn thông tin giá nhập từ nhà cung cấp.');
            } else if (method_exists($product, 'orderDetails') && $product->orderDetails()->count() > 0) {
                return redirect()->route('products.trash.list')->with('error', 'Không thể xóa sản phẩm vì đã từng được đặt hàng.');
            } else if (method_exists($product, 'favorites') && $product->favorites()->count() > 0) {
                return redirect()->route('products.trash.list')->with('error', 'Không thể xóa sản phẩm vì khách hàng còn lưu trong danh sách yêu thích.');
            } else if (method_exists($product, 'cartdetails') && $product->cartdetails()->count() > 0) {
                return redirect()->route('products.trash.list')->with('error', 'Không thể xóa sản phẩm vì vẫn còn trong giỏ hàng của khách.');
            } else if (method_exists($product, 'importDetails') && $product->importDetails()->count() > 0) {
                return redirect()->route('products.trash.list')->with('error', 'Không thể xóa sản phẩm vì đã từng nhập kho.');
            }

            // Xóa các liên kết phụ thuộc trước khi xóa sản phẩm
            $product->galleries()->delete();
            $product->variants()->each(function ($variant) {
                $variant->variantAttributes()->delete();
                $variant->delete();
            });

            $product->forceDelete();
            return redirect()->route('products.trash.list')->with('success', 'Đã xóa vĩnh viễn sản phẩm!');
        } catch (\Illuminate\Database\QueryException $e) {
            // Bắt lỗi ràng buộc toàn vẹn hoặc lỗi SQL khác, chỉ trả về thông báo chi tiết đầu tiên nếu có thể
            $msg = $e->getMessage();
            if (str_contains($msg, 'supplier_product_prices')) {
                $errorMsg = 'Không thể xóa sản phẩm vì vẫn còn thông tin giá nhập từ nhà cung cấp. ';
            } else if (str_contains($msg, 'order_details')) {
                $errorMsg = 'Không thể xóa sản phẩm vì đã từng được đặt hàng.';
            } else if (str_contains($msg, 'favorites')) {
                $errorMsg = 'Không thể xóa sản phẩm vì khách hàng còn lưu trong danh sách yêu thích.';
            } else if (str_contains($msg, 'cartdetails')) {
                $errorMsg = 'Không thể xóa sản phẩm vì vẫn còn trong giỏ hàng của khách.';
            } else if (str_contains($msg, 'import_details')) {
                $errorMsg = 'Không thể xóa sản phẩm vì đã từng nhập kho.';
            } else if (str_contains($msg, 'Integrity constraint violation')) {
                $errorMsg = 'Không thể xóa sản phẩm vì còn dữ liệu liên quan. Vui lòng kiểm tra lại các thông tin liên kết.';
            } else {
                $errorMsg = 'Không thể xóa sản phẩm do dữ liệu liên quan.';
            }
            return redirect()->route('products.trash.list')->with('error', $errorMsg);
        } catch (\Exception $e) {
            return redirect()->route('products.trash.list')->with('error', 'Đã xảy ra lỗi khi xóa sản phẩm: ' . $e->getMessage());
        }
    }



    // Hiển thị danh sách thuộc tính
    public function allAttributes(Request $request)
    {
        $query = Attribute::with('values')->where('status', 1);

        // Xử lý tìm kiếm
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%')
                  ->orWhereHas('values', function ($q) use ($keyword) {
                      $q->where('value', 'like', '%' . $keyword . '%');
                  });
            });
        }

        $attributes = $query->get();
        $trashCount = Attribute::where('status', 2)->count();
        return view('Admin.attributes.ProductsAttribute', compact('attributes', 'trashCount'));
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
            'delete_values' => 'nullable|array',
            'delete_values.*' => 'required|exists:attribute_values,id',
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

        // 4. Xóa các giá trị con được đánh dấu
        if ($request->has('delete_values')) {
            foreach ($request->delete_values as $valueId) {
                // Kiểm tra xem giá trị có đang được sử dụng trong product_variant_attributes
                $isUsed = ProductVariantAttribute::where('attribute_value_id', $valueId)->exists();
                if ($isUsed) {
                    $valueName = htmlspecialchars_decode(AttributeValue::find($valueId)->value); // Giải mã HTML
                    return redirect()->back()->withInput()->withErrors([
                        'delete_values' => "Không thể xóa giá trị thuộc tính $valueName vì đang được sử dụng trong sản phẩm!"
                    ]);
                }
                AttributeValue::where('id', $valueId)->delete();
            }
        }

        return redirect()->route('admin.attributes.index')->with('success', 'Cập nhật thuộc tính và giá trị thành công!');
    }
    public function trashAttribute($id)
    {
        $attribute = Attribute::findOrFail($id);
        $isUsed = ProductVariantAttribute::where('attribute_id', $id)->exists();
        if ($isUsed) {
            return redirect()->route('admin.attributes.index')
                ->with('error', 'Không thể đưa thuộc tính vào thùng rác vì đã được sử dụng trong sản phẩm!');
        }
        $attribute->status = 2; // đánh dấu là đã xóa
        $attribute->save();

        return redirect()->route('admin.attributes.index')->with('success', 'Đã đưa thuộc tính vào thùng rác!');
    }


    public function restoreAttribute($id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->status = 1; // khôi phục
        $attribute->save();

        return redirect()->route('admin.attributes.index')->with('success', 'Đã khôi phục thuộc tính!');
    }


    public function listTrashed()
    {
        $products = Product::onlyTrashed()->with(['category', 'categoryMini'])->paginate(5);
        return view('Admin.products.trash', compact('products'));
    }
    public function trashList()
    {
        $attributes = Attribute::with('values')->where('status', 2)->get();
        return view('Admin.attributes.trash', compact('attributes'));
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

        public function forceDeleteAttribute($id)

    {
        $attribute = Attribute::with('values')->findOrFail($id);
        $attribute->values()->delete(); // Xóa các value con
        $attribute->delete(); // Xóa chính nó

        return redirect()->route('admin.attributes.trashList')->with('success', 'Đã xóa vĩnh viễn thuộc tính!');
    }
    public function storeQuestion(Request $request, Product $product)
    {
        $request->validate([
            'question' => 'required|string|max:200',
        ]);

        $user = Auth::user();
        if ($user && $user->is_banned) {
            Auth::logout();
            return redirect()->route('login')->withErrors(['Tài khoản của bạn đã bị khóa.']);
        }

        ProductQuestion::create([
            'product_id' => $product->id,
            'user_id' => $user->id,
            'question' => $request->question,
        ]);

        return redirect()->route('product.show', $product->id)->with('success', 'Câu hỏi của bạn đã được gửi!');
    }
}