<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'variant_id',
        'coupon_id',
        'name',
        'email',
        'phone',
        'address',
        'status',
    ];

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class,'order_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function coupon(){
        return $this->belongsTo(Coupon::class,'coupon_id');
    }

}
