<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'tokens';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'email',
        'token',
        'expiry',
        'count',
        'created_at',
    ];

    protected $dates = [
        'expiry',
        'created_at',
    ];
}
