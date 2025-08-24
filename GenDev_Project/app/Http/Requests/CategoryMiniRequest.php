<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\CategoryMini;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

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
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ];
    }

    public function messages()
    {   
        return [
        'name.required' => 'Vui lòng nhập tên mini',       
            'name.max' => 'Tên mini không được quá 255 ký tự',
            'image.required' => 'Vui lòng tải lên hình ảnh',
            'image.file' => 'File tải lên phải là một tệp hợp lệ',
            'image.mimes' => 'Hình ảnh phải là jpeg, png, jpg, gif hoặc webp',
            'image.max' => 'Hình ảnh không được vượt quá 2MB',
        ];
    }

    protected function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $categoryId = $this->route('id') ?? $this->route('category_id'); // id cha từ route
            $id = $this->route('id2') ?? $this->route('mini_id'); // id của mini nếu update

            // 1. Check con trùng con (trong cùng 1 cha)
            $existsChild = CategoryMini::where('category_id', $categoryId)
                ->where('name', $this->name)
                ->when($id, fn($q) => $q->where('id', '!=', $id))
                ->exists();

            if ($existsChild) {
                $validator->errors()->add('name', 'Tên danh mục con đã tồn tại trong danh mục cha này!');
            }

            // 2. Check con trùng cha
            $existsParent = Category::where('name', $this->name)->exists();

            if ($existsParent) {
                $validator->errors()->add('name', 'Tên danh mục con không được trùng với tên danh mục cha!');
            }
        });
    }
}
