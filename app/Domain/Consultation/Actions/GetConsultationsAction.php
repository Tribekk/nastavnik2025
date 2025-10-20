<?php

namespace Domain\Consultation\Actions;

use Domain\Consultation\Models\Consultation;
use Domain\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GetConsultationsAction
{
    public function run(User $user, Request $request)
    {
        $query = Consultation::query();

        if($user->hasRole('parent')) {
            $query->where('parent_id', $user->id);
        }

        if($user->hasRole('student')) {
            $query->where('child_id', $user->id);
        }

        if($user->hasRole('consultant')) {
            $query->where('consultant_id', $user->id);
        }
//        dd($query->toSql());
        if($request->input('date_at')) {

            $date_at['dash'] = $request->input('date_at');
            $date_at['point'] = date("d.m.Y", strtotime($date_at['dash']));

            $query->whereHas('appointment', function ($q) use ($date_at) {
                $q->where('date_at', 'like', $date_at['dash'])
                ->orWhere('date_at', 'like', $date_at['point']);
            });
        }

        if($request->input('q')) {
            $query->whereHas('consultant', function ($q) use ($request) {
                $q->where('first_name', 'like', "%{$request->q}%")
                    ->orWhere('last_name', 'like', "%{$request->q}%")
                    ->orWhere('middle_name', 'like', "%{$request->q}%");
            })->orWhereHas('child', function ($q) use ($request) {
                $q->where('first_name', 'like', "%{$request->q}%")
                    ->orWhere('last_name', 'like', "%{$request->q}%")
                    ->orWhere('middle_name', 'like', "%{$request->q}%");
            })->orWhereHas('parent', function ($q) use ($request) {
                $q->where('first_name', 'like', "%{$request->q}%")
                    ->orWhere('last_name', 'like', "%{$request->q}%")
                    ->orWhere('middle_name', 'like', "%{$request->q}%");
            });
        }

        // join`ы
        $appointmentIntervals = \DB::table('consultant_appointment_intervals')
            ->select(['id as ai_id', 'time_interval_id', 'date_at']);


        $timeIntervals = \DB::table('consultants_appointment_time_intervals')
            ->select(['id as ti_id', 'start_at']);
//        dd($appointmentIntervals, $timeIntervals);
        $query->joinSub($appointmentIntervals, 'ai', 'ai_id', '=', 'appointment_id')
            ->joinSub($timeIntervals, "ti", "ti_id", '=', 'time_interval_id');


//dd($query->toSql());
        return $query->orderByRaw('date_at desc, start_at desc')->paginate();
    }
}
