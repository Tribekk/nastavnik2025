<?php

namespace App\User\Requests;

use Domain\User\Rules\MatchResetPasswordCode;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password' => ['required', 'confirmed', 'min:8'],
            'code' => ['required', 'string', 'max:4', 'min:4', new MatchResetPasswordCode],
        ];
    }

    public function attributes()
    {
        return [
            'code' => '«Код подтверждения»',
        ];
    }

    public function messages()
    {
        return [
            'phone.exists' => __('Пользователя с данным номером телефона не найдено!'),
        ];
    }
}
