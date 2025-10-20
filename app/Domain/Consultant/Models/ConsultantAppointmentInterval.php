<?php

namespace Domain\Consultant\Models;

use Carbon\Carbon;
use Domain\Consultation\Models\Consultation;
use Domain\User\Models\User;
use Support\Model;

class ConsultantAppointmentInterval extends Model
{
    protected $guarded = [];

    public function consultant()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function interval()
    {
        return $this->belongsTo(ConsultantsAppointmentTimeInterval::class, "time_interval_id");
    }

    public function getDateFormattedAttribute(): string
    {
        return (new Carbon($this->date_at))->format("d.m.Y");
    }

    public function consultation()
    {
        return $this->hasOne(Consultation::class, "appointment_id", "id");
    }

    public function getStartFormattedAttribute(): string
    {
        return (new Carbon($this->interval->start_at))->format("h:i");
    }

    public function getFinishFormattedAttribute(): string
    {
        return (new Carbon($this->interval->finish_at))->format("h:i");
    }
}
