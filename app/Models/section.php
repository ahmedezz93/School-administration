<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class section extends Model
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

    return $this->belongsToMany(teacher::class,"teacher_sections");
}

public function students(){

    return $this->hasMany(student::class,"student_id");
}



}
