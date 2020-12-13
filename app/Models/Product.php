<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = ['id','name','description','price','pictureURL'];

    public function product_carts(){
        return $this->hasMany("App\Models\Product_Cart");
    }
}
