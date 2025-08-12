<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    // Cho phép mass‑assign cả trường images
    protected $fillable = [
        'title',
        'image',
        'type',
        'images',    // <-- thêm dòng này
    ];

    // (Tuỳ chọn) Cast JSON <-> array cho dễ dùng
    protected $casts = [
        'images' => 'array',
    ];
}
