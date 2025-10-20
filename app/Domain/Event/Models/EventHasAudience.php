<?php

namespace Domain\Event\Models;

use Illuminate\Database\Eloquent\Model;

class EventHasAudience extends Model
{
    protected $guarded = ['id'];

    protected $table = 'event_has_audience';

    public function event()
    {
        return $this->belongsTo(Event::class, "event_id");
    }

    public function audience()
    {
        return $this->belongsTo(EventAudience::class, "audience_id");
    }
}
