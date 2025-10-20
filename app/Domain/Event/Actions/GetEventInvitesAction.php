<?php

namespace Domain\Event\Actions;

use Domain\Event\Models\EventInvite;
use Domain\User\Models\User;

class GetEventInvitesAction
{
    public function run(User $user, string $q = null, bool $transform = false, array $filters = [])
    {
        $query = EventInvite::query()->where('user_id', $user->id);

        if ($transform) {
            $query->select(['id', 'title as text']);

            if($q) {
                $query
                    ->orWhereHas('event', function ($q1) use ($q) {
                        $q1->where('title', 'like', '%' . $q . '%');
                    });
            }
        }

        if ($q && !$transform) {
            $query
                ->orWhereHas('event', function ($q1) use ($q) {
                    $q1->where('title', 'like', '%' . $q . '%')
                        ->orWhere('location', 'like', '%' . $q . '%');
                });
        }

        if(isset($filters['orgunit_id'])) {
            $query->whereHas('event', fn($q) => $q->where('orgunit_id', $filters['orgunit_id']));
        }

        if(isset($filters['format_id']) && $filters['format_id'] != 'all') {
            $query->whereHas('event', fn($q) => $q->where('format_id', $filters['format_id']));
        }

        if(isset($filters['direction_id'])) {
            $query->whereHas('event', function ($q1) use ($filters) {
                $q1->whereHas('directions', fn($q) => $q->whereIn('direction_id', $filters['direction_id']));
            });
        }

        if(isset($filters['audience_id'])) {
            $query->whereHas('event', function ($q) use ($filters) {
                $q->whereHas('audience', fn($q1) => $q1->whereIn('audience_id', $filters['audience_id']));
            });
        }

        if(isset($filters['state']) && $filters['state'] != 'all') {
            $query->where('state', $filters['state']);
        }

        if(isset($filters['event_state']) && $filters['event_state'] != 'all') {
            $query->whereHas('event', fn($q) => $q->where('state', $filters['event_state']));
        }

        if(isset($filters['start_at'])) {
            $query->whereHas('event', fn($q) => $q->where('start_at', '>=', $filters['start_at']));
        }

        if(isset($filters['finish_at'])) {
            $query->whereHas('event', fn($q) => $q->where('finish_at', '<=', $filters['finish_at']));
        }

        return $query->paginate();
    }
}
