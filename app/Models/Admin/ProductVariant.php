<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $table = 'product_variants';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
        public function attributes()
    {
        return $this->hasMany(ProductVariantAttribute::class, 'product_variant_id');
    }
}
