<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'name',
        'coupon_code',
        'discount_type',
        'discount_amount',
        'start_date',
        'end_date',
        'quantity',
        'status',
        'max_coupon',
        'min_coupon',
        'usage_limit',
        'per_use_limit',
        'total_used'
    ];

    public function orders(){
        return $this->hasMany(Order::class,'coupon_id');
    }

    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'coupon_user', 'coupon_id', 'user_id')
    //                 ->using(CouponUser::class) // Sử dụng model pivot tùy chỉnh
    //                 ->withPivot('times_used')
    //                 ->withTimestamps();
    // }
    public function users()
    {
        return $this->belongsToMany(User::class, 'coupon_user')
                    ->withPivot('times_used')
                    ->withTimestamps();
    }

}
