<?php

namespace Domain\Event\Models;

use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class EventFormat extends Model
{
    protected $guarded = ['id'];

    public function event()
    {
        return $this->hasMany(Event::class, "format_id");
    }
}
