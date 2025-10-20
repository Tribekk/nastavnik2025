<?php

namespace App\Admin\Actions;


use Domain\User\Models\ObservedPeople;
use Illuminate\Support\Facades\DB;

class GetAttachedParentsAction
{
    public function run(array $filters = [])
    {
        $query = ObservedPeople::query()
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date');

        if(isset($filters['start_at'])) {
            $query->whereDate('created_at', ">=", $filters['start_at']);
        }

        if(isset($filters['end_at'])) {
            $query->whereDate('created_at', "<=", $filters['end_at']);
        }

        return $query->orderBy('date', 'desc')
            ->paginate();
    }
}
