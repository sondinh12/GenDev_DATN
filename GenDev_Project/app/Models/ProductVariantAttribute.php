<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class ProductVariantAttribute extends Model
{
    protected $fillable = [
        'product_variant_id',
        'attribute_id',
        'attribute_value_id'
    ];

    public function attribute(){
        return $this->belongsTo(Attribute::class,'attribute_id');
    }

    public function value(){
        return $this->belongsTo(AttributeValue::class,'attribute_Value_id');
    }

    public function variant(){
        return $this->belongsTo(ProductVariant::class,'product_variant_id');
    }
}
