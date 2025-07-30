<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'name'=>'required|max:255|string',
            'email'=>'required|email',
            'phone' => 'required|regex:/^0[0-9]{9}$/',
            'address.*'=>'required|max:255|string',
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập tên',
            'name.max'=>'Vượt quá số ký tự cho phép',
            'name.string'=>'Phải là 1 chuỗi ký tự',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.regex'=>'Sai định dạng, vui lòng nhập lại',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Chưa đúng định dạng email',
            'address.required'=>'Vui lòng nhập địa chỉ',
            'address.max'=>'Vượt quá số ký tự cho phép',
            'address.string'=>'Phải là 1 chuỗi ký tự',
        ];
    }
}
