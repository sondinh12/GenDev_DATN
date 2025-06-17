<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryMiniRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255',
            'image' => 'file|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ];
    }

    public function messages()
    {   
        return [
        'name.required' => 'Vui lòng nhập tên mini',
            'name.max' => 'Tên mini không được quá 255 ký tự',
            'image.mimes' => 'Hình ảnh phải là jpeg, png, jpg, gif hoặc webp',
            'image.max' => 'Hình ảnh không được vượt quá 2MB',
        ];
    }
}
