<?php

namespace App\Kladr\Actions;

use Domain\Kladr\Models\Kladr;
use Domain\Kladr\Models\Street;

class GetStreetsAction
{
    public function run(string $q = null)
    {
        $query = Street::query()
            ->select(['name as text', 'code as id']);

        if($q) {
            $query
                ->orWhere('name', 'like', "{$q}%");
        }

        if(request('region', false)) {
            $query->where('code', 'like', request('region')."%");
        }

        if (request('city', false)) {
            $city = Kladr::where('code', request('city'))
                ->where('code', '!=', request('region') . '00000000000')->first();

            if (isset($city) && !empty($city)) {
                $city_okatd = $city->okatd;
                $query->where(function ($query) use ($city_okatd) {
                    $query->where('ocatd', $city_okatd)
                        ->orWhereNull('ocatd');
                });

            }
        }

        return $query->where('socr', 'ул')->orderBy('name')->paginate();
    }
}
