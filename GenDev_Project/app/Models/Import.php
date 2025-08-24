<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class Import extends Model
{
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'supplier_id',
        'import_date',
        'total_cost',
        'note',
        'status'
    ];
    use SoftDeletes;

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function details()
    {
        return $this->hasMany(ImportDetail::class);
    }
}
