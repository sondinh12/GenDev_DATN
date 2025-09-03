<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'sale_price',
        'price',
        'quantity',
        'description',
        'status',
        'category_id',
        'category_mini_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function categoryMini()
    {
        return $this->belongsTo(CategoryMini::class, 'category_mini_id');
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'product_id');
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }

    public function cartdetails()
    {
        return $this->hasMany(Cartdetail::class, 'product_id');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }

    public function supplierPrices()
    {
        return $this->hasMany(SupplierProductPrice::class);
    }

    public function importDetails()
    {
        return $this->hasMany(ImportDetail::class);
    }
    public function questions()
    {
        return $this->hasMany(ProductQuestion::class, 'product_id');
    }
    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
    public function orderDetails() {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }
}
