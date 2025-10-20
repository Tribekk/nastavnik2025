<?php


namespace Domain\Employer\Actions;


use Domain\User\Models\StageTestsAndConsultations;
use Illuminate\Database\Eloquent\Builder;

class GetFilteredQueryStagesTestsAndConsultationsAction
{
    public function run(string $q = null, array $filters = []): Builder
    {

        $query = StageTestsAndConsultations::query();

        if($q) {
            $query
                ->where('full_name', "like", "%$q%")
                ->orWhere('parent__full_name', "like", "%$q%");
        }

//        if(isset($filters['year']) && $filters['year'] != 'all') {
//            $query->where('class__year', $filters['year']);
//        }
//
        if(isset($filters['city']) && $filters['city'] != 'all') {
            $query->where('kladr_code', $filters['city']);
        }

        if(isset($filters['school'])) {
            $query->whereIn('school', $filters['school']);
        }

        if(isset($filters['class'])) {
            $query->whereIn('class', $filters['class']);
        }

        if(isset($filters['class_id'])) {
            $query->whereIn('class_id', $filters['class_id']);
        }

        if(isset($filters['id'])) {
            $query->whereIn('class_id', $filters['id']);
        }
//dd($query->toSql(), isset($filters['class_id']), $filters);
        if(isset($filters['gender']) && $filters['gender'] != 'all') {
            $query->where('gender', $filters['gender'] == 'men' ? 1 : 2);
        }

        if(isset($filters['age']) && $filters['age'] != 'all') {
            $query->where('age', $filters['age']);
        }

        if(isset($filters['person_type']) && $filters['person_type'] != 'all') {
            $query->where("person_type__{$filters['person_type']}", true);
        }

        $pattern = '/^(?:100|[1-9][0-9]?|0)-(?:100|[1-9][0-9]?|0)$/';
        if (isset($filters['model_competence_range']) && preg_match($pattern, $filters['model_competence_range'])) {
            // Разделяем строку с диапазоном на два числа
            list($min, $max) = explode('-', $filters['model_competence_range']);

            // Преобразуем минимальное и максимальное значение в числа
            $min = (int)$min;
            $max = (int)$max;

            // Добавляем условия в запрос
            $query->where('type_thinking_values_end_average', '>=', $min)
                ->where('type_thinking_values_end_average', '<=', $max);
        }

        if(isset($filters['cases_questions_students_count']) && $filters['cases_questions_students_count'] != 'all') {
            $query->where('type_thinking_values_end_average', '>', 0);
        }

        if(isset($filters['cases_questions_students_count']) && $filters['cases_questions_students_count'] != 'all') {
            $query->where('type_thinking_values_end_average', '>', 0);
        }

        if(isset($filters['parent_questionnaire']) && $filters['parent_questionnaire'] != 'all') {
            $query->where('parent_questionnaire_finished', $filters['parent_questionnaire'] == 'finished')
                ->whereNotNull('parent_id');
        }

        if(isset($filters['student_questionnaire']) && $filters['student_questionnaire'] != 'all') {
            $query->where('student_questionnaire_finished', $filters['student_questionnaire'] == 'finished');
        }

//        if(isset($filters['base_tests']) && $filters['base_tests'] != 'all') {
//            if($filters['base_tests'] == 'finished') {
//                $query->where('type_thinking_values_end_average', true);
//            } else if($filters['base_tests'] == 'not_finished') {
//                $query->where('base_tests_finished', false);
//            } else {
//                $query->where('base_tests_percentage', '<', 100)
//                    ->where('base_tests_percentage', '>', 0);
//            }
//        }

        if(isset($filters['base_tests']) && $filters['base_tests'] != 'all') {
            if($filters['base_tests'] === 'low') {
                $query->where('type_thinking_values_end_average', '<', 31)
                    ->where('type_thinking_values_end_average', '>', 0);
            } else if($filters['base_tests'] == 'average') {
                $query->where('type_thinking_values_end_average', '<', 71)
                    ->where('type_thinking_values_end_average', '>', 30);
            } else {
                $query->where('type_thinking_values_end_average', '<', 101)
                    ->where('type_thinking_values_end_average', '>', 70);
            }
        }

        if(isset($filters['base_selection']) && $filters['base_selection'] != 'all') {
            $query->where('base_step_selection', $filters['base_selection']);
        }

        if(isset($filters['invited_depth_tests']) && $filters['invited_depth_tests'] != 'all') {
            $query->where('invited_depth_tests', $filters['invited_depth_tests'] == 'invited');
        }

        if(isset($filters['depth_tests']) && $filters['depth_tests'] != 'all') {
            if($filters['depth_tests'] == 'finished') {
                $query->where('depth_tests_finished', true);
            } else if($filters['depth_tests'] == 'not_finished') {
                $query->where('depth_tests_finished', false);
            } else {
                $query->where('depth_tests_percentage', '<', 100)
                    ->where('depth_tests_percentage', '>', 0);
            }
        }

        if(isset($filters['child_got_consultation']) && $filters['child_got_consultation'] != 'all') {
            $query->where('got_consultation_status', $filters['child_got_consultation']);
        }

        if(isset($filters['got_consultation_with_parent']) && $filters['got_consultation_with_parent'] != 'all') {
            $query->where('got_consultation_status_with_parent', $filters['got_consultation_with_parent']);
        }

        if(isset($filters['depth_selection']) && $filters['depth_selection'] != 'all') {
            $query->where('depth_step_selection', $filters['depth_selection']);
        }

        if(isset($filters['recommend']) && $filters['recommend'] != 'all') {
            $query->where('recommend', $filters['recommend']);
        }

        if(isset($filters['agree']) && $filters['agree'] != 'all') {
            $query->where('agree', $filters['agree']);
        }
//        dd($filters, $query->toSql());
        return $query;
    }
}
