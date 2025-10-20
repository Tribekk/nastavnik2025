<?php

namespace Domain\Event\Actions;

use Domain\Event\Models\EventInvite;
use Domain\Event\States\EventInvite\CanceledEventInviteState;
use Illuminate\Support\Facades\Log;

class CancelEventInviteAction
{
    public function run(EventInvite $invite): bool
    {
        try {
            $invite->transitionTo(CanceledEventInviteState::class);
            return true;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return false;
        }
    }
}
