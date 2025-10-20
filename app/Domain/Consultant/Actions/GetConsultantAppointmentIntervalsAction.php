<?php

namespace Domain\Consultant\Actions;

use Domain\Consultant\Models\ConsultantAppointmentInterval;
use Domain\Consultant\Models\ConsultantsAppointmentTimeInterval;
use Domain\User\Models\User;
use Illuminate\Http\Request;

class GetConsultantAppointmentIntervalsAction
{
    public function run(User $user, Request $request) {
        $query = ConsultantAppointmentInterval::query();

        if($request->q) {
            $query->where('date_at', 'like', "%{$request->q}%")
                ->orWhereHas('interval', function ($q) use ($request) {
                   $q->where('start_at', 'like', "%{$request->q}%")
                       ->orWhere('finish_at', 'like', "%{$request->q}%");
                });
        }

        if($request->date_at) {
            $date_at = [];

            $date_at['dash'] = $request->input('date_at');
            $date_at['point'] = date("d.m.Y", strtotime($date_at['dash']));

            $query->where('date_at', 'like', $date_at['dash'])
                ->orwhere('date_at', 'like', '%'.$date_at['point'].'%');
        }

        if($request->time_interval_id) {
            $query->where('time_interval_id', $request->time_interval_id);
        }

        $timeIntervals = \DB::table('consultants_appointment_time_intervals')
            ->select('start_at', 'finish_at', 'id as time_interval_id');

        $query->where('consultant_id', $user->id)
            ->joinSub($timeIntervals, 'consultants_appointment_time_intervals', function ($q) {
                $q->on('consultants_appointment_time_intervals.time_interval_id', '=', 'consultant_appointment_intervals.time_interval_id');
            });


        return $query->orderByRaw("date_at desc, start_at desc")
            ->paginate();
    }
}
