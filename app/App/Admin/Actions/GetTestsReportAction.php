<?php

namespace App\Admin\Actions;

use Domain\Quiz\Models\AvailableQuiz;
use Illuminate\Support\Facades\DB;

class GetTestsReportAction
{
    public function run(array $filters = [])
    {
        $query = AvailableQuiz::query()
            ->select(
                DB::raw('DATE(finished_at) AS date'),
                // базовые тесты
                DB::raw('COUNT(ctr.id) as ctr_count'),
                DB::raw('COUNT(ptr.id) as ptr_count'),
                DB::raw('COUNT(spr.id) as spr_count'),
                // глубинные тесты
                DB::raw('COUNT(ir.id) as ir_count'),
                DB::raw('COUNT(ttr.id) as ttr_count'),
                DB::raw('COUNT(ilr.id) as ilr_count'),
                DB::raw('COUNT(scr.id) as scr_count'),
            )
                ->join('quizzes as q', 'q.id', '=', 'available_quizzes.quiz_id')

                // базовые тесты
                ->leftJoin('character_trait_results as ctr', function($join) {
                    $join->on('ctr.user_id', '=', 'available_quizzes.user_id')
                        ->where('q.slug', 'traits');
                })
                ->leftJoin('professional_type_results as ptr', function($join) {
                    $join->on('ptr.user_id', '=', 'available_quizzes.user_id')
                        ->where('q.slug', 'interests');
                })
                ->leftJoin('suitable_profession_results as spr', function($join) {
                    $join->on('spr.user_id', '=', 'available_quizzes.user_id')
                        ->where('q.slug', 'suitable-professions');
                })

                // глубинный тесты
                ->leftJoin('inclination_results as ir', function($join) {
                    $join->on('ir.user_id', '=', 'available_quizzes.user_id')
                        ->where('q.slug', 'inclinations');
                })
                ->leftJoin('type_of_thinking_results as ttr', function($join) {
                    $join->on('ttr.user_id', '=', 'available_quizzes.user_id')
                        ->where('q.slug', 'type-of-thinking');
                })
                ->leftJoin('intelligence_level_results as ilr', function($join) {
                    $join->on('ilr.user_id', '=', 'available_quizzes.user_id')
                        ->where('q.slug', 'intelligence-level');
                })
                ->leftJoin('solution_of_cases_results as scr', function($join) {
                    $join->on('scr.user_id', '=', 'available_quizzes.user_id')
                        ->where('q.slug', 'solution_of_cases');
                })
            ->whereNotNull('finished_at')
            ->where(function ($q) {
                $q->whereNotNull('ctr.id')
                    ->orWhereNotNull('ptr.id')
                    ->orWhereNotNull('spr.id')
                    ->orWhereNotNull('ir.id')
                    ->orWhereNotNull('ilr.id')
                    ->orWhereNotNull('ttr.id')
                    ->orWhereNotNull('scr.id');
            })
            ->groupBy('date');

        if(isset($filters['start_at'])) {
            $query->whereDate('finished_at', ">=", $filters['start_at']);
        }

        if(isset($filters['end_at'])) {
            $query->whereDate('finished_at', "<=", $filters['end_at']);
        }

       return $query->orderBy('date', 'desc')->paginate();
    }
}
