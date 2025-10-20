<?php

namespace Domain\Employer\Actions;

use Domain\Quiz\Models\CharacterTrait;
use Illuminate\Support\Facades\DB;

class GetCharacterTraitsAction
{
    public function run()
    {
        $higherTraits = CharacterTrait::query()
            ->select([DB::raw('CONCAT_WS("", code, "-higher") as value'), 'higher_value as title'])
            ->get()->toArray();

        $lowerTraits = CharacterTrait::query()
            ->select([DB::raw('CONCAT_WS("", code, "-lower") as value'), 'lower_value as title'])
            ->get()->toArray();

        return array_merge([['title' => 'Показать все', 'value' => 'all']], $lowerTraits, $higherTraits);
    }
}
