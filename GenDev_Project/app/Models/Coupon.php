<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'coupon_code',
        'discount_type',
        'discount_amount',
        'type',
        'start_date',
        'end_date',
        'status',
        'max_coupon',
        'min_coupon',
        'usage_limit',
        'per_use_limit',
        'total_used',
        'user_id',
    ];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'max_coupon' => 'decimal:2',
        'min_coupon' => 'decimal:2',
        'status' => 'integer',
    ];

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
