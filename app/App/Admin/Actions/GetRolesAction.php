<?php

namespace App\Admin\Actions;

use Spatie\Permission\Models\Role;

class GetRolesAction
{
    public function run(string $q = null, bool $transform = false)
    {
        $query = Role::query();

        if ($transform) {
            $query->select(['id', 'title as text']);

            if($q) {
                $query
                    ->where('title', 'like', '%' . $q . '%');
            }
        }

        if ($q && !$transform) {
            $query
                ->where('name', 'like', '%' . $q . '%')
                ->orWhere('title', 'like', '%' . $q . '%')
                ->orWhere('description', 'like', '%' . $q . '%');
        }

        return $query->paginate();
    }
}
