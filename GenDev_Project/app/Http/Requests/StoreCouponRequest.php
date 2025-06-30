<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // ✔ Cho phép thực hiện request
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
            'coupon_code' => 'required|string|max:20|unique:coupons,coupon_code',
            'discount_type' => 'required|in:percent,fixed',
            'discount_amount' => [
                'required',
                'numeric',
                'min:0.01',
                function ($attribute, $value, $fail) {
                    if (request('discount_type') === 'percent' && $value > 100) {
                        $fail('Giảm giá theo phần trăm không được vượt quá 100%.');
                    }
                }
            ],
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'quantity' => 'required|integer|min:1|max:10000',
            'status' => 'required|boolean',
            'min_coupon' => 'nullable|numeric|min:0',
            'max_coupon' => 'nullable|numeric|min:0|gte:discount_amount',
            'usage_limit' => 'nullable|integer|min:1',
            'per_use_limit' => 'nullable|integer|min:1|lte:usage_limit',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên mã giảm giá.',
            'name.max' => 'Tên mã giảm giá không được quá 255 ký tự.',

            'coupon_code.required' => 'Vui lòng nhập mã code.',
            'coupon_code.unique' => 'Mã code này đã tồn tại.',
            'coupon_code.max' => 'Mã code không được dài quá 20 ký tự.',

            'discount_type.required' => 'Vui lòng chọn loại giảm giá.',
            'discount_type.in' => 'Loại giảm giá không hợp lệ.',

            'discount_amount.required' => 'Vui lòng nhập giá trị giảm.',
            'discount_amount.numeric' => 'Giá trị giảm phải là số.',
            'discount_amount.min' => 'Giá trị giảm phải lớn hơn 0.',

            'start_date.required' => 'Vui lòng chọn ngày bắt đầu.',
            'start_date.date' => 'Ngày bắt đầu không hợp lệ.',

            'end_date.required' => 'Vui lòng chọn ngày kết thúc.',
            'end_date.date' => 'Ngày kết thúc không hợp lệ.',
            'end_date.after' => 'Ngày kết thúc phải sau ngày bắt đầu.',

            'quantity.required' => 'Vui lòng nhập số lượng.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
            'quantity.min' => 'Số lượng tối thiểu là 1.',
            'quantity.max' => 'Số lượng tối đa là 10000.',

            'status.required' => 'Vui lòng chọn trạng thái.',
            'status.boolean' => 'Trạng thái không hợp lệ.',

            'min_coupon.numeric' => 'Giá trị tối thiểu đơn hàng phải là số.',
            'min_coupon.min' => 'Giá trị tối thiểu đơn hàng không được âm.',

            'max_coupon.numeric' => 'Giá trị tối đa giảm phải là số.',
            'max_coupon.min' => 'Giá trị giảm tối đa không được âm.',
            'max_coupon.gte' => 'Giá trị giảm tối đa phải lớn hơn hoặc bằng giá trị giảm.',

            'usage_limit.integer' => 'Giới hạn sử dụng phải là số nguyên.',
            'usage_limit.min' => 'Giới hạn sử dụng phải ít nhất là 1.',

            'per_use_limit.integer' => 'Giới hạn mỗi người dùng phải là số nguyên.',
            'per_use_limit.min' => 'Giới hạn mỗi người dùng phải ít nhất là 1.',
            'per_use_limit.lte' => 'Giới hạn mỗi người dùng không được vượt quá tổng số lượt dùng.',
        ];
    }

}
