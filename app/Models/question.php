<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;

    protected $guarded;


    public function exams(){

        return $this->belongsTo(exam::class,"exam_id");
    }

}
