<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class student extends Authenticatable
{

    use HasFactory;

    use HasTranslations;
    public $translatable=['name'];
    protected $guarded=[];


    public function genders(){

        return $this->belongsTo(gender::class,'gender_id');
    }

    public function grades(){

        return $this->belongsTo(grade::class,'grade_id');
    }

    public function classrooms(){

        return $this->belongsTo(classroom::class,'classroom_id');
    }


    public function sections(){

        return $this->belongsTo(section::class,'section_id');
    }

    public function nationals(){

        return $this->belongsTo(nationalitie::class,'nationalitie_id');
    }

    public function bloods(){

        return $this->belongsTo(blood::class,'blood_id');
    }

    public function parents(){

        return $this->belongsTo(the_parent::class,'parent_id');
    }


    public function student_accounts(){

        return $this->hasMany(students_account::class,'student_id');
    }

    public function students_fees(){

        return $this->hasMany(students_fee::class,'student_id');
    }

    public function payments(){

        return $this->hasMany(payment::class,'student_id');
    }

    public function attendances(){

        return $this->hasMany(attendance::class,'student_id');
    }


public function exams(){


    return $this->belongsToMany(exam::class,'students_exams');
}


public function images()
{
    return $this->morphMany(image::class,'imageable');
}




}
