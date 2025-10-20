<?php

namespace Domain\Employer\Actions;

use Domain\User\Models\StageTestsAndConsultations;

class GetChildGotConsultationAction
{
    public function run(string $q = null, array $filters = [], bool $returnUsers = false)
    {
        $filteredAction = new GetFilteredQueryStagesTestsAndConsultationsAction();
        $query = $filteredAction->run($q, $filters);
        $query->where('got_consultation', true);

        $count = StageTestsAndConsultations::query()
            ->where('got_consultation', true)
            ->count();

        if(!$returnUsers) {
            $query->selectRaw('COUNT(*) AS `count`');
        }

        if($returnUsers) return $query->paginate();

        $value = $query->get()[0]->count ?? 0;
        $percentage = $count > 0 ? round((100 / $count) * $value) : 0;
        return [
            'count' => $value,
            'percentage' => $percentage,
        ];
    }
}
