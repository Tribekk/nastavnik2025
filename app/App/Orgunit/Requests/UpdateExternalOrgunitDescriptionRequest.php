<?php

namespace App\Orgunit\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExternalOrgunitDescriptionRequest extends FormRequest
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
        $inputs = parent::all($keys);
        if(isset($inputs['career_program'])) {
            $inputs['career_program'] = serializationString($inputs['career_program']);
        }

        if(isset($inputs['about_orgunit'])) {
            $inputs['about_orgunit'] = serializationString($inputs['about_orgunit']);
        }

        if(isset($inputs['contacts'])) {
            $inputs['contacts'] = serializationString($inputs['contacts']);
        }

        return $inputs;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'career_program' => ['nullable', 'string', 'max:45000'],
            'about_orgunit' => ['nullable', 'string', 'max:45000'],
            'contacts' => ['nullable', 'string', 'max:45000'],
        ];
    }

    public function attributes()
    {
        return [
            'career_program' => '«карьерные программы»',
            'about_orgunit' => '«о компании»',
            'contacts' => '«контакты»'
        ];
    }
}
