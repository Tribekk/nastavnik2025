<?php

namespace App\Admin\Actions;


use Domain\User\Models\User;
use Illuminate\Support\Facades\DB;

class GetRegistrationsAction
{
    public function run(array $filters = [])
    {
        $query = User::query()
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date');

        if(isset($filters['role_id'])) {
            $query->whereHas('roles', fn($q1) => $q1->where('role_id', $filters['role_id']));
        }

        if(isset($filters['start_at'])) {
            $query->whereDate('created_at', ">=", $filters['start_at']);
        }

        if(isset($filters['end_at'])) {
            $query->whereDate('created_at', "<=", $filters['end_at']);
        }

        return $query->orderBy('date', 'desc')->paginate();
    }
}
