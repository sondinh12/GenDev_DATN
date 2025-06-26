<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'coupon_id',
        'shipping_id',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'ward',
        'postcode',
        'payment',
        'total',
        'shipping_fee',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }

    public function ship()
    {
        return $this->belongsTo(Ship::class, 'shipping_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function getStatusTextAttribute()
    {
        return match ($this->status) {
            1 => 'Đang chờ duyệt',
            2 => 'Đã xác nhận',
            3 => 'Đang giao hàng',
            4 => 'Đã giao',
            5 => 'Đã huỷ',
            default => 'Không xác định',
        };
    }
}
