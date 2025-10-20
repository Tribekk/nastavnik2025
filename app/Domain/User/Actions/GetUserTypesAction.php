<?php

namespace Domain\User\Actions;

use Domain\User\Models\UserType;

class GetUserTypesAction
{
    public function run(string $q = null, bool $transform = false)
    {
        $query = UserType::query();

        if ($transform) {
            $query->select(['id', 'title as text']);
        }

        if ($q) {
            $query->where('title', 'like', '%' . $q . '%');
        }

        return $query->paginate();
    }
}
