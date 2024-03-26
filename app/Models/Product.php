<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static  function image($product_id){

        $product_images = ProductImage::where('product_id',$product_id)->get();

        if($product_images->count() == 0) return NULL;

        $image = $product_images->first();

        return $image->image_url;       
        
    }
}
