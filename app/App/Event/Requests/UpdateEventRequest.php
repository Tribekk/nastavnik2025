<?php

namespace App\Event\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Support\Rules\FilenameRegex;

class UpdateEventRequest extends FormRequest
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
        serializeArrayValue($inputs, 'program');

        return $inputs;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $startAtFormat = request('start_at');
        try {
            $startAtFormat = (new Carbon(request('start_at')))->format('d.m.Y H:i');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return [
            'title' => ['required', 'string', 'max:191'],
            'direction_id' => ['required', 'min:1'],
            'direction_id.*' => ['exists:event_directions,id'],
            'format_id' => ['required', 'exists:event_formats,id'],
            'audience_id' => ['required', 'min:1'],
            'audience_id.*' => ['exists:event_audience,id'],
            'state' => ['nullable'],
            'location' => ['nullable', 'string', 'max:191'],
            'program' => ['nullable', 'string', 'max:500000'],
            'attached_files' => ['nullable', 'max:5'],
            'attached_files.*' => ['nullable', 'file', 'mimes:pdf', 'max:10000'],
            'start_at' => ['required', 'date_format:Y-m-d\TH:i'],
            'finish_at' => ['required', 'date_format:Y-m-d\TH:i', 'after:'.$startAtFormat],
        ];
    }

    public function attributes()
    {
        return [
            'title' => '«название»',
            'direction_id' => '«направление»',
            'direction_id.*' => '«направление»',
            'format_id' => '«формат»',
            'audience_id' => '«аудитория»',
            'audience_id.*' => '«аудитория»',
            'start_at' => '«время начала»',
            'finish_at' => '«время завершения»',
            'state' => '«статус»',
            'location' => '«место проведения»',
            'program' => '«программа»',
        ];
    }

    public function messages()
    {
        return [
            'attached_files.max' => 'Кол-во загружаемых файлов не должно быть более 5.',
            'attached_files.*.mimes' => 'Разрешена загрузка только PDF файлов.',
            'attached_files.*.max' => 'Размер PDF файла не может превышать допустимый размер 10Мб.',
        ];
    }
}
