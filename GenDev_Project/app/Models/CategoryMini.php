<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryMini extends Model
{
    protected $table = 'categories_mini';
    protected $fillable = [
        'category_id',
        'name',
        'status',
        'image'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
