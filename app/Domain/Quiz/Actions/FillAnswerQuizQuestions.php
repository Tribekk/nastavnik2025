<?php

namespace Domain\Quiz\Actions;

use Domain\Kladr\Models\Kladr;
use Domain\Quiz\Models\Answer;
use Domain\Quiz\Models\AvailableQuiz;
use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\QuestionType;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\UserAnswer;
use Domain\Quiz\States\Quiz\FinishedQuizState;
use Domain\User\Models\User;
use Illuminate\Support\Str;

class FillAnswerQuizQuestions
{
    public function run(User $user, Quiz $quiz, bool $canFinish = true): void
    {
        $questions = Question::where('quiz_id', $quiz->id)->get();
        $typeText = QuestionType::where('code', 'text')->firstOrFail();
        $typeSelectCity = QuestionType::where('code', 'select_city')->firstOrFail();

        foreach ($questions as $question) {
            $uuid = Str::uuid();

            $count = $question->min_answers < 1 ? rand(0, 1) : $question->min_answers;
            $answers = Answer::where('question_id', $question->id)->get()->random($count);

            if($question->with_an_arbitrary_answer ||
                $question->type_id === $typeText->id) {

                if($question->type->type == "date") {
                    $value = now()->setDay(2)->toDateString();
                } else if($question->answers[0]->type == "email") {
                    $value = Str::random(64)."@mail.com";
                } else if($question->answers[0]->type == "number") {
                    $value = rand(0, 2000);
                } else {
                    $value = Str::random(12);
                }
            }

            if($question->type_id == $typeSelectCity->id) {
                $value = Kladr::inRandomOrder()->first()->name;
            }

            foreach ($answers as $answer) {
                UserAnswer::create([
                    'uuid' => $uuid,
                    'user_id' => $user->id,
                    'quiz_id' => $quiz->id,
                    'question_id' => $question->id,
                    'answer_id' => $answer->id,
                    'value' => $value ?? null,
                ]);
            }

        }

        if($canFinish) {
            AvailableQuiz::updateOrCreate([
                'quiz_id' => $quiz->id,
                'user_id' => $user->id,
            ],
            [
                'quiz_id' => $quiz->id,
                'user_id' => $user->id,
                'uuid' => Str::uuid(),
                'state' => FinishedQuizState::class,
                'finished_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
