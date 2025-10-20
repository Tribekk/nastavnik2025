<?php

namespace Domain\Event\Actions;

use Domain\Event\Models\EventDirection;

class UpdateEventDirectionAction
{
    public function run(EventDirection $direction, array $data): bool
    {
        return $direction->update([
           'title' => $data['title'],
        ]);
    }
}
