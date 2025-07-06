<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [
        'price',
        'sale_price',
        'quantity',
        'product_id',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function variantAttributes()
    {
        return $this->hasMany(ProductVariantAttribute::class, 'product_variant_id');
    }

    public function cartdetails()
    {
        return $this->hasMany(Cartdetail::class, 'variant_id');
    }

    public function attributes()
    {
        return $this->hasManyThrough(
            Attribute::class,                     // model đích
            ProductVariantAttribute::class,       // model trung gian
            'product_variant_id',                 // khóa ngoại của ProductVariantAttribute trỏ đến ProductVariant
            'id',                                 // khóa chính của bảng attributes
            'id',                                 // khóa chính của bảng product_variants
            'attribute_id'                        // khóa ngoại của ProductVariantAttribute trỏ đến attributes
        );
    }
}
