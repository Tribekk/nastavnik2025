<?php

namespace Domain\School\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addStudentWithParentRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'last_name'=>['required'],
            'first_name'=>'required',
            'birth_date'=>'required',
            'sex'=>'required',
            'phone'=>'required',
            'last_name_parent'=>'required',
            'first_name_parent'=>'required',
            'middle_name_parent'=>'required',
            'birth_date_parent'=>'required',
            'phone_parent'=>'required',
        ];
    }
}
