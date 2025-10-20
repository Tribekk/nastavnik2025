<?php

namespace App\Kladr\Actions;


use Domain\Kladr\Models\Kladr;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Auth;

class GetUsedCitiesAction
{
    public function run(string $q = null, string $role = null)
    {
        $codesQuery = User::query()
            ->distinct();

        if($role && $role == "student") {
            $codesQuery->students();
        }

        $codes = $codesQuery->select(['kladr_code as code'])
            ->whereNotNull('kladr_code')
            ->get()->pluck('code');

        if (Auth::user()) {
            if (Auth::user()->orgunit) {

                ///получаем списки локаций, которые разрешены пользователю
                $orgunit = Auth::user()->orgunit;
                if (!empty($orgunit->search_location)) {
                    $orgunit->search_location = unserialize($orgunit->search_location);
                } else {
                    $orgunit->search_location = array('');
                }
                $search_locations = $orgunit->search_location;

                $codes = $codes->filter(function ($code, $key) use ($search_locations) {

                    $is_exist = false;
                    foreach ($search_locations as $search_location) {
                        if ($search_location["city"] == $code) {
                            $is_exist = true;
                        }
                    }

                    if ($is_exist) {
                        return $code;
                    } else {
                        return false;
                    }


                })->toArray();

                /// dd($codes);
            }
        }



        $query = Kladr::query()
            ->distinct()
            ->whereIn('name', $codes)
            ->orWhereIn('code', $codes)
            ->select(['name as text', 'code as id']);

        if($q) {
            $query->where('name', 'like', "%$q%");
        }

        $query->where('socr', 'г');


        return $query->orderByDesc('name')->paginate();
    }
}
