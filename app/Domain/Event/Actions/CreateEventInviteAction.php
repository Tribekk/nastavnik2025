<?php

namespace Domain\Event\Actions;

use Domain\Event\Models\Event;
use Domain\Event\Models\EventInvite;
use Domain\User\Models\User;
use Illuminate\Support\Str;

class CreateEventInviteAction
{
    public function run(Event $event, User $user): EventInvite
    {
        return EventInvite::create([
            'uuid' => Str::uuid(),
            'user_id' => $user->id,
            'event_id' => $event->id,
        ]);
    }
}
