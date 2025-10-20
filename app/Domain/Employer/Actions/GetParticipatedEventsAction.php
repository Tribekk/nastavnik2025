<?php

namespace Domain\Employer\Actions;

class GetParticipatedEventsAction
{
    public function run(string $q = null, array $filters = [], bool $returnUsers = false, int $count = 0)
    {
        $filteredAction = new GetFilteredQueryStagesTestsAndConsultationsAction();
        $query = $filteredAction->run($q, $filters);
        $query->where('count_visited_events', '>', 0);

        $query1 = $filteredAction->run($q, $filters);
        $query1->where('count_visited_events', '>', 0);

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
