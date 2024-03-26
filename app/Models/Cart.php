<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;


    public function product() : BelongsTo {

        return $this->belongsTo(Product::class);
        
    }

    public static function number_of_days($cart_id) {

        $detail = Cart::find($cart_id);

        return  Carbon::parse($detail->from)->diffInDays(Carbon::parse($detail->to)) + 1; 

    }
}
