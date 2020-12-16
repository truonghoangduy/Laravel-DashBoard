<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsToMany('App\Models\Product_Cart');
    }
    public function product_cart(){
        return $this->hasMany('App\Models\Product_Cart');
    }
}
