<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class teacher extends Authenticatable
{
    use HasFactory;
    use HasTranslations;
    protected $guarded=[];
    public $translatable=['name'];


    public function genders(){


        return $this->belongsTo(gender::class,'gender_id');
    }

    public function specializations(){


        return $this->belongsTo(specialization::class,'specilization_id');
    }



    public function sections(){


        return $this->belongsToMany(section::class,'teacher_sections');
    }


}
