<?php

namespace Domain\Employer\Actions;

use Domain\User\Models\User;

class GetRegistrationStudentsCountAction
{

    protected $search_location;

    public function __construct($search_location=null)
    {
        $this->search_location=$search_location;
    }


    public function run(string $q = null, array $filters = [], bool $returnUsers = false, int $count = 0)
    {

        $filteredAction = new GetFilteredQueryStagesTestsAndConsultationsAction();
        $query = $filteredAction->run($q, $filters);
        $query1 = $filteredAction->run($q, $filters);

        $per_page = key_exists('per_page', $filters) && !empty($filters['per_page']) && is_numeric($filters['per_page']) ? $filters['per_page'] : null;

        if ($returnUsers) return [$query->paginate($per_page), $query1->select('user_id')->pluck('user_id')];
        else $query->selectRaw('COUNT(*) AS `count`');

        if ($this->search_location != null) {

            $value = 0;
            $count = 0;
            foreach ($query1->get() as $user) {

                $user = User::find($user);
                $valid = false;

                foreach ($this->search_location as $search_loc) {

                    if ($search_loc["city"] != "") {

                        if ($search_loc["city"] == $user[0]->kladr_code) {

                            if ($search_loc["schools_id"] != "") {

                                if ($search_loc["schools_id"] == $user[0]->school_id) {
                                    $valid = true;
                                }

                            } else {
                                $valid = true;
                            }

                        }
                    } else {
                        $valid = true;
                    }
                }

                if ($valid == true) {

                    $value = $value + 1;

                }


                $count = $count + 1;
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
