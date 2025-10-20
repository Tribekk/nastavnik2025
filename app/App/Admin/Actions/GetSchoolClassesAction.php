<?php

namespace App\Admin\Actions;

use Domain\Admin\Models\SchoolClass;

class GetSchoolClassesAction
{
    public function run(int $schoolId, string $q = null, bool $transform = false)
    {
        $query = SchoolClass::query()->where('school_id', $schoolId);


        if ($transform) {
            $query->select(['id', 'letter', 'number', 'year']);
        }

        if ($q) {
            $query
                ->where(function($q1) use ($q) {
                    $segments = str_split($q);

                    foreach ($segments as $segment) {
                        $q1->orWhere('letter', 'like', '%' . $segment . '%')
                            ->orWhere('number', 'like', '%' . $segment . '%')
                            ->orWhere('year', 'like', '%' . $segment . '%');
                    }
                });
        }

        return $query->paginate();
    }
}
