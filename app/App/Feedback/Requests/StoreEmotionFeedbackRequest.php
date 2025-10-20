<?php

namespace App\Feedback\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmotionFeedbackRequest extends FormRequest
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
            'emotion' => ['required', 'in:smile,meh,frown'],
        ];
    }

    public function attributes()
    {
        return [
            'emotion' => '«Эмоциональное состояние»',
        ];
    }
}
