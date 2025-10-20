<?php

namespace Domain\Quiz\Actions;


use Domain\Quiz\Models\Inclination;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;
use Illuminate\Support\Facades\DB;

class CalculateInclinationValues
{
    public function run(User $user): array
    {
        $quiz = Quiz::query()
            ->where('slug', 'inclinations')
            ->firstOrFail();

        $types = Inclination::all();

        $values = array();

        foreach ($types as $type) {
            $values[$type->uuid] = [
                'score' => 0,
                'is_higher' => false,
            ];
        }

        $types = UserAnswer::query()
            ->select(DB::raw('inclinations.uuid, count(inclinations.uuid) as type_count'))
            ->join('answers', 'user_answers.answer_id', '=', 'answers.id')
            ->join('inclinations', 'inclinations.id', '=', 'answers.answerable_id')
            ->where('user_answers.user_id', $user->id)
            ->where('user_answers.quiz_id', $quiz->id)
            ->whereNull('user_answers.deleted_at')
            ->groupBy('inclinations.uuid')
            ->get();


        $maxScore = 0;
        if($types) {
            foreach ($types as $type) {
                $values[$type->uuid]['score'] = $type->type_count;
                if($maxScore < $type->type_count) $maxScore = $type->type_count;
            }

            foreach ($values as $key => $value) {
                if($value['score'] == $maxScore && $maxScore > 2) $values[$key]['is_higher'] = true;
            }
        }

        return $values;
    }
}
