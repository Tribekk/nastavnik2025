<?php

namespace Domain\Event\Actions;

use Domain\Event\Models\EventAudience;
use Illuminate\Support\Str;

class CreateEventAudienceAction
{
    public function run(array $data): ?EventAudience
    {
        return EventAudience::create([
            'uuid' => Str::uuid(),
            'title' => $data['title'],
        ]);
    }
}
