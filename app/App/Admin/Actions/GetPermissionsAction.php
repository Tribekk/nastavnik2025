<?php

namespace App\Admin\Actions;

use Spatie\Permission\Models\Permission;

class GetPermissionsAction
{
    public function run(string $q = null, bool $transform = false)
    {
        $query = Permission::query();

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
                ->orWhere('description', 'like', '%' . $q . '%')
                ->orWhere('guard_name', 'like', '%' . $q . '%');
        }

        return $query->paginate();
    }
}
