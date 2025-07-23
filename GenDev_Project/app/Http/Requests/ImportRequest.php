<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'supplier_id' => 'required|exists:suppliers,id',
            'import_date' => 'required|date',
            'products' => 'required|array|min:1',
        ];

        foreach (request('products', []) as $index => $product) {
            $prefix = "products.$index";
            $source = $product['source'] ?? null;
            $variantMode = $product['variant_usage_mode'] ?? 'old';

            $rules["$prefix.source"] = 'required|in:existing,new';

            /**
             * === Sản phẩm có sẵn ===
             */
            if ($source === 'existing') {
                $rules["$prefix.product_id"] = 'required|exists:products,id';
                $rules["$prefix.existing_supplier_import_price"] = 'nullable|numeric|min:0';

                if ($variantMode === 'new') {
                    $rules["$prefix.variants"] = 'required|array|min:1';
                    foreach ($product['variants'] ?? [] as $vIndex => $variant) {
                        $rules["$prefix.variants.$vIndex.value_ids"] = 'required|string';
                        $rules["$prefix.variants.$vIndex.price"] = 'required|numeric|min:0';
                        $rules["$prefix.variants.$vIndex.quantity"] = 'required|integer|min:1';
                        $rules["$prefix.variants.$vIndex.sale_price"] = 'nullable|numeric|min:0';
                    }
                } else {
                    $rules["$prefix.existing_price"] = 'required|numeric|min:0';
                    $rules["$prefix.existing_quantity"] = 'required|integer|min:1';
                }
            }

            /**
             * === Sản phẩm mới ===
             */
            if ($source === 'new') {
                $rules["$prefix.name"] = 'required|string';
                $rules["$prefix.type"] = 'required|in:simple,variable';

                if (($product['type'] ?? null) === 'simple') {
                    $rules["$prefix.price"] = 'required|numeric|min:0';
                    $rules["$prefix.quantity"] = 'required|integer|min:1';
                    $rules["$prefix.supplier_import_price"] = 'nullable|numeric|min:0';
                }

                if (($product['type'] ?? null) === 'variable' && !empty($product['variants'])) {
                    $rules["$prefix.variants"] = 'required|array|min:1';
                    foreach ($product['variants'] as $vIndex => $variant) {
                        $rules["$prefix.variants.$vIndex.value_ids"] = 'required|string';
                        $rules["$prefix.variants.$vIndex.price"] = 'required|numeric|min:0';
                        $rules["$prefix.variants.$vIndex.quantity"] = 'required|integer|min:1';
                        $rules["$prefix.variants.$vIndex.sale_price"] = 'nullable|numeric|min:0';
                    }
                }
            }
        }

        return $rules;
    }

    protected function prepareForValidation()
    {
        $products = $this->input('products', []);

        foreach ($products as $index => &$product) {
            $source = $product['source'] ?? null;
            $variantMode = $product['variant_usage_mode'] ?? 'old';

            if ($source === 'existing') {
                // Convert existing_* về các key chung
                if (isset($product['existing_price'])) {
                    $product['price'] = $product['existing_price'];
                }
                if (isset($product['existing_quantity'])) {
                    $product['quantity'] = $product['existing_quantity'];
                }
                if (isset($product['existing_supplier_import_price'])) {
                    $product['supplier_import_price'] = $product['existing_supplier_import_price'];
                }

                // Nếu KHÔNG tạo biến thể mới → bỏ variants
                if ($variantMode !== 'new') {
                    unset($product['variants']);
                }

                // Bỏ key của sản phẩm mới
                unset($product['name'], $product['type']);
            }

            if ($source === 'new') {
                // Bỏ key của sản phẩm có sẵn
                unset(
                    $product['product_id'],
                    $product['variant_id'],
                    $product['existing_price'],
                    $product['existing_quantity'],
                    $product['existing_supplier_import_price'],
                    $product['variant_usage_mode']
                );
            }

            $products[$index] = $product;
        }

        $this->merge(['products' => $products]);
    }

    public function messages(): array
    {
        return [
            'supplier_id.required' => 'Vui lòng chọn nhà cung cấp.',
            'import_date.required' => 'Vui lòng nhập ngày nhập hàng.',
            'products.required' => 'Cần có ít nhất một sản phẩm trong phiếu nhập.',
            'products.*.price.required' => 'Giá nhập là bắt buộc.',
            'products.*.quantity.required' => 'Số lượng là bắt buộc.',
            'products.*.name.required' => 'Tên sản phẩm mới là bắt buộc.',
            'products.*.type.required' => 'Loại sản phẩm là bắt buộc.',
            'products.*.variants.*.value_ids.required' => 'Cần chọn thuộc tính cho biến thể.',
            'products.*.variants.*.price.required' => 'Giá của biến thể là bắt buộc.',
            'products.*.variants.*.quantity.required' => 'Số lượng của biến thể là bắt buộc.',
        ];
    }
}
