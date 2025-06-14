<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'status',
        'image',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function categoriesMini(){
        return $this->hasMany(CategoryMini::class);
    }
}
