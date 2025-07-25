<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierProductPrice extends Model
{
    protected $fillable = [
        'supplier_id',
        'product_id',
        'import_price',
        'start_date',
        'end_date'
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
