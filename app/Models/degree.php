<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class degree extends Model
{
    use HasFactory;
    protected $guarded=[];



    public function students(){

        return $this->belongsTo(student::class,'student_id');
    }


    public function questions(){

        return $this->belongsTo(question::class,'question_id');
    }

    public function exams(){

        return $this->belongsTo(exam::class,'exam_id');
    }


}
