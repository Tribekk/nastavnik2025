<?php

namespace Domain\Consultation\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreFeedbackConsultationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::user()->hasAnyRole(['student', 'parent']);
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
            'text' => ['nullable', 'max:500'],
        ];
    }

    public function attributes()
    {
        return [
            'emotion' => '«эмоциональное состояние»',
            "text" => "«отзыв»",
        ];
    }
}
