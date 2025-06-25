<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetailAttribute extends Model
{
    protected $fillable = [
        'order_detail_id',
        'attribute_name',
        'attribute_value',
    ];

    public function orderDetail(){
        return $this->belongsTo(OrderDetail::class);
    }
}
