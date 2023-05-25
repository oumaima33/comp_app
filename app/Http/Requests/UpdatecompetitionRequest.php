<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatecompetitionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
           'comp_name'=>'required',
           'part_nbr'=>'required',
           'description'=>'required',
           'categorie'=>'required',
           'criteria_1'=>'required',
           'criteria_2'=>'required',
           'criteria_3'=>'required',
           'criteria_4'=>'required',
           'criteria_5'=>'required'
        ];
    }
}
