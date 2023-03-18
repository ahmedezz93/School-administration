<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class attendancerequest extends FormRequest
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
            "student_id"=>"required",
            'from' => 'required|date|date_format:Y-m-d',
            'to' => 'required|date|date_format:Y-m-d|after_or_equal:from'


];
    }


    public function messages()
    {
        return [

            "student_id,from,to.required"=>trans('validation.required'),
            "from,to.date_format"=>trans('validation.date_format'),
            "to.after_or_equal"=>trans('validation.after_or_equal'),
        ];
    }

}
