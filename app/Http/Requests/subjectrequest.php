<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class subjectrequest extends FormRequest
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
            "Name_ar"=>'required',
            "Name_en"=>'required',
            "Grade_id"=>'required',
            "Class_id"=>'required',
            "teacher_id"=>'required',

        ];
    }


    public function messages()
    {
        return [
"Name_ar,Name_en,Grade_id,Class_id,teacher_id.required"=>trans('validation.required'),


        ];


    }



}



