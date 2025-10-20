<?php

namespace Domain\Employer\Actions;

class GetConcludedTargetAgreementAction
{
    public function run(string $q = null, array $filters = [], bool $returnUsers = false, int $count = 0)
    {
        $filteredAction = new GetFilteredQueryStagesTestsAndConsultationsAction();
        $query = $filteredAction->run($q, $filters);
        $query->where('concluded_target_agreement', true);

        if(!$returnUsers) {
            $query->selectRaw('COUNT(*) AS `count`');
        } else return [$query->paginate(), $query->select('user_id')->pluck('user_id')];

        $value = $query->get()[0]->count ?? 0;
        $percentage = $count > 0 ? round((100 / $count) * $value) : 0;

        return [
            'count' => $value,
            'percentage' => $percentage,
        ];
    }
}
