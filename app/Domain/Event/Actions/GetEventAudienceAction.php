<?php

namespace Domain\Event\Actions;

use Domain\Event\Models\EventAudience;

class GetEventAudienceAction
{
    public function run(string $q = null, bool $transform = false)
    {
        $query = EventAudience::query();

        if ($transform) {
            $query->select(['id', 'title as text']);

            if($q) {
                $query
                    ->where('title', 'like', '%' . $q . '%');
            }
        }

        if(!$transform && $q) {
            $query
                ->where('title', 'like', '%' . $q . '%');
        }

        return $query->paginate();
    }
}
