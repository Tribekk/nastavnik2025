<?php

namespace Domain\Consultant\Controllers;

use DB;
use Domain\Consultant\Actions\CreateConsultantAppointmentIntervalAction;
use Domain\Consultant\Actions\GetConsultantAppointmentIntervalsAction;
use Domain\Consultant\Actions\UpdateConsultantAppointmentIntervalAction;
use Domain\Consultant\Models\ConsultantAppointmentInterval;
use Domain\Consultant\Models\ConsultantsAppointmentTimeInterval;
use Domain\Consultant\Requests\StoreMeetingScheduleRequest;
use Domain\Consultant\Requests\UpdateMeetingScheduleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Support\Controller;

class MeetingScheduleController extends Controller
{
    public function index(Request $request, GetConsultantAppointmentIntervalsAction $action)
    {
        $appointments = $action->run(Auth::user(), $request);
        return view('consultant.meeting-schedule.index')
            ->withAppointments($appointments);
    }

    public function create()
    {
        $timeIntervals = ConsultantsAppointmentTimeInterval::select(['id as value', 'start_at', 'finish_at'])->get()->toArray();
        return view('consultant.meeting-schedule.create')
            ->withTimeIntervals($timeIntervals);
    }

    public function store(StoreMeetingScheduleRequest $request, CreateConsultantAppointmentIntervalAction $action)
    {
        $action->run($request->user(), $request->validated());
        return redirect()->to(route('consultant.meeting_schedule'));
    }

    public function updateForm(ConsultantAppointmentInterval $appointment)
    {
        if($appointment->consultant_id != Auth::id()) abort(403);

        $timeIntervals = ConsultantsAppointmentTimeInterval::select(['id as value', 'start_at', 'finish_at'])->get()->toArray();

        return view('consultant.meeting-schedule.update')
            ->withAppointment($appointment)
            ->withTimeIntervals($timeIntervals);
    }

    public function update(UpdateMeetingScheduleRequest $request, ConsultantAppointmentInterval $appointment, UpdateConsultantAppointmentIntervalAction $action)
    {
        if($appointment->consultant_id != Auth::id()) abort(403);
        $action->run($appointment, $request->validated());
        return redirect()->to(route('consultant.meeting_schedule'));
    }

    public function destroy(ConsultantAppointmentInterval $appointment)
    {
        if($appointment->consultant_id != Auth::id()) abort(403);

        try {
            $appointment->delete();
        } catch (\Exception $exception) {
            return back()->withErrors(['error' => 'Не удалось удалить запись т.к. кто-то уже записался на эту консультацию.']);
        }

        return redirect()->to(route('consultant.meeting_schedule'));
    }
}
