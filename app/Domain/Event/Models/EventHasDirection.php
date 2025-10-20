<?php

namespace Domain\Event\Models;

use Illuminate\Database\Eloquent\Model;

class EventHasDirection extends Model
{
    protected $guarded = ['id'];

    public function event()
    {
        return $this->belongsTo(Event::class, "event_id");
    }

    public function direction()
    {
        return $this->belongsTo(EventDirection::class, "direction_id");
    }
}
