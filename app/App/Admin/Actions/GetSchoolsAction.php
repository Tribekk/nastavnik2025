<?php

namespace App\Admin\Actions;

use Domain\Admin\Models\School;

class GetSchoolsAction
{
    public function run(string $q = null, bool $transform = false)
    {
        $query = School::query();

        if ($transform) {
            $query->select(['id', 'short_title as text']);

            if($q) {
                $query
                    ->where('short_title', 'like', '%' . $q . '%');
            }
        }

        if ($q && !$transform) {
            $query
                ->where('title', 'like', '%' . $q . '%')
                ->orWhere('short_title', 'like', '%' . $q . '%')
                ->orWhere('address', 'like', '%' . $q . '%');
        }

        return $query->paginate();
    }
}
