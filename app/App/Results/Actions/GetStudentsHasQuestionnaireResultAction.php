<?php

namespace App\Results\Actions;

use Domain\Quiz\States\Quiz\FinishedQuizState;
use Domain\User\Models\User;
use Spatie\Permission\Models\Role;

class GetStudentsHasQuestionnaireResultAction
{
    public function run(array $filters = [])
    {
        $query = User::query();

        if (!empty($filters['last_name'])) {
            $query->where('last_name', 'like', '%' . $filters['last_name'] . '%');
        }

        if (!empty($filters['first_name'])) {
            $query->where('first_name', 'like', '%' . $filters['first_name'] . '%');
        }

        if (!empty($filters['middle_name'])) {
            $query->where('middle_name', 'like', '%' . $filters['middle_name'] . '%');
        }

        if (!empty($filters['finished_at_start'])) {
            $query->whereHas('availableQuizzes', function($aq) use ($filters) {
                $aq->whereHas('quiz', function ($q) {
                    $q->where('slug', 'student-questionnaire');
                })->whereDate('finished_at', '>=', $filters['finished_at_start']);
            });
        }

        if (!empty($filters['finished_at_end'])) {
            $query->whereHas('availableQuizzes', function($aq) use ($filters) {
                $aq->whereHas('quiz', function ($q) {
                    $q->where('slug', 'student-questionnaire');
                })->whereDate('finished_at', '<=', $filters['finished_at_end']);
            });
        }

        if (!empty($filters['school_id'])) {
            $query->where('school_id', $filters['school_id']);
        }

        if (!empty($filters['class_id'])) {
            $query->where('class_id', $filters['class_id']);
        }

        $role_id = Role::findByName('student')->id;
        $query->join('model_has_roles', function ($join) use ($role_id) {
            $join->on('users.id', '=', 'model_has_roles.model_id')
                ->where('model_has_roles.role_id', $role_id);
        });

        $query->whereHas('availableQuizzes', function($aq) use ($filters) {
            $aq->whereHas('quiz', function ($q) {
                $q->where('slug', 'student-questionnaire');
            })->where('state', FinishedQuizState::class);
        });


        return $query->paginate();
    }
}
