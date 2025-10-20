<?php

namespace Domain\Event\Actions;

use Domain\Event\Models\Event;
use Domain\Event\Models\EventParticipant;

class GetEventParticipantsAction
{
    public function run(Event $event, string $q = null, bool $transform = false, array $filters = [])
    {
        $query = EventParticipant::query()->where('event_id', $event->id);

        if ($transform) {
            $query->select(['id', 'title as text']);

            if($q) {
                $query
                    ->orWhereHas('user', function ($q1) use ($q) {
                        $q1->where('first_name', 'like', '%' . $q . '%')
                            ->orWhere('last_name', 'like', '%' . $q . '%')
                            ->orWhere('middle_name', 'like', '%' . $q . '%');
                    });
            }
        }

        if ($q && !$transform) {
            $query
                ->orWhereHas('user', function ($q1) use ($q) {
                    $q1->where('first_name', 'like', '%' . $q . '%')
                        ->orWhere('last_name', 'like', '%' . $q . '%')
                        ->orWhere('middle_name', 'like', '%' . $q . '%');
                });
        }

        if(isset($filters['start_at'])) {
            $query->where('created_at', '>=', $filters['start_at']);
        }

        if(isset($filters['finish_at'])) {
            $query->where('created_at', '<=', $filters['finish_at']);
        }

        return $query->paginate();
    }
}
