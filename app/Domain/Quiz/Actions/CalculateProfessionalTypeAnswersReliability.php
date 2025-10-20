<?php


namespace Domain\Quiz\Actions;


use Domain\Quiz\Models\Answer;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;

class CalculateProfessionalTypeAnswersReliability
{
    private array $testAnswers;

    private int $d;

    public function __construct()
    {
        $this->testAnswers = [
            ['first' => 4, 'second' => 17, 'equals' => false],
            ['first' => 15, 'second' => 19, 'equals' => false],
            ['first' => 16, 'second' => 33, 'equals' => false],
            ['first' => 21, 'second' => 44, 'equals' => false],
            ['first' => 31, 'second' => 48, 'equals' => false],

            ['first' => 33, 'second' => 55, 'equals' => true],
            ['first' => 39, 'second' => 55, 'equals' => true],
            ['first' => 51, 'second' => 55, 'equals' => true],
            ['first' => 52, 'second' => 55, 'equals' => true],
            ['first' => 54, 'second' => 55, 'equals' => true],
        ];

        $this->d = $this->difference();
    }

    public function run(User $user): int
    {
        $unreliability = 0;

        $quiz = Quiz::where('slug', 'interests')->firstOrFail();

        foreach ($this->testAnswers as $index => $testAnswer) {
            $first = UserAnswer::query()
                ->where('user_id', $user->id)
                ->where('answer_id', $testAnswer['first'] + $this->d)
                ->first();

            $second = UserAnswer::query()
                ->where('user_id', $user->id)
                ->where('answer_id', $testAnswer['second'] + $this->d)
                ->first();

            if ($testAnswer['equals']) {
                if ($this->checkEquals($first, $second)) {
                    $unreliability++;
                }
            } else {
                if ($this->checkNotEquals($first, $second)) {
                    $unreliability++;
                }
            }
        }

        return $unreliability;
    }

    private function difference()
    {
        $quiz = Quiz::where('slug', 'interests')->firstOrFail();

        $firstQuestionId = Answer::whereHas('question', function ($query) use ($quiz) {
            $query->where('quiz_id', $quiz->id);
        })->min('id');

        return $firstQuestionId - 1;
    }

    private function checkEquals($first, $second): bool
    {
        return ($first && $second);
    }

    private function checkNotEquals($first, $second): bool
    {
        return !$this->checkEquals($first, $second);
    }
}
