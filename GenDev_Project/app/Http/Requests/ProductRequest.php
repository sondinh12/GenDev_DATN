<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class ProductRequest extends FormRequest
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
        $rules=  [
            'name'=>'required|max:255|string',


            // 'price'=>'required|integer|min:1',
            // 'quantity'=>'required|integer|min:1',
            'description'=>'required',

            'image' => 'file|image',
            'galleries.*'=>'nullable|image',
            'category_id'=>'required|exists:categories,id', 
            'status'=>'required',
            'variant_combinations' => 'nullable|array',
        ];  

        if ($this->input('product_type') === 'simple') {
            $rules['price'] = 'required|numeric|min:0';
            $rules['sale_price'] = 'nullable|numeric|min:0';
            $rules['quantity'] = 'required|integer|min:0';
        } elseif ($this->input('product_type') === 'variable') {
            $rules['variant_combinations'] = 'required|array|min:1';
            $rules['variant_combinations.*.price'] = 'required|numeric|min:0';
            $rules['variant_combinations.*.sale_price'] = 'nullable|numeric|min:0';
            $rules['variant_combinations.*.quantity'] = 'required|integer|min:0';
            $rules['variant_combinations.*.value_ids'] = 'required|string';
        }

        return $rules;
    }

    public function messages(){
        return [
            'name.required'=>'Tên sản phẩm không được bỏ trống',
            'name.max'=>'Tên chỉ giới hạn 255 kí tự',
            'name.string'=>'Tên phải là chuỗi kí tự',
            'price.required'=>'Giá không được bỏ trống',
            'price.integer'=>'Giá phải là 1 số nguyên',
            'price.min'=>'Giá phải là 1 số nguyên > 0',
            'quantity.required'=>'Số lượng không được bỏ trống',
            'quantity.integer'=>'Số lượng phải là số nguyên',
            'quantity.min'=>'Số lượng phải là số nguyên > 0',
            'image.mimes'=>'Ảnh phải có định dạng JPG,PNG',
            'image.file'=>'Tệp tải lên phải là 1 file hợp lệ',
            'image.max'=>'Dung lượng không vượt quá 2MB',
            'category_id.required'=>'Danh mục không được bỏ trống',
            'status.required'=>'Trạng thái không được bỏ trống',
            'description.required'=>'Mô tả không được bỏ trống',
        ];
    }
}
