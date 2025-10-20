<?php

namespace App\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterGoToVerifyRequest extends FormRequest
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
        $data = parent::all($keys);
//        if($data['phone']) {
//            $data['phone'] = unFormatPhone($data['phone']);
//        }
        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'min:2', 'max:191'],
            'last_name' => ['required', 'string', 'min:2', 'max:191'],
            'middle_name' => ['string', 'max:191', 'min:2', 'nullable'],
            'email' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'pd_agree' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'pd_agree.required' => __('Для продолжения работы с сервисом Вы должны дать согласие на обработку персональных данных.'),
            'last_name.min' => __('Фамилия не может содержать менее двух букв'),
            'first_name.min' => __('Имя не может содержать менее двух букв'),
            'middle_name.min' => __('Отчество не может содержать менее двух букв'),
        ];
    }
}
