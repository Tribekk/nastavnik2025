<?php

namespace App\IqSms\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendIqSmsRequest extends FormRequest
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
        $all = parent::all($keys);
        if($all['phone']) $all['phone'] = unFormatPhone($all['phone']);
        return $all;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => ['required', 'string', 'max:32'],
            'message' => ['required', 'string', 'max:300'],
        ];
    }

    public function attributes()
    {
        return [
            'phone' => '«телефон»',
            'message' => '«сообщение»',
        ];
    }
}
