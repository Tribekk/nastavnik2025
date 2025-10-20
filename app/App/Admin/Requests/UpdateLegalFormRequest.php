<?php

namespace App\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLegalFormRequest extends FormRequest
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
            'short_title' => ['nullable', 'string', 'max:191'],
        ];
    }

    public function attributes()
    {
        return [
            'user_code' => '«пользовательский код»',
            'code' => '«системный код»',
        ];
    }
}
