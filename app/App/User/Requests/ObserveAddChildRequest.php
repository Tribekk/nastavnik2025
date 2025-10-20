<?php

namespace App\User\Requests;

use Domain\User\Rules\MatchObserveParentCode;
use Illuminate\Foundation\Http\FormRequest;

class ObserveAddChildRequest extends FormRequest
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
            'last_name' => ['required', 'string', 'max:191'],
            'first_name' => ['required', 'string', 'max:191'],
            'middle_name' => ['nullable', 'string', 'max:191'],
            'birth_date' => ['required', 'date'],
            'code' => ['required', 'string', 'max:191', new MatchObserveParentCode],
        ];
    }

    public function attributes()
    {
        return [
            'code' => "«код подтверждения»",
            'school_id' => "«образовательная организация»",
        ];
    }
}
