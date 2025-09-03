<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['name', 'status'];

    public function scopeTrash($query)
    {
        return $query->where('status', 2);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function values(){
        return $this->hasMany(AttributeValue::class,'attribute_id');
    }

    public function variantAttributes(){
        return $this->hasMany(ProductVariantAttribute::class,'attribute_id');
    }
}
