<?php

namespace Domain\User\Actions;

use DateTime;
use Domain\User\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class FindUserToAssignObserveQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = User::query()
            ->where('last_name', $request->last_name)
            ->where('first_name', $request->first_name);

        if($request->middle_name) {
            $query->where('middle_name', $request->middle_name);
        }

        $date = new DateTime($request->birth_date);

        $query->where('birth_date', $date->format("Y-m-d"));

        parent::__construct($query, $request);
    }
}
