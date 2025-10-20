<?php

namespace App\Admin\Actions;

use Domain\Quiz\Models\AvailableQuiz;
use Domain\Quiz\States\Quiz\FinishedQuizState;
use Illuminate\Support\Facades\DB;

class GetStudentQuestionnairesAction
{
    public function run(array $filters = [])
    {

        $query = AvailableQuiz::query()
            ->select(DB::raw('DATE(finished_at) as date'), DB::raw('count(*) as count'))
            ->whereHas('quiz', function ($q) {
                    $q->where('slug', 'student-questionnaire');
            })
            ->where('state', FinishedQuizState::class)
            ->groupBy('date');

        if(isset($filters['school_id'])) {
            $query->whereHas('user', fn($q) => $q->where('school_id', $filters['school_id']));
        }

        if(isset($filters['class_id'])) {
            $query->whereHas('user', fn($q) => $q->where('class_id', $filters['class_id']));
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
