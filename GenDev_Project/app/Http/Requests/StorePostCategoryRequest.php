<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePostCategoryRequest extends FormRequest
{
    /**
     * Xác thực quyền tạo danh mục (có thể sửa lại theo phân quyền thực tế).
     */
    public function authorize(): bool
    {
        // Chỉ cần user đã đăng nhập là được phép tạo danh mục
        return Auth::check();
    }

    /**
     * Quy tắc validate cho việc tạo danh mục.
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:post_categories,name',
                'regex:/^[^<>]+$/', // Không cho phép ký tự HTML đặc biệt
            ],
        ];
    }

    /**
     * Thông báo lỗi tuỳ chỉnh.
     */
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