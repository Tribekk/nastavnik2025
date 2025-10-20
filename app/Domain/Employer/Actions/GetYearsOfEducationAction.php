<?php

namespace Domain\Employer\Actions;

use Domain\Admin\Models\SchoolClass;

class GetYearsOfEducationAction
{
    public function run()
    {
        $years = SchoolClass::distinct()
            ->select(['year AS value', 'year AS title'])
            ->whereNotNull('year')
            ->get()->toArray();


        return array_merge([['value' => 'all', 'title' => 'Показать все']], $years);
    }
}
