<?php

namespace Domain\Event\Actions;

use Domain\Event\Models\EventInvite;
use Domain\Event\States\EventInvite\EventInviteState;

class GetEventInviteFilterStatesAction
{
    public function run(): array
    {
        $namespaceStates = EventInvite::getStatesFor('state');

        $result = [['value' => 'all', 'title' => 'Показывать все']];
        $tmpEvent = new EventInvite;
        foreach ($namespaceStates as $namespaceState) {
            $stateClass = EventInviteState::resolveStateClass($namespaceState);
            $state = new $stateClass($tmpEvent);
            $result[] = ['value' => $state->code(), 'title' => $state->title()];
        }

        return $result;
    }
}
