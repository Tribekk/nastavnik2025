<?php

namespace Domain\Consultation\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConsultationRequest extends FormRequest
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
            'communication_type' => ['required', 'in:zoom,skype,whatsapp,irrelevant'],
            'communication_type_value' => ['nullable', 'string', 'max:191'],
            'wishes_and_questions' => ['nullable', 'max:500'],
        ];
    }

    public function attributes()
    {
        return [
            'communication_type' => '«тип связи»',
            'communication_type_value' => '«ссылка на онлайн-консультацию»',
            "wishes_and_questions" => "«пожелания и вопросы»",
        ];
    }
}
