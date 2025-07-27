<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'coupon_id',
        'shipping_id',
        'shipping_fee',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'ward',
        'postcode',
        'payment',
        'total',
        'transaction_code',
        'status',
        'payment_status',
        'payment_expired_at'
    ];

    protected $casts = [
        'payment_expired_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // Mã giảm giá cho sản phẩm
    public function productCoupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }


    // Mã giảm giá cho phí vận chuyển
    public function shippingCoupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class, 'shipping_coupon_id');
    }


    // Phương thức giao hàng
    public function ship(): BelongsTo
    {
        return $this->belongsTo(Ship::class, 'shipping_id');
    }


    // Danh sách sản phẩm 
    // 'transaction_code',ong đơn hàng
    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
    public function orderStatusLogs()
    {
        return $this->hasMany(OrderStatusLog::class);
    }
}
