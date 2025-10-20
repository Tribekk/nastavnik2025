<?php

namespace Domain\Employer\Actions;

use Domain\Quiz\Models\CharacterTrait;
use Domain\Quiz\Models\ProfessionalType;
use Illuminate\Support\Facades\DB;

class GetPersonTypesAction
{
    public function run()
    {
        $types = ProfessionalType::query()
            ->select(['short_code as value', 'title'])
            ->get()->toArray();

        return array_merge([['title' => 'Показать все', 'value' => 'all']], $types);
    }
}
