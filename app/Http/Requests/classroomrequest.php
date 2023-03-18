<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class classroomrequest extends FormRequest
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
"List_Classes.*.Name_class_ar"=>"required",
"List_Classes.*.Name_class_en"=>"required",
"List_Classes.*.Grade_id"=>"required",


        ];
    }

    public function messages()
    {
        return [

            "Name_class_ar.required" =>trans('validation.required'),
            "Name_class_en.required" =>trans('validation.required'),
            "Grade_id.required" =>trans('validation.required'),


        ];
    }

}
