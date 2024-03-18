<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HireDetail extends Model
{
    use HasFactory;

    public function product() : BelongsTo {

        return $this->belongsTo(Product::class);
        
    }


    public function hire() : BelongsTo {

        return $this->belongsTo(Hire::class);
        
    }

    public static function number_of_days($detail_id) {

        $detail = HireDetail::find($detail_id);

        return  Carbon::parse($detail->from)->diffInDays(Carbon::parse($detail->to)) + 1; 

    }


    public static function cost($detail_id) {

        $detail = HireDetail::find($detail_id);

        $cost = (HireDetail::number_of_days($detail_id) * $detail->quantity * $detail->unit_price);

        return $cost-$detail->discount; 
        
    }


    public static function returned($detail_id) {

        $check = HireReturn::where('hire_detail_id',$detail_id)->get();

        if($check->count() == 0) 
        
            return false; 
            
        return true;

    }
}
