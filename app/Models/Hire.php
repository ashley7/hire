<?php

namespace App\Models;

use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hire extends Model
{
    use HasFactory;

    public function user():BelongsTo {

        return $this->belongsTo(User::class);
        
    }

    public function details() : HasMany {

        return $this->hasMany(HireDetail::class);
        
    }

    public function payments() : HasMany {

        return $this->hasMany(HirePayment::class);
        
    }


    public static function hiredDates($user_id) {

        $taken_dates = [];

        $details = HireDetail::whereDate('from','>=',today())->orWhereDate('to','>=',today())->get();

        foreach ($details as $detail) {

            if($detail->hire->user_id == $user_id) continue;

            $period = CarbonPeriod::create($detail->from, $detail->to);           
        
            foreach ($period as $date) {

                $taken_dates[] = $date->format('Y-m-d');

            }  
            
        }

        return $taken_dates;        
        
    }


    public static function sumPaid($hire_id) {

        return HirePayment::where('status','successful')->where('hire_id',$hire_id)->sum('amount');
        
    }

    public static function bill($hire_id) {

        $hire = Hire::find($hire_id);

        $total_amount = 0;

        foreach ($hire->details as $detail) {

            $total_amount = $total_amount + HireDetail::cost($detail->id);                         

        }

        return $total_amount;        
        
    }




    


}
