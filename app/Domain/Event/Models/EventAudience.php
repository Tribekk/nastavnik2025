<?php

namespace Domain\Event\Models;

use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class EventAudience extends Model
{
    protected $table = "event_audience";

    protected $guarded = ['id'];
}
