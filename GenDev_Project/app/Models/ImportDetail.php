<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportDetail extends Model
{
    protected $fillable = [
        'import_id',
        'product_id',
        'variant_id',
        'variant_data',
        'product_temp_name',
        'quantity',
        'import_price',
        'subtotal'
    ];

    protected $casts = [
        'variant_data' => 'array',
    ];

    public function import()
    {
        return $this->belongsTo(Import::class);
    }


    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function variant(){
        return $this->belongsTo(ProductVariant::class,'variant_id');
    }
}
