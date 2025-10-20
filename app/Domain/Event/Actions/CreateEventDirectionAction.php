<?php

namespace Domain\Event\Actions;

use Domain\Event\Models\EventDirection;
use Illuminate\Support\Str;

class CreateEventDirectionAction
{
    public function run(array $data): ?EventDirection
    {
        return EventDirection::create([
            'uuid' => Str::uuid(),
            'title' => $data['title'],
        ]);
    }
}
