<?php

namespace Domain\Employer\Actions;

use Domain\User\Models\StageTestsAndConsultations;

class GetGotConsultationAction
{
    public function run(string $q = null, array $filters = [], bool $returnUsers = false, int $count = 0)
    {
        $filteredAction = new GetFilteredQueryStagesTestsAndConsultationsAction();
        $query = $filteredAction->run($q, $filters);
        $query->where('got_consultation_with_parent', true)
            ->orWhere('got_consultation', true);

        $query1 = $filteredAction->run($q, $filters);
        $query1->where('got_consultation_with_parent', true)
            ->orWhere('got_consultation', true);

        if(!$returnUsers) {
            $query->selectRaw('SUM(IF(got_consultation = 1, 1, 0)) AS `count_child`, SUM(IF(got_consultation_with_parent = 1, 1, 0)) AS `count_parent`');
        }

        $per_page = key_exists('per_page', $filters) && !empty($filters['per_page']) && is_numeric($filters['per_page']) ? $filters['per_page'] : null;

        if($returnUsers) return [$query->paginate($per_page), $query1->select('user_id')->pluck('user_id')];

        $valueChild = $query->get()[0]->count_child ?? 0;
        $valueParent = $query->get()[0]->count_parent ?? 0;
        $percentageChild = $count > 0 ? round((100 / $count) * $valueChild) : 0;
        $percentageParent = $count > 0 ? round((100 / $count) * $valueParent) : 0;

        return [
            'count_child' => $valueChild,
            'count_parent' => $valueParent,
            'percentage_child' => $percentageChild,
            'percentage_parent' => $percentageParent,
        ];
    }
}
