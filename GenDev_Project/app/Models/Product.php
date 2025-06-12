<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'image',
        'sale_price',
        'price',
        'quantity',
        'description',
        'status',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function galleries(){
        return $this->hasMany(ProductGallery::class,'product_id');
    }

    public function variants(){
        return $this->hasMany(ProductVariant::class,'product_id');
    }
}
