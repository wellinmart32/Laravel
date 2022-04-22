<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function productInfo($id) {
        return Product::where('id', '=', $id)->get();
    }
}
