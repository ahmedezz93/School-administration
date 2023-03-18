<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class promotionrequest extends FormRequest
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
            "Grade_id"=>"required",
            "Classroom_id"=>"required",
            "section_id"=>"required",
            "academic_year"=>"required",
            "Grade_id_new"=>"required",
            "Classroom_id_new"=>"required",
            "section_id_new"=>"required",
            "academic_year_new"=>"required",

        ];
    }

    public function messages()
    {
        return [
            "Grade_id,Classroom_id,section_id,academic_year,Grade_id_new,Classroom_id_new,section_id_new,academic_year_new.required"=>trans('validation.required'),

        ];
    }

}
