<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    protected $table = 'ships';

    protected $fillable = [
        'name',
        'shipping_price',
    ];

    // Một phương thức nếu bạn muốn quan hệ với Order
    public function orders()
    {
        return $this->hasMany(Order::class, 'shipping_id');
    }
}
