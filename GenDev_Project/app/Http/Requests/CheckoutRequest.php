<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name'=>'required|max:255',
            'city'=>'required|max:255',
            'ward'=>'required|max:255',
            'postcode'=>'required|max:255',
            'address'=>'required|max:255',
            'phone'=>'required|regex:/^0[0-9]{9}$/',
            'email'=>'required|email'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập họ và tên',
            'name.max'=>'Tối đa 255 kí tự',
            'city.required'=>'Vui lòng nhập tên thành phố',
            'city.max'=>'Tối đa 255 kí tự',
            'ward.required'=>'Vui lòng nhập tên phường xã',
            'ward.max'=>'Tối đa 255 kí tự',
            'postcode.required'=>'Vui lòng nhập mã code',
            'postcode.max'=>'Tối đa 255 kí tự',
            'address.required'=>'Vui lòng nhập địa chỉ chi tiết',
            'address.max'=>'Tối đa 255 kí tự',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.regex'=>'Sai định dạng, vui lòng nhập lại',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Chưa đúng định dạng email',
        ];
    }
}
