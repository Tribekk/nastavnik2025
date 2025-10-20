<?php

namespace Domain\Consultant\Actions;

use Domain\Consultant\Models\ConsultantAppointmentInterval;
use Domain\User\Models\User;
use Illuminate\Support\Str;

class CreateConsultantAppointmentIntervalAction
{
    public function run(User $user, array $data): ?ConsultantAppointmentInterval {
        return ConsultantAppointmentInterval::create([
            'uuid' => Str::uuid(),
            'consultant_id' => $user->id,
            'time_interval_id' => $data['time_interval_id'],
            'date_at' => $data['date_at'],
        ]);
    }
}
