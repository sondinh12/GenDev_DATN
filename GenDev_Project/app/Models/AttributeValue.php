<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $fillable = [
        'attribute_id',
        'value'
    ];

    public function attribute(){
        return $this->belongsTo(Attribute::class,'attribute_id');
    }

    public function variantAttributes(){
        return $this->hasMany(ProductVariantAttribute::class,'attribute_value_id');
    }
}
