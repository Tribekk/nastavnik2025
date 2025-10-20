<?php


namespace Domain\Profession\Actions;

use Domain\Quiz\Models\ActivityKind;

class GetActivityKindsAction
{
    public function run(string $q = null, bool $transform = false)
    {
        $query = ActivityKind::query();

        if($transform) {
            $query->select(['id', 'title as text']);
        }

        if($q) {
            $query->orWhere('title', 'like', "%{$q}%");
        }

        return $query->paginate();
    }
}
