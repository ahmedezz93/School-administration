<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class feesrequest extends FormRequest
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

"title_ar"=>"required|unique:fees,name->ar".$this->id,
"title_en"=>"required|unique:fees,name->en".$this->id,
"amount"=>"required",
"Grade_id"=>"required",
"Classroom_id"=>"required",
"year"=>"required",
        ];
    }

    public function messages()
    {
        return [
            "title_ar,title_en,amount,Grade_id,Classroom_id,year.required" =>trans('validation.required'),
            "title_ar,title_en.unique" =>trans('validation.unique'),
                    ];
    }

}
