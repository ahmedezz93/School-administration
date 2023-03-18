<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class examrequest extends FormRequest
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

"Name_ar"=>"required|unique:exams,name->ar,".$this->id,
"Name_en"=>"required|unique:exams,name->en,".$this->id,
"Grade_id"=>"required",
"Classroom_id"=>"required",
"subject_id"=>"required",
"section_id"=>"required",
        ];
    }

    public function messages()
    {
        return [
"Name_ar,Name_en,Grade_id,Classroom_id,subject_id,section_id.required"=>trans('validation.required'),

        ];
    }

}
