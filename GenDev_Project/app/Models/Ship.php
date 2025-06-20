<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    protected $fillable = [
        'name',
        'shipping_price'
    ];

    public function order(){
        return $this->belongsTo(Order::class,'shipping_id');
    }
}
