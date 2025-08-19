<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class StoreCouponRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $type = $this->input('type');

        return [
            'name' => 'required|string|max:255',
            'type' => 'required|in:order,shipping',
            'coupon_code' => [
                'required',
                'string',
                'max:50',
                'unique:coupons,coupon_code',
            ],
            'discount_type' => [
                'required',
                'in:percent,fixed',
            ],
            'discount_amount' => [
                'required',
                'numeric',
                'min:1',
                'max:99999999.99',
                function ($attribute, $value, $fail) {
                    if ($this->input('discount_type') === 'percent' && $value > 100) {
                        $fail('Giảm giá theo phần trăm không được vượt quá 100%.');
                    }
                    if ($this->input('type') === 'shipping' && $value <= 0) {
                        $fail('Số tiền giảm phí ship phải lớn hơn 0.');
                    }
                },
            ],
            'start_date' => [
                'required',
                'date',
                'after_or_equal:' . now()->toDateTimeString(),
                'before_or_equal:end_date',
            ],
            'end_date' => [
                'required',
                'date',
                'after_or_equal:start_date',
                function ($attribute, $value, $fail) {
                    $start = Carbon::parse($this->input('start_date'));
                    $end = Carbon::parse($value);
                    if ($start->diffInDays($end) > 365) {
                        $fail('Thời hạn mã giảm giá không được vượt quá 1 năm.');
                    }
                },
            ],
            'usage_limit'   => 'required|integer|min:1|max:10000',
            'per_use_limit' => 'required|integer|min:1|max:10',
            'min_coupon'    => 'required|numeric|min:0|max:99999999.99',
            'max_coupon' => [
                'nullable',
                'numeric',
                'max:99999999',
                function ($attribute, $value, $fail) {
                    $discount = $this->input('discount_amount');
                    $min = $this->input('min_coupon');
                    $type = $this->input('type');
                    if ($type === 'percent' && is_null($value)) {
                        return $fail('Trường giảm tối đa là bắt buộc khi loại mã là giảm %.');
                    }
                    if (!is_null($min) && !is_null($value) && $value < $min) {
                        return $fail('Giá trị đơn hàng tối đa phải lớn hơn hoặc bằng giá trị tối thiểu.');
                    }
                    if (!is_null($discount) && !is_null($value) && $value < $discount) {
                        return $fail('Giá trị đơn hàng tối đa phải lớn hơn hoặc bằng số tiền giảm.');
                    }
                },
            ],
            'status' => 'required|in:0,1,2',
            'user_id' => ['required', 'integer', 'in:-1,0'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên mã giảm giá là bắt buộc.',
            'name.max' => 'Tên mã giảm giá không được vượt quá 255 ký tự.',
            'type.required' => 'Loại mã là bắt buộc.',
            'type.in' => 'Loại mã không hợp lệ.',
            'coupon_code.required' => 'Mã giảm giá là bắt buộc.',
            'coupon_code.unique' => 'Mã giảm giá này đã tồn tại.',
            'coupon_code.max' => 'Mã giảm giá không được vượt quá 50 ký tự.',
            'discount_type.required' => 'Vui lòng chọn loại giảm.',
            'discount_type.in' => 'Loại giảm không hợp lệ.',
            'discount_amount.required' => 'Vui lòng nhập giá trị giảm.',
            'discount_amount.numeric' => 'Giá trị giảm phải là số.',
            'discount_amount.min' => 'Giá trị giảm phải lớn hơn 0.',
            'discount_amount.max' => 'Giá trị giảm không được vượt quá 99,999,999.99.',
            'start_date.required' => 'Vui lòng nhập ngày bắt đầu.',
            'start_date.date' => 'Ngày bắt đầu không hợp lệ.',
            'start_date.after_or_equal' => 'Ngày bắt đầu phải từ ngày hiện tại trở đi.',
            'start_date.before_or_equal' => 'Ngày bắt đầu phải trước hoặc bằng ngày kết thúc.',
            'end_date.required' => 'Vui lòng nhập ngày kết thúc.',
            'end_date.date' => 'Ngày kết thúc không hợp lệ.',
            'end_date.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
            'end_date.*' => 'Thời hạn mã giảm giá không được vượt quá 1 năm.',
            'usage_limit.max' => 'Giới hạn sử dụng không được vượt quá 10,000.',
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
            'user_id.integer' => 'Giá trị phải là một số.',
        ];
    }
}