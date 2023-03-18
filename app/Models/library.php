<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class library extends Model
{
    use HasFactory;
    protected $table="library";
    protected $guarded=[];

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

}
