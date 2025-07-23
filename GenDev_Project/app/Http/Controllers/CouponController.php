<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    public function apply(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string',
            'coupon_type' => 'required|in:order,shipping',
            'subtotal' => 'required|numeric',
            'shipping_fee' => 'nullable|numeric'
        ]);

        $code = $request->coupon_code;
        $couponType = $request->coupon_type;
        $subtotal = $request->subtotal;
        $shippingFee = $request->shipping_fee ?? 0;

        // Lấy coupon theo loại
        $coupon = Coupon::whereRaw('LOWER(coupon_code) = ?', [strtolower(trim($code))])
            ->where('type', $couponType)
            ->where('status', 1)
            ->where('usage_limit', '>', 0)
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->first();

        if (!$coupon) {
            return back()->with($couponType === 'shipping' ? 'error_shipping_coupon' : 'error_order_coupon', 'Mã giảm giá không hợp lệ hoặc đã hết hạn');
        }

        $userId = Auth::id() ?? null;
        if ($coupon->user_id != -1 && ($coupon->user_id != $userId || !$userId)) {
            return back()->with($couponType === 'shipping' ? 'error_shipping_coupon' : 'error_order_coupon', 'Bạn không được phép sử dụng mã này!');
        }

        $timesUsed = 0;
        if ($userId) {
            $couponUser = $coupon->users()->where('user_id', $userId)->first();
            $timesUsed = $couponUser ? $couponUser->pivot->times_used : 0;
        }
        if ($coupon->per_use_limit != -1 && $timesUsed >= $coupon->per_use_limit) {
            return back()->with($couponType === 'shipping' ? 'error_shipping_coupon' : 'error_order_coupon', 'Bạn đã vượt quá số lần sử dụng mã này!');
        }

        // Kiểm tra điều kiện giá trị tối thiểu
        if ($couponType === 'shipping') {
            if ($shippingFee < $coupon->min_coupon) {
                return back()->with('error_shipping_coupon', 'Phí ship chưa đủ giá trị tối thiểu để áp dụng mã này');
            }
            $discount = $coupon->discount_type === 'percent'
                ? min($shippingFee * ($coupon->discount_amount / 100), $coupon->max_coupon)
                : $coupon->discount_amount;
            session()->put('applied_shipping_coupon', [
                'id' => $coupon->id,
                'code' => $coupon->coupon_code,
                'discount' => $discount,
                'user_id' => $userId
            ]);
            return back()->with('success_shipping_coupon', 'Áp dụng mã giảm giá phí ship thành công');
        } else {
            if ($subtotal < $coupon->min_coupon) {
                return back()->with('error_order_coupon', 'Đơn hàng chưa đủ giá trị tối thiểu để áp dụng mã này');
            }
            $discount = $coupon->discount_type === 'percent'
                ? min($subtotal * ($coupon->discount_amount / 100), $coupon->max_coupon)
                : $coupon->discount_amount;
            session()->put('applied_order_coupon', [
                'id' => $coupon->id,
                'code' => $coupon->coupon_code,
                'discount' => $discount,
                'user_id' => $userId
            ]);
            return back()->with('success_order_coupon', 'Áp dụng mã giảm giá đơn hàng thành công');
        }
    }

    public function remove(Request $request)
    {
        $request->validate([
            'type' => 'required|in:order,shipping'
        ]);

        $couponType = $request->input('type');
        if ($couponType === 'shipping') {
            session()->forget('applied_shipping_coupon');
            return redirect()->back()->with('success_shipping_coupon', 'Đã xóa mã giảm giá phí ship');
        } else {
            session()->forget('applied_order_coupon');
            return redirect()->back()->with('success_order_coupon', 'Đã xóa mã giảm giá đơn hàng');
        }
    }
}