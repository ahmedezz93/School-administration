<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class fee extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $guarded=[];
    public $translatable=['name'];


    public function genders(){

        return $this->belongsTo(gender::class,'gender_id');
    }

    public function grades(){

        return $this->belongsTo(grade::class,'grade_id');
    }

    public function classrooms(){

        return $this->belongsTo(classroom::class,'class_id');
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


}
