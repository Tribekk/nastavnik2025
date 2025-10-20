<?php

namespace Domain\Event\Actions;

use Domain\Event\Models\EventParticipant;
use Domain\User\Models\User;

class GetUserEventsAction
{
    public function run(User $user, string $q = null, bool $transform = false, array $filters = null)
    {
        $query = EventParticipant::query()->where('user_id', $user->id);

        if ($transform) {
            $query->select(['id', 'title as text']);

            if($q) {
                $query
                    ->whereHas('event', function ($q1) use ($q) {
                       $q1->where('title', 'like', '%' . $q . '%');
                    });
            }
        }

        if ($q && !$transform) {
            $query
                ->whereHas('event', function ($q1) use ($q) {
                    $q1->orWhere('title', 'like', '%' . $q . '%')
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
            $query->whereHas('event', function ($q1) use ($filters) {
                $q1->whereHas('audience', fn($q) => $q->whereIn('audience_id', $filters['audience_id']));
            });
        }

        if(isset($filters['state']) && $filters['state'] != 'all') {
            $query->whereHas('event', fn($q) => $q->where('state', $filters['state']));
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
