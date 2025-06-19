<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'name',
        'coupon_code',
        'start_date',
        'end_date',
        'quantity',
        'status',
        'user_id',
        'max_coupon',
        'min_coupon'
    ];

    public function orders(){
        return $this->hasMany(Order::class,'coupon_id');
    }
}
