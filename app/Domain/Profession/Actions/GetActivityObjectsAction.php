<?php


namespace Domain\Profession\Actions;

use Domain\Quiz\Models\ActivityObject;

class GetActivityObjectsAction
{
    public function run(string $q = null, bool $transform = false)
    {
        $query = ActivityObject::query();

        if($transform) {
            $query->select(['id', 'title as text']);
        }

        if($q) {
            $query->orWhere('title', 'like', "%{$q}%");
        }

        return $query->paginate();
    }
}
