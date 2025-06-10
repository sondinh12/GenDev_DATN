<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductVariantAttribute extends Model
{
    protected $table = 'product_variant_attributes';

    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }

    public function value()
    {
        return $this->belongsTo(AttributeValue::class, 'attribute_value_id');
    }
}
