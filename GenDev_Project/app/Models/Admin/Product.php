<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryMini::class, 'category_id');
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'product_id');
    }
}
