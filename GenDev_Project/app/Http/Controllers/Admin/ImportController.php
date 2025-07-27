<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportRequest;
use App\Http\Requests\UpdateImportRequest;
use App\Models\Attribute;
use App\Models\Import;

use App\Models\ImportDetail;
use App\Models\ImportLog;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantAttribute;
use App\Models\Supplier;
use App\Models\SupplierProductPrice;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use App\Exports\ImportExport;
use Maatwebsite\Excel\Facades\Excel;

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
        $logs = ImportLog::with('user')->where('import_id', $dtImport->id)->latest()->get();
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
                            'status' => 0
                        ]);

                        $detail->product_id = $product->id;
                        $detail->save();
                    }

                    if ($product) {
                        if (!$detail->variant_id && !$detail->variant_data) {
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
                                    // $variant->price = $detail->import_price;
                                    $variant->save();
                                }
                            } elseif ($detail->variant_data) {
                                // 👉 Tạo mới biến thể từ variant_data
                                $variant = ProductVariant::create([
                                    'product_id' => $product->id,
                                    'quantity' => $detail->quantity,
                                    'price' => $detail->import_price,
                                    // 'status'=> 0
                                ]);

                                foreach ($detail->variant_data as $v) {
                                    ProductVariantAttribute::create([
                                        'product_variant_id' => $variant->id,
                                        'attribute_value_id' => $v['value_id'],
                                        'attribute_id' => $v['attribute_id'],
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


        return view('Admin.imports.show', compact('dtImport', 'logs'));
    }

    public function edit($id)
    {
        $import = Import::with([
            'details',
            'details.variant.variantAttributes.attribute',
            'details.variant.variantAttributes.value',
            'details.product',
            'supplier',
            'supplier.productPrices'
        ])->findOrFail($id);

        $import->import_date = Carbon::parse($import->import_date);

        $suppliers = Supplier::all();
        $attributes = Attribute::with('values')->get();
        $existingProducts = Product::all();

        // Dữ liệu chi tiết để load lại vào form
        $preloadDetails = $import->details->map(function ($detail) use ($import) {
            // Tìm giá lịch sử từ nhà cung cấp
            $matchedPrice = $import->supplier->productPrices
                ->where('product_id', $detail->product_id)
                ->filter(function ($price) use ($import) {
                    return $price->start_date <= $import->import_date &&
                        (is_null($price->end_date) || $price->end_date >= $import->import_date);
                })
                ->sortByDesc('start_date')
                ->first();

            // Chuẩn bị variant_data nếu là sản phẩm có sẵn và có variant thực tế
            $variantData = null;
            if ($detail->variant && $detail->variant->variantAttributes->count()) {
                $variantData = $detail->variant->variantAttributes->map(function ($attr) {
                    return [
                        'attribute' => $attr->attribute->name ?? '',
                        'attribute_id' => $attr->attribute->id ?? '',
                        'value' => $attr->value->value ?? '',
                        'value_id' => $attr->value->id ?? '',
                    ];
                })->toArray();
            } elseif (is_array($detail->variant_data)) {
                $variantData = $detail->variant_data;
            }

            return [
                'id' => $detail->id,
                'product_id' => $detail->product_id,
                'variant_id' => $detail->variant_id,
                'name' => $detail->product_temp_name ?? '',
                'type' => $variantData ? 'variant' : 'simple',
                'price' => $detail->import_price,
                'quantity' => $detail->quantity,
                'supplier_import_price' => $matchedPrice?->import_price ?? null,
                'variant_data' => $variantData,
            ];
        });

        return view('Admin.imports.edit', compact(
            'import',
            'suppliers',
            'attributes',
            'existingProducts',
            'preloadDetails'
        ));
    }




    public function update(UpdateImportRequest $request, $id)
{
    DB::beginTransaction();

    try {
        $import = Import::findOrFail($id);
        $import->supplier_id = $request->supplier_id;
        $import->import_date = \Carbon\Carbon::parse($request->import_date);
        $import->note = $request->note;
        $import->save();

        $existingDetailIds = $import->details->pluck('id')->toArray();
        $updatedDetailIds = [];
        $totalCost = 0;

        foreach ($request->products as $item) {
            if (!empty($item['id'])) {
                $detail = ImportDetail::find($item['id']);
                if (!$detail) continue;
            } else {
                $detail = new ImportDetail();
                $detail->import_id = $import->id;
            }

            $source = $item['source'] ?? 'existing';
            $detail->variant_id = $item['variant_id'] ?? null;
            $detail->product_temp_name = $item['product_temp_name'] ?? ($item['name'] ?? null);

            if ($source === 'existing') {
                $detail->product_id = $item['product_id'] ?? null;
                $detail->import_price = $item['existing_price'] ?? 0;
                $detail->quantity = $item['existing_quantity'] ?? 0;

                // 💡 Cập nhật hoặc thêm giá nhập nhà cung cấp
                if (!empty($item['supplier_import_price']) && !empty($item['product_id'])) {
                    SupplierProductPrice::updateOrCreate(
                        [
                            'supplier_id' => $request->supplier_id,
                            'product_id' => $item['product_id'],
                        ],
                        [
                            'import_price' => $item['supplier_import_price'],
                            'start_date' => $request->import_date,
                        ]
                    );
                }
            } else {
                // Sản phẩm mới (chưa có product_id)
                $detail->product_id = null;
                $detail->import_price = $item['price'] ?? 0;
                $detail->quantity = $item['quantity'] ?? 0;

                // 💡 Lưu giá nhập nhà cung cấp nếu có (dù product_id là null → chưa có Product)
                if (!empty($item['supplier_import_price'])) {
                    SupplierProductPrice::create([
                        'supplier_id' => $request->supplier_id,
                        'product_id' => null, // sản phẩm mới, chưa tồn tại
                        'import_price' => $item['supplier_import_price'],
                        'start_date' => $request->import_date,
                    ]);
                }
            }

            $detail->subtotal = $detail->import_price * $detail->quantity;

            // Giải mã variant_data nếu có
            $detail->variant_data = collect($item['variant_data'] ?? [])
                ->map(function ($v) {
                    if (is_string($v)) {
                        $decoded = json_decode($v, true);
                        return is_array($decoded) ? $decoded : null;
                    }
                    return is_array($v) ? $v : null;
                })
                ->filter()
                ->values()
                ->toArray();

            $detail->save();
            $updatedDetailIds[] = $detail->id;
            $totalCost += $detail->subtotal;
        }

        // Xoá chi tiết không còn tồn tại
        $toDelete = array_diff($existingDetailIds, $updatedDetailIds);
        ImportDetail::whereIn('id', $toDelete)->delete();

        // Cập nhật tổng tiền
        $import->update(['total_cost' => $totalCost]);

        // Ghi log thay đổi nếu có
        $changes = [];
        if ($import->wasChanged()) {
            $changes['import'] = $import->getChanges();
        }

        foreach ($import->details as $detail) {
            if ($detail->wasChanged()) {
                $changes['details'][] = [
                    'id' => $detail->id,
                    'changes' => $detail->getChanges(),
                ];
            }
        }

        if (!empty($changes)) {
            ImportLog::create([
                'import_id' => $import->id,
                'user_id' => auth()->id(),
                'changes' => json_encode($changes, JSON_UNESCAPED_UNICODE),
            ]);
        }

        DB::commit();
        return redirect()->route('admin.imports.index')->with('success', 'Cập nhật phiếu nhập thành công!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Lỗi cập nhật: ' . $e->getMessage());
    }
}


    public function destroy($id)
    {
        $import = Import::findOrFail($id);

        if ($import->status == 1) {
            return redirect()->back()->with('error', 'Không thể xóa phiếu đã xác nhận.');
        }

        $import->delete();
        return redirect()->route('admin.imports.index')->with('success', 'Phiếu nhập đã được đưa vào thùng rác.');
    }

    public function trash()
    {
        $imports = Import::onlyTrashed()->get();
        return view('Admin.imports.trash', compact('imports'));
    }

    public function restore($id)
    {
        $import = Import::onlyTrashed()->findOrFail($id);
        $import->restore();

        return redirect()->route('admin.imports.trash')->with('success', 'Khôi phục thành công!');
    }

    public function forceDelete($id)
    {
        $import = Import::onlyTrashed()->findOrFail($id);
        $import->forceDelete();

        return redirect()->route('admin.imports.trash')->with('success', 'Xóa vĩnh viễn thành công!');
    }


    public function export($id)
    {
        $import = Import::with([
            'details.product',
            'details.variant.variantAttributes.attribute',
            'details.variant.variantAttributes.value'
        ])->findOrFail($id);

        $fileName = 'phieu-nhap-' . $import->id . '.xlsx';
        return Excel::download(new ImportExport($import), $fileName);
    }
}
