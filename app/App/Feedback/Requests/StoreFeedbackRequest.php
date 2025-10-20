<?php

namespace App\Feedback\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackRequest extends FormRequest
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
            'events_attached_earlier' => ['nullable', 'string', 'max:191'],
            'project_definition' => ['nullable', 'string', 'max:191'],
            'mark' => ['required'],
            'emotion' => ['required', 'in:smile,meh,frown'],
            'comment' => ['nullable', 'string', 'max:1024'],
        ];
    }

    public function attributes()
    {
        return [
            'events_attached_earlier' => '«Участие в профориентационных мероприятиях»',
            'project_definition' => '«Определение проекта»',
            'mark' => '«Оценка проекта»',
            'emotion' => '«Эмоциональное состояние»',
            'comment' => '«Комментарий»',
        ];
    }
}
