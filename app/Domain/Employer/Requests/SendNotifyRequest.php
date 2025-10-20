<?php

namespace Domain\Employer\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendNotifyRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:191'],
            'message' => ['required', 'string', 'max:300'],
            'url' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => '«заголовок сообщения»',
            'message' => '«сообщение»',
            'url' => '«ссылка»',
        ];
    }
}
