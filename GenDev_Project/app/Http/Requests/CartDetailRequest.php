<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartDetailRequest extends FormRequest
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
        $rules = [];
        if ($this->isMethod('post')) {
            $rules = [
                'product_id' => 'required|exists:products,id',
                'quantity'   => 'required|integer|min:1',
            ];
            if ($this->has('attribute')) {
                $rules['attribute'] = 'nullable|array';
                $rules['attribute.*'] = 'exists:attribute_values,id';
            }

            return $rules;
        }

        if ($this->isMethod('put')) {
            return [
                'quantities' => 'required|array',
                'quantities.*' => 'required|integer|min:1',
            ];
        }

        return [];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'Vui lòng chọn sản phẩm.',
            'product_id.exists' => 'Sản phẩm không tồn tại trong hệ thống.',
            'quantity.required' => 'Vui lòng nhập số lượng.',
            'quantity.integer' => 'Số lượng phải là một số nguyên.',
            'quantity.min' => 'Số lượng tối thiểu là 1.',
            'quantities.required' => 'Không có dữ liệu cập nhật.',
            'quantities.*.integer' => 'Số lượng phải là số.',
            'quantities.*.min' => 'Số lượng ít nhất là 1.',
            'attribute.array' => 'Dữ liệu thuộc tính không hợp lệ.',
            'attribute.*.exists' => 'Giá trị thuộc tính không hợp lệ.',
        ];
    }
}
