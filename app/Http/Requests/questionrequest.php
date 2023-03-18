<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class questionrequest extends FormRequest
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

            "title"=>"required|unique:questions,title,".$this->id,
            "answers"=>"required",
            "right_answer"=>"required",
            "quizze_id"=>"required",
            "score"=>"required",

        ];
    }


    public function messages()
    {
        return [

"title,answers,right_answer,quizze_id,score.required"=>trans('validation.required'),
"title.unique"=>trans('validation.unique'),
        ];
    }

}
