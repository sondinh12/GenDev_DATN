<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        'name.required' => 'Vui lòng nhập tên',
        'name.string' => 'Tên phải là một chuỗi kí tự',
        'name.max' => 'Tối đa 255 ký tự',
        'image.file' => 'File tải lên phải là một tệp hợp lệ.',
        'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif hoặc webp.',
        'image.max' => 'Dung lượng ảnh không được vượt quá 2MB.',
        ];
    }
}
