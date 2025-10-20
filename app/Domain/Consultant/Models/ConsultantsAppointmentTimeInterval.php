<?php

namespace Domain\Consultant\Models;

use Carbon\Carbon;
use Support\Model;

class ConsultantsAppointmentTimeInterval extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $appends = [
        'title',
    ];

    public function getTitleAttribute(): string
    {
        return
            (new Carbon($this->start_at))->format("H:i") .
            " - " .
            (new Carbon($this->finish_at))->format("H:i");
    }
}
