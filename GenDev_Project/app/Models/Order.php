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
        'payment_status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // public function coupon(): BelongsTo
    // {
    //     return $this->belongsTo(Coupon::class);
    // }

    // public function shipping(): BelongsTo
    // {
    //     return $this->belongsTo(Shipping::class, 'shipping_id');
    // }

    // public function orderDetails(): HasMany
    // {
    //     return $this->hasMany(OrderDetail::class);
    // }
}
