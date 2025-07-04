<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCouponRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->input('discount_type') === 'fixed') {
            $this->merge(['max_coupon' => 0]);
        }
    }

    public function rules(): array
    {
        $couponId = $this->route('coupon');

        return [
            'name' => 'required|string|max:255',
            'coupon_code' => 'required|string|max:50|unique:coupons,coupon_code,' . $couponId,
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
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'quantity' => 'required|integer|min:1',
            'usage_limit' => 'nullable|integer|min:1',
            'per_use_limit' => 'nullable|integer|min:1',
            'min_coupon' => 'nullable|numeric|min:0',
            'max_coupon' => [
                'nullable',
                'numeric',
                function ($attribute, $value, $fail) {
                    if (request('discount_type') === 'percent') {
                        $discount = request('discount_amount');
                        $min = request('min_coupon');

                        if (!is_null($min) && $value < $min) {
                            $fail('Giá trị đơn hàng tối đa phải lớn hơn hoặc bằng giá trị tối thiểu.');
                        }

                        if (!is_null($value) && $value < $discount) {
                            $fail('Giá trị đơn hàng tối đa phải lớn hơn hoặc bằng giá trị giảm.');
                        }
                    }
                }
            ],
            'status' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên mã giảm giá là bắt buộc.',
            'name.max' => 'Tên mã giảm giá không được vượt quá 255 ký tự.',

            'coupon_code.required' => 'Mã giảm giá là bắt buộc.',
            'coupon_code.unique' => 'Mã giảm giá này đã tồn tại.',
            'coupon_code.max' => 'Mã giảm giá không được vượt quá 50 ký tự.',

            'discount_type.required' => 'Vui lòng chọn loại giảm.',
            'discount_type.in' => 'Loại giảm không hợp lệ.',

            'discount_amount.required' => 'Vui lòng nhập giá trị giảm.',
            'discount_amount.numeric' => 'Giá trị giảm phải là số.',
            'discount_amount.min' => 'Giá trị giảm phải lớn hơn 0.',

            'start_date.required' => 'Vui lòng nhập ngày bắt đầu.',
            'start_date.date' => 'Ngày bắt đầu không hợp lệ.',
            'start_date.before_or_equal' => 'Ngày bắt đầu phải trước hoặc bằng ngày kết thúc.',

            'end_date.required' => 'Vui lòng nhập ngày kết thúc.',
            'end_date.date' => 'Ngày kết thúc không hợp lệ.',
            'end_date.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',

            // 'quantity.required' => 'Số lượng là bắt buộc.',
            // 'quantity.integer' => 'Số lượng phải là số nguyên.',
            // 'quantity.min' => 'Số lượng phải ít nhất là 1.',

            'usage_limit.integer' => 'Giới hạn tổng sử dụng phải là số nguyên.',
            'usage_limit.min' => 'Giới hạn sử dụng phải lớn hơn 0.',

            'per_use_limit.integer' => 'Giới hạn mỗi người dùng phải là số nguyên.',
            'per_use_limit.min' => 'Giới hạn mỗi người dùng phải lớn hơn 0.',

            'min_coupon.numeric' => 'Giá trị đơn hàng tối thiểu phải là số.',
            'min_coupon.min' => 'Giá trị đơn hàng tối thiểu không được âm.',

            'max_coupon.numeric' => 'Giá trị đơn hàng tối đa phải là số.',

            'status.boolean' => 'Trạng thái không hợp lệ.',
        ];
    }
}
    