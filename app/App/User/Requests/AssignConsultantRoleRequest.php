<?php

namespace App\User\Requests;

use Domain\User\Rules\MatchConsultantAssignToken;
use Illuminate\Foundation\Http\FormRequest;

class AssignConsultantRoleRequest extends FormRequest
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

    public function all($keys = null)
    {
        $inputs = parent::all($keys);
        serializeArrayValue($inputs, 'regalia_and_experience');

        return $inputs;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'regalia_and_experience' => ['required', 'string', 'max:4096'],
            'experience' => ['required', 'integer', 'min:1', 'max:100'],
            'token' => ['required', 'string', 'max:191', new MatchConsultantAssignToken],
        ];
    }

    public function attributes()
    {
        return [
            'regalia_and_experience' => '«регалии и опыт»',
            'experience' => '«суммарный опыт работы»',
            'token' => "«код доступа»",
        ];
    }
}
