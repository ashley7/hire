<?php

namespace App\Models;

use AfricasTalking\SDK\AfricasTalking;
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


    public static function sendSMS($phone_number,$message){

        $username = env("API_USERNAME");

        $apiKey   = env('API_PASSWORD');

        $AT       = new AfricasTalking($username, $apiKey);

        $sms      = $AT->sms();

        $sms->send([
            'to'      => $phone_number,
            'message' => $message
        ]);
        
    }
}
