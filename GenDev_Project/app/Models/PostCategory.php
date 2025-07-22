<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Post;

class PostCategory extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];
    protected $table = 'posts_categories';

    // public function posts()
    // {
    //     return $this->hasMany(Post::class, 'post_category_id');
    // }
}
