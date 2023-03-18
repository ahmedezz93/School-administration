<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class studentrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name_ar"=>"required",
           "name_en"=>"required",
            "email"=>"required|unique:students,email,".$this->id,
           "password"=>"required",
            "gender_id"=>"required",
            "nationalitie_id"=>"required",
           "blood_id"=>"required",
            "Date_Birth"=>"required",
            "Grade_id"=>"required",
            "Classroom_id"=>"required",
            "section_id"=>"required",
            "parent_id"=>"required",
            "academic_year"=>"required",

        ];
    }


    public function messages()
    {
        return [

"name_ar,name_en,email,password,
gender_id,nationalitie_id,
blood_id,Date_Birth,Grade_id,Classroom_id
,section_id,parent_id,academic_year.required"=>trans('validation.required'),
        ];
    }

}
