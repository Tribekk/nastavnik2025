<?php

namespace Domain\Employer\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendInviteRequest extends FormRequest
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
            'message' => ['required', 'string', 'max:300'],
        ];
    }

    public function attributes()
    {
        return [
            'message' => '«текст приглашения»',
        ];
    }
}
