<?php

namespace App\Event\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class StoreEventRequest extends FormRequest
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
            'start_at' => ['required', 'date_format:Y-m-d\TH:i'],
            'finish_at' => ['required', 'date_format:Y-m-d\TH:i', 'after:'.$startAtFormat],
            'location' => ['nullable', 'string', 'max:191'],
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
            'location' => '«место проведения»',
        ];
    }
}
