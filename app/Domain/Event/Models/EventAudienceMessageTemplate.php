<?php

namespace Domain\Event\Models;

use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class EventAudienceMessageTemplate extends Model
{
    protected $guarded = ['id'];

    public function event()
    {
        return $this->belongsTo(Event::class, "event_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "event_id");
    }
}
