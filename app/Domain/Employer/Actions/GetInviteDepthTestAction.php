<?php

namespace Domain\Employer\Actions;

class GetInviteDepthTestAction
{
    public function run(string $q = null, array $filters = [], bool $returnUsers = false, int $count = 0)
    {
        $filteredAction = new GetFilteredQueryStagesTestsAndConsultationsAction();
        $query = $filteredAction->run($q, $filters);
        $query->where('invited_depth_tests', true);

        $query1 = $filteredAction->run($q, $filters);
        $query1->where('invited_depth_tests', true);

        $per_page = key_exists('per_page', $filters) && !empty($filters['per_page']) && is_numeric($filters['per_page']) ? $filters['per_page'] : null;

        if(!$returnUsers) {
            $query->selectRaw('COUNT(*) AS `count`');
        } else return [$query->paginate($per_page), $query1->select('user_id')->pluck('user_id')];

        $value = $query->get()[0]->count ?? 0;
        $percentage = $count > 0 ? round((100 / $count) * $value) : 0;

        return [
            'count' => $value,
            'percentage' => $percentage,
        ];
    }
}
