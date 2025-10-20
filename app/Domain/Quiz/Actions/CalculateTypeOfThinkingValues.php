<?php

namespace Domain\Quiz\Actions;


use Domain\Quiz\Models\Inclination;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\TypeOfThinking;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;
use Illuminate\Support\Facades\DB;

class CalculateTypeOfThinkingValues
{

    public function run(User $user, $quiz=[]): array
    {

//        $quiz = Quiz::query()
//            ->where('slug', 'type-of-thinking')
//            ->get();
        if (empty($quiz) || $quiz->id === 8 ) {
            $types = TypeOfThinking::all();
        }else{
            $types = TypeOfThinking::where('quiz_id', $quiz->id)->get();
        }


//

        $values = array();

        foreach ($types as $type) {
            $values[$type->uuid] = [
                'percentage' => 0,
                'score' => 0,
                'is_higher' => false,
            ];
        }

        $types = UserAnswer::query()
            ->select(DB::raw('type_of_thinking.uuid, sum(answers.value) as type_count'))
            ->join('answers', 'user_answers.answer_id', '=', 'answers.id')
            ->join('questions', 'user_answers.question_id', '=', 'questions.id')
            ->join('type_of_thinking', 'type_of_thinking.id', '=', 'questions.questionable_id')
            ->where('type_of_thinking.quiz_id', $quiz->id)
            ->where('user_answers.user_id', $user->id)
            ->whereNull('user_answers.deleted_at')
            ->groupBy('type_of_thinking.uuid')
            ->get();
if ($quiz->id === 8){
    $types = UserAnswer::query()
        ->select(DB::raw('type_of_thinking.uuid, sum(answers.value) as type_count'))
        ->join('answers', 'user_answers.answer_id', '=', 'answers.id')
        ->join('questions', 'user_answers.question_id', '=', 'questions.id')
        ->join('type_of_thinking', 'type_of_thinking.id', '=', 'questions.questionable_id')
        ->where('user_answers.user_id', $user->id)
        ->whereNull('user_answers.deleted_at')
        ->groupBy('type_of_thinking.uuid')
        ->get();
}

        $maxScore = 0;
        if($types) {
            foreach ($types as $type) {
                $values[$type->uuid]['score'] = $type->type_count;
                if($maxScore < $type->type_count) $maxScore = $type->type_count;
            }

            foreach ($values as $key => $value) {
                if ($key === '018ccbff-d16c-4d74-915c-5284fb9ed9e3'){
                    $values[$key]['percentage'] = floor((100 / 10) * $value['score']);
                }else{
                    $values[$key]['percentage'] = floor((100 / 25) * $value['score']);
                }

                if($value['score'] == $maxScore && $maxScore > 2) $values[$key]['is_higher'] = true;
            }
        }

        return $values;
    }
}
