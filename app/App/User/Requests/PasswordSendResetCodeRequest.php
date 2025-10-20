<?php

namespace App\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordSendResetCodeRequest extends FormRequest
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
        $result = parent::all($keys);
        $result['phone'] = unFormatPhone(request('phone'));
        return $result;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|exists:users',
        ];
    }
}
