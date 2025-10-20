<?php

namespace Domain\Event\Actions;

use Domain\Event\Models\EventFormat;

class GetEventFormatsAction
{
    public function run(string $q = null, bool $transform = false)
    {
        $query = EventFormat::query();

        if ($transform) {
            $query->select(['id', 'title as text']);

            if($q) {
                $query
                    ->where('title', 'like', '%' . $q . '%');
            }
        }

        return $query->paginate();
    }
}
