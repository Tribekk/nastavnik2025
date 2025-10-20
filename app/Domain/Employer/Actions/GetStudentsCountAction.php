<?php

namespace Domain\Employer\Actions;

use Domain\Admin\Models\SchoolClass;
use Domain\User\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GetStudentsCountAction
{
    public function run(array $filters = [])
    {
        if (Auth::user()->can('admin')){
            $all = DB::select("SELECT SUM(students_count) AS `count` FROM school_classes")[0]->count;
        }else{
            $all = 0;
        }

        $query = SchoolClass::query()
            ->selectRaw('SUM(students_count) AS `count`');

        if(isset($filters['year']) && $filters['year'] != 'all') {
            $query->where('year', $filters['year']);
        }

        if(isset($filters['city'])) {
            $query->whereHas('students',
                fn ($q) => $q->where('kladr_code', $filters['city']));
        }

        if(isset($filters['school']) && is_array($filters['school'])) {
            $query->whereHas('school', function($q) use ($filters) {
                $q->whereIn('short_title', $filters['school']);
            });
        }

        if(isset($filters['class']) && is_array($filters['class'])) {
            $query->whereRaw("CONCAT(number,letter) in (?)", [$filters['class']]);
        }

        if(isset($filters['class_id']) && is_array($filters['class_id'])) {
            $query->whereIn('id', $filters['class_id']);
        }

        if(isset($filters['gender']) && $filters['gender'] != 'all') {
            $query->whereHas('students',
                fn ($q) => $q->where('sex', $filters['gender'] == 'men' ? 1 : 2));
        }

        if(isset($filters['age']) && $filters['age'] != 'all') {
            $query->whereHas('students',
                fn ($q) => $q->whereYear('birth_date', $filters['age']));
        }

        if(isset($filters['trait']) && $filters['trait'] != 'all') {
            $query->whereHas('students', function ($q) use ($filters) {
                list($id, $type) = explode('-', $filters['trait']);

                $q->whereHas('characterTraitResult', function ($q) use ($id, $type) {
                    $q->whereHas('values', function ($q) use ($id, $type) {
                        $q->where('character_trait_result_values.trait_id', $id)
                            ->where('character_trait_result_values.is_higher', $type == 'higher');
                    });
                });
            });
        }

        $count = $query->get()[0]->count ?? 0;
        $all = $count;

        $percentage = empty($all) ? 0 : round((100 / $all) * $count);


        return [
            'all' => $all,
            'count' => $count,
            'percentage' => $percentage,
        ];
    }
}
