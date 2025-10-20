<?php

namespace App\User\Requests;

use Domain\User\Rules\MatchSchoolClass;
use Illuminate\Foundation\Http\FormRequest;

class AssignStudentRoleRequest extends FormRequest
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
            'sex' => ['required', 'integer'],
            'birth_date' => ['required', 'date', 'before:today'],
            'school_id' => ['required', 'exists:schools,id'],
            'class_id' => ['required', new MatchSchoolClass(request('school_id'))],
        ];
    }
}
