<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // dd($this->all());
        $rules = [
            'supplier_id' => 'required|exists:suppliers,id',
            'import_date' => 'required|date',
            'products' => 'required|array|min:1',
        ];

        foreach ($this->input('products', []) as $index => $product) {
            $prefix = "products.$index";
            $source = $product['source'] ?? null;

            $rules["$prefix.source"] = 'required|in:existing,new';

            if (!empty($product['id'])) {
                $rules["$prefix.id"] = 'integer|exists:import_details,id';
            }

            /**
             * ========== SẢN PHẨM CÓ SẴN ==========
             */
            if ($source === 'existing') {
                $rules["$prefix.product_id"] = 'required|exists:products,id';
                $rules["$prefix.existing_price"] = 'required|numeric|min:0';
                $rules["$prefix.existing_quantity"] = 'required|integer|min:1';
                $rules["$prefix.existing_supplier_import_price"] = 'nullable|numeric|min:0';
            }

            /**
             * ========== SẢN PHẨM MỚI ==========
             */
            if ($source === 'new') {
                $rules["$prefix.name"] = 'required|string';
                $rules["$prefix.price"] = 'required|numeric|min:0';
                $rules["$prefix.quantity"] = 'required|integer|min:1';
                $rules["$prefix.supplier_import_price"] = 'nullable|numeric|min:0';

                if (!empty($product['variant_data'])) {
                    $rules["$prefix.variant_data"] = 'array';
                    foreach ($product['variant_data'] as $vIndex => $variant) {
                        $rules["$prefix.variant_data.$vIndex"] = 'string'; // dạng JSON string
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

            if ($source === 'existing') {
                // Chuẩn hóa lại dữ liệu cho controller
                $product['price'] = $product['existing_price'] ?? null;
                $product['quantity'] = $product['existing_quantity'] ?? null;
                $product['supplier_import_price'] = $product['existing_supplier_import_price'] ?? null;

                // Xóa các field không dùng của sản phẩm mới
                unset(
                    $product['name'],
                    $product['type'],
                    $product['variants']
                );
            }

            if ($source === 'new') {
                // Xóa các field không dùng của sản phẩm có sẵn
                unset(
                    $product['product_id'],
                    $product['variant_id'],
                    $product['existing_price'],
                    $product['existing_quantity'],
                    $product['existing_supplier_import_price'],
                    $product['variant_usage_mode']
                );
                
    // ✅ Sửa lỗi: nếu để chuỗi rỗng thì Laravel không coi là null
    if (array_key_exists('supplier_import_price', $product) && $product['supplier_import_price'] === '') {
        $product['supplier_import_price'] = null;
    }
            }

            $products[$index] = $product;
        }

        $this->merge(['products' => $products]);
    }

    public function messages(): array
    {
        return [
            'supplier_id.required' => 'Vui lòng chọn nhà cung cấp.',
            'import_date.required' => 'Vui lòng chọn ngày nhập.',
            'products.required' => 'Cần có ít nhất một sản phẩm.',

            // Existing
            'products.*.product_id.required' => 'Sản phẩm là bắt buộc.',
            'products.*.existing_price.required' => 'Giá nhập là bắt buộc.',
            'products.*.existing_quantity.required' => 'Số lượng là bắt buộc.',

            // New
            'products.*.name.required' => 'Tên sản phẩm mới là bắt buộc.',
            'products.*.price.required' => 'Giá là bắt buộc.',
            'products.*.quantity.required' => 'Số lượng là bắt buộc.',
        ];
    }
}
