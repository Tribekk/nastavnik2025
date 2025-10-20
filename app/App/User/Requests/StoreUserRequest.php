<?php

namespace App\User\Requests;

use Domain\User\Rules\MatchSchoolClass;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
        if($data['phone']) {
            $data['phone'] = unFormatPhone($data['phone']);
        }
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
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'phone' => ['required', 'string', 'max:12', 'min:12', 'unique:users'],
            'birth_date' => ['nullable', 'date', 'before:today'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['nullable', 'image', 'max:500'],
            'roles' => ['nullable', 'max:1'],
            'roles.*.name' => ['exists:roles,name'],
            'school_id' => ['required', 'exists:schools,id'],
            'class_id' => ['nullable', 'exists:school_classes,id', new MatchSchoolClass(request('school_id'))],
        ];
    }

    public function messages()
    {
        return [
            'last_name.min' => __('Фамилия не может содержать менее двух букв'),
            'first_name.min' => __('Имя не может содержать менее двух букв'),
            'middle_name.min' => __('Отчество не может содержать менее двух букв'),
            'roles.max' => "Пользователь может иметь только одну роль",
            'roles.*.name' => "Выбранная роль не найдена",
        ];
    }
}
