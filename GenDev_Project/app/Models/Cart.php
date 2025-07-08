<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'created_at',
        'updated_at',
    ];
    
    public function user(){
        return $this->hasOne(User::class);
    }

    public function details(){
        return $this->hasMany(Cartdetail::class,'cart_id');
    }
}
