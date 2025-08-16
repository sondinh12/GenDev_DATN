<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\CategoryMini;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

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
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.string' => 'Tên phải là một chuỗi kí tự',
            'name.max' => 'Tối đa 255 ký tự',
            'image.required' => 'Vui lòng tải lên hình ảnh',
            'image.file' => 'File tải lên phải là một tệp hợp lệ.',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif hoặc webp.',
            'image.max' => 'Dung lượng ảnh không được vượt quá 2MB.',
        ];
    }

    protected function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $id = $this->route('id'); // nếu là update thì lấy id hiện tại

            // 1. Check cha trùng cha
            $existsParent = Category  ::where('name', $this->name)
                ->when($id, fn($q) => $q->where('id', '!=', $id)) // bỏ qua chính nó khi update
                ->exists();

            if ($existsParent) {
                $validator->errors()->add('name', 'Tên danh mục cha đã tồn tại!');
            }

            // 2. Check cha trùng con
            $existsMini = CategoryMini::where('name', $this->name)->exists();

            if ($existsMini) {
                $validator->errors()->add('name', 'Tên danh mục cha không được trùng với tên danh mục con!');
            }
        });
    }
}
