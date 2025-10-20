<?php

namespace Domain\Event\Models;

use Domain\Event\States\Event\EventState;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class EventParticipant extends Model
{
    protected $guarded = ['id'];

    public function event()
    {
        return $this->belongsTo(Event::class, "event_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function getEventStateAttribute()
    {
        return EventState::find($this->event->state, $this->event);
    }
}
