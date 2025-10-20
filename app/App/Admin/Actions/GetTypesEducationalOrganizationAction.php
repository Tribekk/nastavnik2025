<?php

namespace App\Admin\Actions;

use Domain\Admin\Models\TypeEducationalOrganization;

class GetTypesEducationalOrganizationAction
{
    public function run(string $q = null, bool $transform = false)
    {
        $query = TypeEducationalOrganization::query();

        if ($transform) {
            $query->select(['id', 'title as text']);

            if($q) {
                $query
                    ->where('title', 'like', '%' . $q . '%');
            }
        }

        if ($q && !$transform) {
            $query
                ->where('title', 'like', '%' . $q . '%')
                ->orWhere('number', 'like', '%' . $q . '%')
                ->orWhere('address', 'like', '%' . $q . '%');
        }

        return $query->paginate();
    }
}
