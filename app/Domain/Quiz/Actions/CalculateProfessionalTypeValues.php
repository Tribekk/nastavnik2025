<?php


namespace Domain\Quiz\Actions;


use DB;
use Domain\Quiz\Models\ProfessionalType;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;

class CalculateProfessionalTypeValues
{
    public function run(User $user): array
    {
        $quiz = Quiz::query()
            ->where('slug', 'interests')
            ->firstOrFail();

        $types = ProfessionalType::all();

        $values = array();

        foreach ($types as $type) {
            $values[$type->uuid] = 0;
        }

        $types = UserAnswer::query()
            ->select(DB::raw('professional_types.uuid, count(professional_types.uuid) as type_count'))
            ->join('answers', 'user_answers.answer_id', '=', 'answers.id')
            ->join('professional_types', 'professional_types.id', '=', 'answers.answerable_id')
            ->where('user_answers.user_id', $user->id)
            ->where('user_answers.quiz_id', $quiz->id)
            ->whereNull('user_answers.deleted_at')
            ->groupBy('professional_types.uuid')
            ->get();

        if($types) {
            foreach ($types as $type) {
                $values[$type->uuid] = $type->type_count;
            }
        }

        return $values;
    }
}
