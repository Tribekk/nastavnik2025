<?php

namespace Domain\Employer\Actions;

use App\Quiz\Controllers\QuizController;
use Domain\Quiz\Models\AvailableQuiz;
use Domain\Quiz\Models\Question;
use Domain\Quiz\States\Quiz\FinishedQuizState;
use Domain\User\Models\User;
use Illuminate\Support\Facades\DB;

class GetStudentsAction
{
    public function run(array $filters = [], bool $paginate = true)
    {
        $query = User::query()->students();

        $this->hasQuiz($query, 'type-of-thinking');
//        $this->hasQuiz($query, 'traits');
//        $this->hasQuiz($query, 'interests');
//        $this->hasQuiz($query, 'suitable-professions');

        if (!empty($filters['chances_of_staying'])) {
            $chances = explode(';', $filters['chances_of_staying']);
            $query->whereHas('getStageTestsAndConsultations', function ($q) use ($chances) {
                $q->where('type_thinking_values_end_average', '>=', intval($chances[0]))
                    ->where('type_thinking_values_end_average', '<=', intval($chances[1]));

            });
        }

        if (!empty($filters['activity_kind'])) {
            $query->whereHas('suitableProfessions', function ($q) use ($filters) {
               $q->whereHas('careerMatrix', function ($q2) use ($filters) {
                  $q2->where('activity_kind_id', intval($filters['activity_kind']));
               });
            });
        }

        if (!empty($filters['activity_object'])) {
            $query->whereHas('suitableProfessions', function ($q) use ($filters) {
                $q->whereHas('careerMatrix', function ($q2) use ($filters) {
                    $q2->where('activity_object_id', intval($filters['activity_object']));
                });
            });
        }

        if (!empty($filters['school_id'])) {
            $query->where('school_id', $filters['school_id']);
        }

        if (!empty($filters['class_id'])) {
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

        $students = $paginate ?
            $query->paginate() :
            $query->get();

        return $students;
    }

    private function hasQuiz($query, $slug)
    {
         $query->whereHas('availableQuizzes', function ($aq) use ($slug) {
             $aq->whereHas('quiz', function ($q) use ($slug) {
                 $q->where('slug', $slug);
             })->where('state', FinishedQuizState::class);
         });
    }
}
