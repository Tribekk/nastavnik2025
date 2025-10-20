<?php

namespace Domain\Employer\Actions;

use Domain\User\Models\User;
use Domain\UserProfile\Actions\UserProfiler;

class GetBaseTestAction
{
    private $profile_id;
    private $search_location;

    public function __construct($profile_id=0,$search_location=null) {
        $this->profile_id=$profile_id;
        $this->search_location=$search_location;
    }

    public function run(string $q = null, array $filters = [], bool $returnUsers = false, int $count = 0)
    {
        $filteredAction = new GetFilteredQueryStagesTestsAndConsultationsAction();

        $query = $filteredAction->run($q, $filters);
        $query->where('base_tests_finished', true);

        $query1 = $filteredAction->run($q, $filters);
        $query1->where('base_tests_finished', true);

        $per_page = key_exists('per_page', $filters) && !empty($filters['per_page']) && is_numeric($filters['per_page']) ? $filters['per_page'] : null;

        if(!$returnUsers) {
            $query->selectRaw('COUNT(*) AS `count`');
        } else return [$query->paginate($per_page), $query1->select('user_id')->pluck('user_id')];

        $query1->select('user_id');

        if($this->profile_id!=0) {
            $value=0;
            $count=0;
            foreach ($query1->get() as $user) {

                $user=User::find($user);
                $valid=false;

                foreach($this->search_location as $search_loc) {



                    if ($search_loc["city"] != "") {


                        if ($search_loc["city"] == $user[0]->kladr_code) {


                            if($search_loc["schools_id"]!="") {

                               if($search_loc["schools_id"]==$user[0]->school_id) {
                                    $valid = true;
                                //    dd($user[0]);
                               }
                            } else {
                                $valid = true;
                            }




                        }
                    } else {
                        $valid=true;
                    }
                }

                if($valid==true) {

                    $userProfile = new UserProfiler($user[0]->id, $this->profile_id);
                     $result = $userProfile->run();

                    if($result['color']!="red" and $result['color']!="black" and $result['color']!="white") {
                        $value=$value+1;
                   }


                }


                //$userProfile = new UserProfiler($user->user_id, $this->profile_id);
                //$result = $userProfile->run();


                $count=$count+1;
            }

            $percentage = $count > 0 ? round((100 / $count) * $value) : 0;


            return [
                'count' => $value,
                'percentage' => $percentage,
            ];


        } else {

            $value = $query->get()[0]->count ?? 0;
            $percentage = $count > 0 ? round((100 / $count) * $value) : 0;

            return [
                'count' => $value,
                'percentage' => $percentage,
            ];

        }
    }
}
