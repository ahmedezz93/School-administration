<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class exam extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $guarded=[];
    public $translatable=['name'];

    public function classrooms(){

        return $this->belongsTo(classroom::class,"class_id");
    }

    public function grades(){

        return $this->belongsTo(grade::class,"grade_id");
    }

    public function teachers(){

        return $this->belongsTo(teacher::class,"teacher_id");
    }


    public function sections(){

        return $this->belongsTo(section::class,"section_id");
    }


    public function subjects(){

        return $this->belongsTo(subject::class,"subject_id");
    }


    public function students(){

        return $this->belongsToMany(student::class,"degrees");
    }

    public function degrees(){

        return $this->hasMany(degree::class);
    }


}
