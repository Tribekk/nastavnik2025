<?php

namespace Domain\Consultant\Requests;

use Domain\Consultant\Rules\MatchFreeConsultantAppointmentInterval;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMeetingScheduleRequest extends FormRequest
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
            'date_at' => ['required', 'date', 'after:16.11.2020', 'before:30.12.2022'],
            'time_interval_id' => ['required', 'exists:consultants_appointment_time_intervals,id', new MatchFreeConsultantAppointmentInterval(request()->user()->id, request('date_at'), $this->route('appointment')->id ?? 0)],
        ];
    }

    public function attributes()
    {
        return [
            'date_at' => '«день»',
            'time_interval_id' => '«временной промежуток»',
        ];
    }
}
