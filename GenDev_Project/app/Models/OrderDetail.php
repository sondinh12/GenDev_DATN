<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'amount',
        'note',
        'user_id',
        'shipping_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ship()
    {
        return $this->belongsTo(Ship::class, 'shipping_id');
    }

    public function attributes()
    {
        return $this->hasMany(OrderDetailAttribute::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'order_detail_id');
    }
}
