<?php

namespace App\User\Requests;

use Domain\User\Rules\MatchSchoolToken;
use Illuminate\Foundation\Http\FormRequest;

class AssignTeacherRoleRequest extends FormRequest
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
            'school_id' => ['required', 'exists:schools,id'],
            'token' => ['required', 'string', 'max:191', new MatchSchoolToken(request('school_id'))],
            'position' => ['required', 'string', 'max:191'],
        ];
    }

    public function attributes()
    {
        return [
            'token' => "«код доступа»",
            'school_id' => "«образовательная организация»",
            'position' => "«должность»",
        ];
    }
}
