<?php

namespace Domain\Event\Actions;

use Domain\Event\Models\Event;
use Domain\Event\States\Event\EventState;

class GetEventFilterStatesAction
{
    public function run(): array
    {
        $namespaceStates = Event::getStatesFor('state');

        $result = [['value' => 'all', 'title' => 'Показывать все']];
        $tmpEvent = new Event;
        foreach ($namespaceStates as $namespaceState) {
            $stateClass = EventState::resolveStateClass($namespaceState);
            $state = new $stateClass($tmpEvent);
            $result[] = ['value' => $state->code(), 'title' => $state->title()];
        }

        return $result;
    }
}
