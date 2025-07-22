<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportRequest;
use App\Models\Attribute;
use App\Models\Import;

use App\Models\ImportDetail;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantAttribute;
use App\Models\Supplier;
use App\Models\SupplierProductPrice;
use DB;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function index()
    {
        $imports = Import::with('supplier')->orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.imports.index', compact('imports'));
    }

    public function create()
    {
        $attributes = Attribute::with('values')->get();
        $suppliers = Supplier::all();
        $existingProducts = Product::all();
        return view('Admin.imports.create', compact('attributes', 'suppliers', 'existingProducts'));
    }

    public function store(ImportRequest $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
            $import = Import::create([
                'supplier_id' => $request->supplier_id,
                'import_date' => $request->import_date,
                'note' => $request->note,
                'status' => 0,
                'total_cost' => 0,
            ]);

            $totalCost = 0;

            foreach ($request->products as $item) {
                $productId = null;

                /**
                 * ======== SẢN PHẨM CÓ SẴN ========
                 */
                if ($item['source'] === 'existing') {
                    $product = Product::findOrFail($item['product_id']);
                    $productId = $product->id;


                    if (($item['variant_usage_mode'] ?? null) === 'new' && isset($item['variants'])) {
                        foreach ($item['variants'] as $variantData) {
                            $variantValues = [];

                            if (!empty($variantData['value_ids'])) {
                                $valueIds = explode(',', $variantData['value_ids']);

                                // Lấy thông tin thuộc tính & giá trị
                                $values = \App\Models\AttributeValue::with('attribute')
                                    ->whereIn('id', $valueIds)
                                    ->get();

                                foreach ($values as $val) {
                                    $variantValues[] = [
                                        'attribute_id' => $val->attribute_id,
                                        'attribute' => $val->attribute->name,
                                        'value_id' => $val->id,
                                        'value' => $val->value,
                                    ];
                                }
                            }

                            // Lưu vào import_details mà không tạo variant thật
                            ImportDetail::create([
                                'import_id' => $import->id,
                                'product_id' => $productId,
                                'variant_id' => null, // chưa có biến thể thật
                                'product_temp_name' => $product->name,
                                'variant_data' => $variantValues,
                                'quantity' => $variantData['quantity'],
                                'import_price' => $variantData['price'],
                                'subtotal' => $variantData['price'] * $variantData['quantity'],
                            ]);

                            $totalCost += $variantData['price'] * $variantData['quantity'];
                        }
                        if (!empty($item['supplier_import_price'])) {
                            SupplierProductPrice::create([
                                'supplier_id' => $request->supplier_id,
                                'product_id' => $productId,
                                'import_price' => $item['supplier_import_price'],
                                'start_date' => $request->import_date,
                            ]);
                        }

                        continue; // Skip phần xử lý phía dưới (không xử lý biến thể cũ)
                    }


                    // Dùng biến thể cũ hoặc không có biến thể
                    $variantId = $item['variant_id'] ?? null;
                    $price = $item['price'];
                    $quantity = $item['quantity'];
                    $subtotal = $price * $quantity;

                    ImportDetail::create([
                        'import_id' => $import->id,
                        'product_id' => $productId,
                        'variant_id' => $variantId,
                        'product_temp_name' => $product->name,
                        'variant_data' => null,
                        'quantity' => $quantity,
                        'import_price' => $price,
                        'subtotal' => $subtotal,
                    ]);

                    $totalCost += $subtotal;

                    // Lưu lịch sử giá nếu có
                    if (!empty($item['supplier_import_price'])) {
                        SupplierProductPrice::create([
                            'supplier_id' => $request->supplier_id,
                            'product_id' => $productId,
                            'import_price' => $item['supplier_import_price'],
                            'start_date' => $request->import_date,
                        ]);
                    }
                }

                /**
                 * ======== SẢN PHẨM MỚI ========
                 */ elseif ($item['source'] === 'new') {
                    $productId = null;

                    // Biến thể (tạm)
                    if ($item['type'] === 'variable' && isset($item['variants'])) {
                        foreach ($item['variants'] as $variantData) {
                            $variantValues = [];

                            if (!empty($variantData['value_ids'])) {
                                $valueIds = explode(',', $variantData['value_ids']);
                                $values = \App\Models\AttributeValue::with('attribute')
                                    ->whereIn('id', $valueIds)->get();

                                foreach ($values as $val) {
                                    $variantValues[] = [
                                        'attribute_id' => $val->attribute_id,
                                        'attribute' => $val->attribute->name,
                                        'value' => $val->value,
                                        'value_id' => $val->id,
                                    ];
                                }
                            }

                            ImportDetail::create([
                                'import_id' => $import->id,
                                'product_id' => null,
                                'variant_id' => null,
                                'product_temp_name' => $item['name'],
                                'variant_data' => $variantValues,
                                'quantity' => $variantData['quantity'],
                                'import_price' => $variantData['price'],
                                'subtotal' => $variantData['price'] * $variantData['quantity'],
                            ]);

                            $totalCost += $variantData['price'] * $variantData['quantity'];
                        }

                        continue;
                    }

                    // Sản phẩm đơn giản (không có biến thể)
                    $price = $item['price'];
                    $quantity = $item['quantity'];
                    $subtotal = $price * $quantity;

                    ImportDetail::create([
                        'import_id' => $import->id,
                        'product_id' => null,
                        'variant_id' => null,
                        'product_temp_name' => $item['name'],
                        'variant_data' => null,
                        'quantity' => $quantity,
                        'import_price' => $price,
                        'subtotal' => $subtotal,
                    ]);

                    $totalCost += $subtotal;

                    if (!empty($item['supplier_import_price'])) {
                        SupplierProductPrice::create([
                            'supplier_id' => $request->supplier_id,
                            'product_id' => null,
                            'import_price' => $item['supplier_import_price'],
                            'start_date' => $request->import_date,
                        ]);
                    }
                }
            }

            $import->update(['total_cost' => $totalCost]);

            DB::commit();
            return redirect()->route('admin.imports.index')->with('success', 'Tạo phiếu nhập thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Lỗi: ' . $e->getMessage());
        }
    }




    public function show(string $id, Request $request)
    {
        $dtImport = Import::with([
            'supplier',
            'details',
            'details.product',
            'supplier.productPrices'
        ])->where('id', $id)->first();
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'status' => 'required|in:0,1',
            ]);

            $dtImport->status = $validated['status'];
            $dtImport->save();

            // 👉 Chỉ xử lý khi chuyển trạng thái sang "Đã duyệt"
            if ($dtImport->status == 1) {
                foreach ($dtImport->details as $detail) {
                    $product = $detail->product;

                    // ✅ Tạo mới sản phẩm nếu chưa tồn tại
                    if (!$product && $detail->product_temp_name) {
                        $product = Product::create([
                            'name' => $detail->product_temp_name,
                            'quantity' => $detail->variant_data ? 0 : $detail->quantity,
                            'price' => !$detail->variant_data ? $detail->import_price : null,
                        ]);

                        $detail->product_id = $product->id;
                        $detail->save();
                    }

                    if ($product) {
                        if ($product) {
                            // ✅ Sản phẩm đơn giản → tăng số lượng
                            $product->quantity = (int) $product->quantity + (int) $detail->quantity;
                            $product->save();
                        } else {
                            // ✅ Sản phẩm có biến thể
                            if ($detail->variant_id) {
                                // 👉 Nếu đã có biến thể → cập nhật số lượng và giá
                                $variant = ProductVariant::find($detail->variant_id);
                                if ($variant) {
                                    $variant->quantity += $detail->quantity;
                                    $variant->price = $detail->import_price;
                                    $variant->save();
                                }
                            } elseif ($detail->variant_data) {
                                // 👉 Tạo mới biến thể từ variant_data
                                $variant = ProductVariant::create([
                                    'product_id' => $product->id,
                                    'quantity' => $detail->quantity,
                                    'price' => $detail->import_price,
                                ]);

                                foreach ($detail->variant_data as $v) {
                                    ProductVariantAttribute::create([
                                        'product_variant_id' => $variant->id,
                                        'attribute_value_id' => $v['value_id'],
                                        'attribute_id' => $v['attribute_id'], // ✅ THÊM attribute_id đầy đủ
                                    ]);
                                }

                                // Gán lại variant_id cho chi tiết đơn nhập
                                $detail->variant_id = $variant->id;
                                $detail->save();
                            }
                        }
                    }
                }
            }

            return redirect()->route('admin.imports.show', $id)->with('success', 'Cập nhật trạng thái thành công!');
        }


        return view('Admin.imports.show', compact('dtImport'));
    }

    public function edit(string $id)
    {
        $import = Import::with([
            'details.variant.variantAttributes.attribute',
            'details.product',
            'supplier',
            'details'
        ])->findOrFail($id);

        // Chỉ cho phép sửa khi chưa xác nhận
        if ($import->status == 1) {
            return redirect()->back()->with('error', 'Không thể sửa phiếu nhập đã xác nhận.');
        }

        $suppliers = Supplier::all();
        $attributes = Attribute::with('values')->get();
        $existingProducts = Product::with(['variants.variantAttributes.attribute'])->get();

        return view('Admin.imports.edit', compact(
            'import',
            'suppliers',
            'attributes',
            'existingProducts'
        ));
    }


    public function update(ImportRequest $request)
    {

    }

    public function destroy()
    {

    }
}
