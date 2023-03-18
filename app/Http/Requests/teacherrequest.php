<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class teacherrequest extends FormRequest
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
"Email"=>"required|unique:teachers,email,".$this->id,
"Password"=>"required",
"Name_ar"=>"required",
"Name_en"=>"required",
"Specialization_id"=>"required",
"Gender_id"=>"required",
"Joining_Date"=>"required",
"Address"=>"required",

        ];
    }


    public function messages()
    {
        return [

"Email,Password,Name_ar,Name_en,Specialization_id,Gender_id,Joining_Date,Address.required"=>trans('validation.required'),

"Email.unique"=>trans('validation.unique'),

        ];
    }

}
