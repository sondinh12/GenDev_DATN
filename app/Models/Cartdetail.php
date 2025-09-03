<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cartdetail extends Model
{

    protected $table = 'cart_details';

    protected $fillable = [
        'cart_id',
        'product_id',
        'variant_id',
        'quantity',
        'price',
        'created_at',
        'updated_at',
    ];

    /**
     * Mỗi chi tiết sản phẩm thuộc về một giỏ hàng
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * Sản phẩm tương ứng
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Biến thể sản phẩm (màu sắc, size,...)
     */
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }

}
