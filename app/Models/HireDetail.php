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


    public static function unreturned(){

        $hire_details = HireDetail::get();

        $data = [];

        foreach ($hire_details as $detail) {

            if(!$detail->returned($detail->id)) $data[] = $detail->id;
             
        }

        return HireDetail::whereIn('id',$data)->get();

    }

    public static function saveDetails($hire_id,$product_id,$from,$to,$quantity,$discount,$price) {

        $saveDetail = new HireDetail();

        $saveDetail->hire_id = $hire_id;

        $saveDetail->product_id = $product_id;

        $saveDetail->from = $from;

        $saveDetail->to = $to;

        $saveDetail->quantity = $quantity;

        $saveDetail->discount = $discount;

        $saveDetail->unit_price = $price;

        $saveDetail->save();

        return $saveDetail;
        
    }
}
