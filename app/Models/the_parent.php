<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class the_parent extends Authenticatable
{

    use HasFactory;
    use HasTranslations;
    public $translatable = ['name_Father','job_father','name_mother','job_mother'];
    protected $guarded=[];

public function attachments(){

    return $this->hasMany(parent_attachment::class,'parent_id');
}


}
