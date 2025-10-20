<?php

namespace Domain\Event\Actions;

use Domain\Event\Models\EventInvite;
use Domain\Event\Models\EventParticipant;
use Domain\Event\States\EventInvite\AcceptedEventInviteState;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AcceptEventInviteAction
{
    public function run(EventInvite $invite): bool
    {
        try {
            $invite->transitionTo(AcceptedEventInviteState::class);
            if(empty(EventParticipant::where('user_id', $invite->user_id)->where('event_id', $invite->event_id)->first())) {
                $invite->event->participants()->create([
                    'uuid' => Str::uuid(),
                    'user_id' => $invite->user_id,
                ]);
            }

            return true;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return false;
        }
    }
}
