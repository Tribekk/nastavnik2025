<?php


namespace App\Kladr\Actions;

use Domain\Kladr\Models\Kladr;

class GetCitiesAction
{
    public function run(string $q = null, string $region = '__')
    {
        $query = Kladr::query();

        $query->select(['code as id', 'name as text']);

        if($q) {
            $query->orWhere('name', 'like', "%{$q}%");
        }

        return $query->where('socr', 'г')
            ->where('kladr.code', 'like', "{$region}%00")
            ->orderByDesc('name')
            ->paginate();
    }
}
