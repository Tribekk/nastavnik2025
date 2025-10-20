<?php

namespace App\User\Requests;

use Domain\User\Rules\MatchEmployerAssignToken;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AssignEmployerRoleRequest extends FormRequest
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
            'token' => ['required', 'string', 'max:191', new MatchEmployerAssignToken(request('orgunit_id', 0))],
            'orgunit_id' => ['required', 'exists:external_orgunits,id'],
            'email' => ['required', 'email', 'unique:users,email,'.Auth::id(), 'max:191'],
            'position' => ['required', 'string', 'max:191'],
        ];
    }

    public function attributes()
    {
        return [
            'orgunit_id' => '«организация»',
            'position' => '«должность»',
            'token' => "«код доступа»",
        ];
    }
}
