<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Cho phép mọi người dùng, hoặc tùy chỉnh theo quyền
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'values' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên thuộc tính không được để trống.',
            'name.string' => 'Tên thuộc tính phải là chuỗi ký tự.',
            'name.max' => 'Tên thuộc tính tối đa 255 ký tự.',
        ];
    }
}
