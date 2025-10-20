<?php

namespace Domain\Employer\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendInviteEventRequest extends FormRequest
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
            'event_id' => ['required', 'exists:events,id'],
            'message' => ['required', 'string', 'max:300'],
        ];
    }

    public function attributes()
    {
        return [
            'event_id' => '«мероприятие»',
            'message' => '«текст приглашения»',
        ];
    }
}
