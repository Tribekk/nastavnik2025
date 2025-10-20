<?php

namespace App\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolRequest extends FormRequest
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
        $data['phone'] = unFormatPhone($data['phone']);
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
            'title' => ['required', 'string', 'max:191',  'unique:schools'],
            'short_title' => ['required', 'string', 'max:191'],
            'address' => ['nullable', 'string', 'max:191'],
            'local' => ['nullable', 'string', 'max:191'],

            'number' => ['required', 'integer', 'max:5000'],
            'director' => ['nullable', 'string', 'max:191'],
            'phone' => ['nullable', 'string', 'max:12', 'min:12'],
            'email' => ['nullable', 'email', 'max:191'],
            'type_of_educational_organization_id' => ['required', 'exists:types_of_educational_organization,id'],
            'loyalty_level_id' => ['nullable', 'exists:loyalty_levels,id'],
            'token' => ['required', 'string', 'max:9'],
        ];
    }

    public function attributes()
    {
        return [
            'director' => '«ФИО директора»',
            'number' => '«номер компании»',
            'token' => '«ключ регистрации»',
        ];
    }
}
