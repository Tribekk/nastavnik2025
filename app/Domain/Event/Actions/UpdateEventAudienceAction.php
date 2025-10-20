<?php

namespace Domain\Event\Actions;

use Domain\Event\Models\EventAudience;

class UpdateEventAudienceAction
{
    public function run(EventAudience $audience, array $data): bool
    {
        return $audience->update([
           'title' => $data['title'],
        ]);
    }
}
