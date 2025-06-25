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
        if ($this->isMethod('post')) {
        return [
            'product_id' => 'required|exists:products,id',
            'variant_id' => 'required|exists:product_variants,id',
            'quantity'   => 'required|integer|min:1',
        ];
    }

    if ($this->isMethod('put')) {
        return [
            'quantities' => 'required|array',
            'quantities.*' => 'required|integer|min:1',
        ];
    }

    return [];
    }

    public function massages()
    {
        return [
            'product_id.required' => 'Vui lòng chọn sản phẩm.',
            'product_id.exists' => 'Sản phẩm không tồn tại trong hệ thống.',

            'variant_id.required' => 'Vui lòng chọn biến thể sản phẩm.',
            'variant_id.exists' => 'Biến thể sản phẩm không tồn tại trong hệ thống.',

            'quantity.required' => 'Vui lòng nhập số lượng.',
            'quantity.integer' => 'Số lượng phải là một số nguyên.',
            'quantity.min' => 'Số lượng tối thiểu là 1.',

            'quantities.required' => 'Không có dữ liệu cập nhật.',
            'quantities.*.integer' => 'Số lượng phải là số.',
            'quantities.*.min' => 'Số lượng ít nhất là 1.'
        ];
    }
}
