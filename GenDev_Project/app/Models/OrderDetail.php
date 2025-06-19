<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'amount',
        'note',
        'price',
        'user_id',
        'shipping_id',
    ];

    public function ship(){
        return $this->belongsTo(Ship::class);
    }

    public function attributes(){
        return $this->hasMany(OrderDetailAttribute::class,'order_detail_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function variants(){
        return $this->hasMany(ProductVariant::class,'variant_id');
    }
}
