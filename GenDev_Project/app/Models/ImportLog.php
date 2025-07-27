<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportLog extends Model
{
    protected $fillable = ['import_id', 'user_id', 'changes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function import()
    {
        return $this->belongsTo(Import::class);
    }
}
