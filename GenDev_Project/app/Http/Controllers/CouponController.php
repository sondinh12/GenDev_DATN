<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function apply(Request $request){
        $code = $request->coupon_code;
        $subtotal = $request->subtotal; 
        $coupon = Coupon::whereRaw('LOWER(coupon_code) = ?',[strtolower(trim($code))])
        ->where('status',1)
        ->where('usage_limit','>',0)
        ->whereDate('start_date','<=',now())
        ->whereDate('end_date','>=',now())->first();
        // dd($request->coupon_code, $code, $subtotal);
        if(!$coupon){
            return back()->with('error','Mã giảm giá không hợp lệ hoặc đã hết hạn');
        }
        if($subtotal < $coupon->min_coupon){
            return back()->with('error','Đơn hàng chưa đủ giá trị tối thiểu để áp dụng mã này');
        }
        // if($subtotal > $coupon->max_coupon){
        //     return back()->with('error','Đơn hàng đã vượt quá giá trị để áp dụng mã này');
        // }

        $userId = auth()->id() ?? null;
        if ($coupon->user_id != -1 && ($coupon->user_id != $userId || !$userId)) {
            return back()->with('error', 'Bạn không được phép sử dụng mã này!');
        }

        $timesUsed = 0;
        if ($userId) {
            $couponUser = $coupon->users()->where('user_id', $userId)->first();
            $timesUsed = $couponUser ? $couponUser->pivot->times_used : 0;
        }

        if ($coupon->per_use_limit != -1 && $timesUsed >= $coupon->per_use_limit) {
            return back()->with('error', 'Bạn đã vượt quá số lần sử dụng mã này!');
        }
        $discount = $coupon->discount_type === 'percent'
            ? min($subtotal * ($coupon->discount_amount / 100), $coupon->max_coupon)
            : $coupon->discount_amount;

        session()->put('applied_coupon', [
            'id' => $coupon->id,
            'code' => $coupon->coupon_code,
            'discount' => $discount,
            'user_id' => $userId
        ]);

        return back()->with('success','Ấp dụng mã giảm giá thành công');
    }
}
