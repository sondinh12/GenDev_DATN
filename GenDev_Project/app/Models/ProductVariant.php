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

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function variantAttributes(){
        return $this->hasMany(ProductVariantAttribute::class,'product_variant_id');
    }
}
