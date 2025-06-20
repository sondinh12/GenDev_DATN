<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CouponUser extends Pivot
{
    protected $fillable = [
        'coupon_id',
        'user_id',
        'times_used'
    ];

    // public function coupon()
    // {
    //     return $this->belongsTo(Coupon::class, 'coupon_id');
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }


}
