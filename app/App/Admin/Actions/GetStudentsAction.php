<?php

namespace App\Admin\Actions;

use Domain\User\Models\User;
use Illuminate\Support\Facades\DB;

class GetStudentsAction
{
    public function run(string $q = null, array $filters = [])
    {
        $query = User::query()->students();

        if ($q) {
            $query
                ->where('first_name', 'like', '%' . $q . '%')
                ->orWhere('last_name', 'like', '%' . $q . '%')
                ->orWhere('middle_name', 'like', '%' . $q . '%');
        }

        if(isset($filters['school_id'])) {
            $query->where('school_id', $filters['school_id']);
        }

        if(isset($filters['class_id'])) {
            $query->where('class_id', $filters['class_id']);
        }

        // join`ы
        $schoolClass = DB::table('school_classes')
            ->select(['id as sc_id', 'number as sc_number', 'letter as sc_letter']);

        $school = DB::table('schools')
            ->select(['id as s_id', 'number as s_number']);


        $query->leftJoinSub($schoolClass, 'sc', 'sc_id', '=', 'class_id')
            ->leftJoinSub($school, "s", "s_id", '=', 'school_id');

        $query->orderByRaw('s_number asc, sc_number asc, sc_letter asc, id desc');

        return $query->paginate();
    }
}
