<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsHistory extends Model
{
    use HasFactory;

    protected $table = 'posts_history';

    protected $fillable = [
        'post_id',
        'user_id',
        'fields_changed',
        'old_value',
        'new_value',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
