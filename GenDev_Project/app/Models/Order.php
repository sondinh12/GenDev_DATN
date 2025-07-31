<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'product_coupon_id',
        'shipping_coupon_id',
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
        'subtotal',
        'product_discount',
        'shipping_discount',
        'total',
        'transaction_code',
        'status',
        'payment_status',
        'payment_expired_at',
    ];

    protected $casts = [
        'payment_expired_at' => 'datetime',
        'subtotal' => 'float',
        'product_discount' => 'float',
        'shipping_discount' => 'float',
        'total' => 'float',
    ];

    // Người dùng đặt đơn hàng
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Mã giảm giá cho sản phẩm
    public function productCoupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class, 'product_coupon_id');
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
        return $this->hasMany(OrderDetail::class, 'order_id')->with('product');
    }

    // Lịch sử thay đổi trạng thái
    public function orderStatusLogs(): HasMany
    {
        return $this->hasMany(OrderStatusLog::class);
    }
    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
    public function latestRefundLog()
    {
        return $this->hasOne(OrderStatusLog::class)
            ->whereNotNull('refund_bank_account')
            ->latestOfMany('changed_at'); // ✅ KHÔNG bỏ trống
    }
}
