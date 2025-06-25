<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'price',
        'quantity',
        'note',
        'product_id',
        'variant_id',
    ];

    public function attributes(){
        return $this->hasMany(OrderDetailAttribute::class,'order_detail_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function variants(){
        return $this->hasMany(ProductVariant::class,'variant_id');
    }
}
