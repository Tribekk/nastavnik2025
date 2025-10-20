<?php


namespace Domain\School\Actions;


use Domain\Admin\Models\ClassProfile;

class GetClassProfilesAction
{
    public function run(string $q = null, bool $transform = false)
    {
        $query = ClassProfile::query();

        if($transform) {
            $query->select(['id', 'title as text']);
        }

        if ($q) {
            $query
                ->orWhere('title', 'like', '%' . $q . '%');
        }

        return $query->paginate();
    }
}
