<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'status',
        'image',
    ];

    public function CategoryMini()
    {
        return $this->hasMany(CategoryMini::class);
    }

    
}
