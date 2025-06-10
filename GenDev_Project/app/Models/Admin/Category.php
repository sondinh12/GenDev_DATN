<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function miniCategories()
    {
        return $this->hasMany(CategoryMini::class, 'category_id');
    }
}
