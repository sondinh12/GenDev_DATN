<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    protected $fillable = [
        'name',
        'shipping_price'
    ];

    public function orderDetail(){
        return $this->belongsTo(OrderDetail::class,'shipping_id');
    }
}
