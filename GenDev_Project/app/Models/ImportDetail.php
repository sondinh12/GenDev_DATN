<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportDetail extends Model
{
    protected $fillable = [
        'import_id',
        'product_id',
        'quantity',
        'import_price',
        'subtotal'
    ];

    public function import()
    {
        return $this->belongsTo(Import::class);
    }


    public function product(){
        return $this->belongsTo(Product::class);
    }
}
