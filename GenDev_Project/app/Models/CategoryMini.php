<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryMini extends Model
{
    use SoftDeletes;
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
