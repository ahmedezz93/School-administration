<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students_account extends Model
{
    use HasFactory;
    protected $guarded=[];



    public function students(){


        return $this->belongsTo(student::class,'student_id');
    }


public function fees(){


    return $this->belongsTo(students_fee::class,'fee_id');

}


}
