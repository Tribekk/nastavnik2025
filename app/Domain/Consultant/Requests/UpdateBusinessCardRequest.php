<?php

namespace Domain\Consultant\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBusinessCardRequest extends FormRequest
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
        serializeArrayValue($inputs, 'regalia_and_experience');

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
            'regalia_and_experience' => ['required', 'string', 'max:4096'],
            'experience' => ['required', 'integer', 'min:1', 'max:100'],
        ];
    }

    public function attributes()
    {
        return [
            'regalia_and_experience' => '«регалии и опыт»',
            'experience' => '«суммарный опыт работы»',
        ];
    }
}
