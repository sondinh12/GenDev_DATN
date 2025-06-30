<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\SoftDeletes;


class Coupon extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'coupon_code',
        'discount_type',
        'discount_amount',
        'start_date',
        'end_date',
        'quantity',
        'status',
        'max_coupon',
        'min_coupon',
        'usage_limit',
        'per_use_limit',
        'total_used',
    ];


    
    use SoftDeletes;

    protected $dates = ['deleted_at'];



    /**
     * Mỗi coupon có thể được sử dụng trong nhiều đơn hàng
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'coupon_id');
    }

    /**
     * Coupon có thể được sử dụng bởi nhiều người (user-coupon pivot)
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'coupon_user')
                    ->withPivot('times_used')
                    ->withTimestamps();
    }

    /**
     * Người tạo coupon (user_id)
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
