<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class HireHelper extends Model
{
    use HasFactory;

    public static function uploadImage($file)
    {      

        if (empty($file)) 

           return NULL;

        $destinationPath = public_path('product_files');

        $ext = $file->getClientOriginalExtension();

        $file_url =Str::random(12).'.'.$ext;

        $file->move($destinationPath,$file_url);

        return $file_url;
        

    }
}
