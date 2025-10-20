<?php

namespace Domain\Consultant\Actions;

use Domain\Consultant\Models\ConsultantAppointmentInterval;

class UpdateConsultantAppointmentIntervalAction
{
    public function run(ConsultantAppointmentInterval $appointment, array $data): bool {
        return $appointment->update([
            'time_interval_id' => $data['time_interval_id'],
            'date_at' => $data['date_at'],
        ]);
    }
}
