<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $table = 'attributes';
    public static function delete_attributes($id){
        $attribute = Attribute::findOrFail($id);
        if(!is_null($attribute)){
            $attribute->delete();
        }
    }
}
