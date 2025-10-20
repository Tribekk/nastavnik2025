<?php

namespace Domain\Event\Actions;

use Domain\Event\Models\EventParticipant;

class UpdateEventParticipantAction
{
    public function run(EventParticipant $participant, array $data): bool
    {
        return $participant->update([
            'visited' => boolval($data['visited'] ?? false),
        ]);
    }
}
