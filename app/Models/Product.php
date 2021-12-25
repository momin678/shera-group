<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // public function category()
    // {
    //     return $this->hasOne(Category::class);
    // }
    // public function brand()
    // {
    //     return $this->hasOne(Drand::class);
    // }
    public static function product_delete($id){
        $product = Product::findOrFail($id);
        if(!is_null($product)){
            $product->delete();
        }
    }
}
