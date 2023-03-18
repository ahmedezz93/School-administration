<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students_fee extends Model
{
    use HasFactory;

    protected $guarded=[];



    public function fees(){

        return $this->belongsTo(fee::class,'fee_id');
    }
}
