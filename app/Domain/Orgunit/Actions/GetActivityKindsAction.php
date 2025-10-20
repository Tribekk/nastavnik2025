<?php

namespace Domain\Orgunit\Actions;

use Domain\Orgunit\Models\ExternalOrgunitActivityKind;
use Domain\Orgunit\Models\LegalForm;
use Domain\UserProfile\Models\UserProfile;
use Illuminate\Support\Facades\Auth;

class GetActivityKindsAction
{
    public function run(string $q = null, bool $transform = false, array $filters = null)
    {
        $query = UserProfile::query();

        if ($transform) {
            $query->select(['id', 'title as text']);
            //$query->enabled();

            if($q) {
                $query
                    ->where('title', 'like', '%' . $q . '%');
            }
        }

        if ($q && !$transform) {
            $query
                ->where('title', 'like', '%' . $q . '%')
                ->orWhere('title', 'like', '%' . $q . '%');
        }


        if(!empty($filters['title'])) {
            $query->where('title', 'like', "%".$filters['title']."%");
        }


        $codes=$query->get();



        if(Auth::user()) {
            if(Auth::user()->orgunit) {

                ///получаем списки локаций, которые разрешены пользователю
                $orgunit=Auth::user()->orgunit;
                foreach($orgunit->activityKinds()->get() as $aktivity_kind) {
                    $profile=UserProfile::find($aktivity_kind->activityKind()->first()->id);
                    $profiles[]=$profile;
                }


                $codes=$codes->filter(function($code, $key) use($profiles) {


                    $is_exist=false;


                    foreach($profiles as $profile_id) {

                        if($code->id==$profile_id->id) {
                            $is_exist=true;
                        }


                    }
                    if($is_exist==true) {
                        return $code;
                    } else {
                        return false;
                    }


                })->toArray();



                /// dd($codes);
            }
        }

        $code_filter=array();
        foreach($codes as $code) {
            $code_filter[]=$code["id"];
        }
       //dd($code_filter);

        /*
        if(!empty($filters['short_title'])) {
            $query->where('short_title', 'like', "%".$filters['short_title']."%");
        }

        if(!empty($filters['code'])) {
            $query->where('code', 'like', "%".$filters['code']."%");
        }*/



        return $query->whereIn("id",$code_filter)->paginate();
    }
}
