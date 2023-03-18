<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class libraryrequest extends FormRequest
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
     "title"=>"required",
     "Grade_id"=>"required",
     "Classroom_id"=>"required",
     "section_id"=>"required",
     "file_name"=>"required|mimes:pdf",
        ];
    }

    public function messages()
    {
        return [
      "title,Grade_id,Classroom_id,section_id,file_name"=>trans('validation.required'),
      "file_name.mimes"=>trans('validation.mimes')
        ];
    }

}
