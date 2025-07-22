<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class UpdateCouponRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $couponId = $this->route('coupon');

        return [
            'name' => 'required|string|max:255',
            'type' => 'required|in:order,shipping', 
            'coupon_code' => 'nullable|string|max:20|unique:coupons,coupon_code,' . $couponId,
            'shipping_code' => 'nullable|string|max:50',

            'discount_type' => 'required|in:percent,fixed',

            'discount_amount' => [
                'required',
                'numeric',
                'min:0.01',
                'max:99999999.99',
                function ($attribute, $value, $fail) {
                    if (request('discount_type') === 'percent' && $value > 100) {
                        $fail('Giảm giá theo phần trăm không được vượt quá 100%.');
                    }
                }
            ],

            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => [
                'required',
                'date',
                'after_or_equal:start_date',
                function ($attribute, $value, $fail) {
                    $start = Carbon::parse(request('start_date'));
                    $end = Carbon::parse($value);
                    if ($start->diffInDays($end) > 365) {
                        $fail('Thời hạn mã giảm giá không được vượt quá 1 năm.');
                    }
                }
            ],

            'usage_limit' => 'nullable|integer|min:1|max:10000',
            'per_use_limit' => 'nullable|integer|min:1|max:10',
            'min_coupon' => 'nullable|numeric|min:0|max:99999999.99',

            'max_coupon' => [
                'nullable',
                'numeric',
                'max:99999999.99',
                function ($attribute, $value, $fail) {
                    $discount = request('discount_amount');
                    $min = request('min_coupon');

                    if (!is_null($min) && $value < $min) {
                        $fail('Giá trị đơn hàng tối đa phải lớn hơn hoặc bằng giá trị tối thiểu.');
                    }
                    if (!is_null($discount) && $value < $discount) {
                        $fail('Giá trị đơn hàng tối đa phải lớn hơn hoặc bằng số tiền giảm.');
                    }
                }
            ],

            'status' => 'required|in:0,1',
            'user_id' => ['required', 'integer', 'in:-1,0'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên mã giảm giá là bắt buộc.',
            'name.max' => 'Tên mã giảm giá không được vượt quá 255 ký tự.',

            'coupon_code.max' => 'Mã giảm giá không được vượt quá 20 ký tự.',
            'coupon_code.unique' => 'Mã giảm giá này đã tồn tại.',

            'type.required' => 'Vui lòng chọn loại mã.',
            'type.in' => 'Loại mã không hợp lệ.',

            'discount_type.required' => 'Vui lòng chọn loại giảm.',
            'discount_type.in' => 'Loại giảm không hợp lệ.',

            'discount_amount.required' => 'Vui lòng nhập giá trị giảm.',
            'discount_amount.numeric' => 'Giá trị giảm phải là số.',
            'discount_amount.min' => 'Giá trị giảm phải lớn hơn 0.',
            'discount_amount.max' => 'Giá trị giảm không được vượt quá 99,999,999.99.',

            'start_date.required' => 'Vui lòng nhập ngày bắt đầu.',
            'start_date.date' => 'Ngày bắt đầu không hợp lệ.',
            'start_date.before_or_equal' => 'Ngày bắt đầu phải trước hoặc bằng ngày kết thúc.',

            'end_date.required' => 'Vui lòng nhập ngày kết thúc.',
            'end_date.date' => 'Ngày kết thúc không hợp lệ.',
            'end_date.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
            'end_date.*' => 'Thời hạn mã giảm giá không được vượt quá 1 năm.',

            'usage_limit.max' => 'Giới hạn sử dụng không được vượt quá 10.000.',
            'usage_limit.integer' => 'Giới hạn tổng sử dụng phải là số nguyên.',
            'usage_limit.min' => 'Giới hạn sử dụng phải lớn hơn 0.',

            'per_use_limit.integer' => 'Giới hạn mỗi người dùng phải là số nguyên.',
            'per_use_limit.min' => 'Giới hạn mỗi người dùng không hợp lệ.',
            'per_use_limit.max' => 'Mỗi người chỉ được sử dụng mã này tối đa 10 lần.',

            'min_coupon.max' => 'Giá trị đơn hàng tối thiểu không được vượt quá 99,999,999.99.',
            'min_coupon.numeric' => 'Giá trị đơn hàng tối thiểu phải là số.',
            'min_coupon.min' => 'Giá trị đơn hàng tối thiểu không được âm.',

            'max_coupon.numeric' => 'Giá trị đơn hàng tối đa phải là số.',
            'max_coupon.max' => 'Giá trị đơn hàng tối đa không được vượt quá 99,999,999.99.',

            'status.in' => 'Trạng thái không hợp lệ.',
            'user_id.integer' => 'Giá trị phải là 1 số.'
        ];
    }
}
