<?php

namespace Domain\Event\Actions;


use Domain\Event\Models\Event;

class GetEventsAction
{
    public function run(string $q = null, bool $transform = false, array $filters = null, int $orgunitId = null)
    {
        $query = Event::query();

        if ($transform) {
            $query->select(['id', 'title as text']);

            if($q) {
                $query
                    ->where('title', 'like', '%' . $q . '%');
            }
        }

        if ($q && !$transform) {
            $query
                ->orWhere('title', 'like', '%' . $q . '%')
                ->orWhere('location', 'like', '%' . $q . '%');
        }

        if($orgunitId || isset($filters['orgunit_id'])) {
            $query->whereIn('orgunit_id', [intval($orgunitId), intval($filters['orgunit_id'] ?? 0)]);
        }

        if(isset($filters['format_id']) && $filters['format_id'] != 'all') {
            $query->where('format_id', $filters['format_id']);
        }

        if(isset($filters['direction_id'])) {
            $query->whereHas('directions', fn($q) => $q->whereIn('direction_id', $filters['direction_id']));
        }

        if(isset($filters['audience_id'])) {
            $query->whereHas('audience', fn($q) => $q->whereIn('audience_id', $filters['audience_id']));
        }

        if(isset($filters['state']) && $filters['state'] != 'all') {
            $query->where('state', $filters['state']);
        }

        if(isset($filters['start_at'])) {
            $query->where('start_at', '>=', $filters['start_at']);
        }

        if(isset($filters['finish_at'])) {
            $query->where('finish_at', '<=', $filters['finish_at']);
        }

        return $query->paginate();
    }
}
