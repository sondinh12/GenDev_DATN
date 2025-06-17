<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryMini extends Model
{   
    protected $table = 'categories_minis';
    protected $fillable = [
        'name',
        'status',
        'category_id',
        'image'
    ];

    public function Category(){
        return $this->belongsTo(Category::class);
    }
}
