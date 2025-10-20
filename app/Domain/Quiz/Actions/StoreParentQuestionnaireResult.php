<?php

namespace Domain\Quiz\Actions;

use DB;
use Domain\Kladr\Models\Kladr;
use Domain\Quiz\Models\ParentQuestionnaireResult;
use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Log;
use Str;

class StoreParentQuestionnaireResult
{
    public function run(User $user): ?ParentQuestionnaireResult
    {
        DB::transaction(function () use ($user, &$result) {
            $quiz = Quiz::query()
                ->where('slug', 'parent-questionnaire')
                ->firstOrFail();

            ParentQuestionnaireResult::where('user_id', $user->id)->delete();

            /** @var ParentQuestionnaireResult $result */
            $result = ParentQuestionnaireResult::create([
                'uuid' => Str::uuid(),
                'user_id' => $user->id,
            ]);

            $answers = UserAnswer::query()
                ->where('quiz_id', $quiz->id)
                ->where('user_id', $user->id)
                ->whereNull('deleted_at')->get();


            $questionCity = Question::where('quiz_id', $quiz->id)->where('content', 'Город проживания')->first()->id;
            $questionEmail = Question::where('quiz_id', $quiz->id)->where('content', 'Электронная почта')->first()->id;

            foreach($answers as $answer) {
                if($answer->question_id == $questionCity) {
                    $kladr = Kladr::where('name', $answer->value)->first();
                    $user->update(['kladr_code' => $kladr->code ?? null]);
                } else if($answer->question_id == $questionEmail) {
                    if(!empty($answer->value) && strlen($answer->value)) {
                        $user->update(['email' => $answer->value]);
                    }
                }

                $result->values()->create([
                    'uuid' => Str::uuid(),
                    'question_id' => $answer->question_id,
                    'answer_id' => $answer->answer_id,
                    'value' => $answer->value,
                ]);
            }
        });

        return $result;
    }
}
