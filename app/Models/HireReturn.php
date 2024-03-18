<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HireReturn extends Model
{
    use HasFactory;

    public function detail() : BelongsTo {

        return $this->belongsTo(HireDetail::class,'hire_detail_id');
        
    }
}
