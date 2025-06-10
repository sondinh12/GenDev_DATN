<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CategoryMini extends Model
{
    protected $table = 'categories_mini';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
