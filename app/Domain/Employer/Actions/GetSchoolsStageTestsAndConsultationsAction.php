<?php

namespace Domain\Employer\Actions;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GetSchoolsStageTestsAndConsultationsAction
{
    public function run(string $q = null)
    {
        $query = DB::table('stages_tests_and_consultations')
            ->whereNull('deleted_at')
            ->distinct()
            ->selectRaw("school as text, CONCAT('', school) as id, s_number");


        $school = DB::table('schools')
            ->select(['id as s_id', 'number as s_number','short_title']);



        $query->leftJoinSub($school, "s", "s_id", '=', 'school_id')
            ->orderByRaw('s_number asc');

        if($q) {
            $query->where('school', 'like', '%'.$q.'%');
        }

        $collection=$query->get();


        if(Auth::user()) {
            if(Auth::user()->orgunit) {

                ///получаем списки локаций, которые разрешены пользователю
                $orgunit=Auth::user()->orgunit;

                if(!empty($orgunit->search_location)) {
                    $orgunit->search_location=unserialize($orgunit->search_location);
                } else {
                    $orgunit->search_location=array('');
                }
                $search_locations=$orgunit->search_location;

                $collection=$collection->filter(function($item, $key) use($search_locations) {

                    $is_exist=false;
                    foreach($search_locations as $search_location) {

                        if($search_location["school_name"]==$item->text) {
                            $is_exist=true;
                        }
                    }
                    if($is_exist==true) {
                        return $item;
                    } else {
                        return false;
                    }


                })->toArray();

                $collection=array_values($collection);


                /// dd($codes);
            }
        }

        $collection=collect($collection);



        $page = null;
        $pageName="page";
        $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
        $total = null;

        $perPage=25;
        $result=new LengthAwarePaginator(
            $collection->forPage($page, $perPage),
            $total ?: $collection->count(),
            $perPage,
            $page,
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => $pageName,
            ]
        );


        return $result;
    }
}
