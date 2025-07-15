<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePostCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Chỉ cần user đã đăng nhập là được phép cập nhật danh mục
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                // Loại trừ chính nó khi kiểm tra unique
                'unique:post_categories,name,' . $this->route('post_category'),
                'regex:/^[^<>]+$/',
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống.',
            'name.unique' => 'Tên danh mục đã tồn tại.',
            'name.max' => 'Tên danh mục tối đa 255 ký tự.',
            'name.regex' => 'Tên danh mục không được chứa ký tự đặc biệt.',
        ];
    }
}
