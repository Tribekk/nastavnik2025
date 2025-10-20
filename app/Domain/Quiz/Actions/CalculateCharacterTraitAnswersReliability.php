<?php


namespace Domain\Quiz\Actions;


use Domain\Quiz\Models\Answer;
use Domain\Quiz\Models\CharacterTraitResult;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;

class CalculateCharacterTraitAnswersReliability
{
    private array $testQuestions;

    public function __construct()
    {
        $this->testQuestions = [
            ['first' => 1, 'second' => 6, 'equals' => false, 'values' => [0, 2]],
            ['first' => 1, 'second' => 21, 'equals' => false, 'values' => [0, 2]],
            ['first' => 1, 'second' => 26, 'equals' => false, 'values' => [0, 2]],
            ['first' => 1, 'second' => 31, 'equals' => false, 'values' => [0, 2]],
            ['first' => 3, 'second' => 13, 'equals' => false, 'values' => [0, 2]],
            ['first' => 3, 'second' => 18, 'equals' => false, 'values' => [0, 2]],
            ['first' => 13, 'second' => 18, 'equals' => false, 'values' => [0, 2]],
            ['first' => 16, 'second' => 13, 'equals' => false, 'values' => [0, 2]],
            ['first' => 16, 'second' => 17, 'equals' => false, 'values' => [0, 2]],
            ['first' => 26, 'second' => 31, 'equals' => false, 'values' => [0, 2]],
        ];
    }

    public function run(User $user): int
    {
        $unreliability = 0;

        foreach ($this->testQuestions as $testQuestion) {
            $first = UserAnswer::query()
                ->where('user_id', $user->id)
                ->where('question_id', $testQuestion['first'])
                ->whereNull('deleted_at')
                ->orderByDesc('created_at')
                ->first();

            $second = UserAnswer::query()
                ->where('user_id', $user->id)
                ->where('question_id', $testQuestion['second'])
                ->whereNull('deleted_at')
                ->orderByDesc('created_at')
                ->first();

            if(!$this->checkContainValue($first, $second, $testQuestion['values'])) continue;

            if ($testQuestion['equals']) {
                if ($this->checkEquals($first->answer->value, $second->answer->value)) {
                    $unreliability++;
                }
            } else {
                if ($this->checkNotEquals($first->answer->value, $second->answer->value)) {
                    $unreliability++;
                }
            }
        }

        return $unreliability;
    }

    private function checkContainValue($first, $second, $values): bool
    {
        try {
            return (in_array($first->answer->value, $values) && in_array($second->answer->value, $values));
        } catch (\Exception $exception) {
            return false;
        }
    }

    private function checkEquals($first, $second): bool
    {
        return (is_null($first) && is_null($second)) || ($first == $second);
    }

    private function checkNotEquals($first, $second): bool
    {
        return !$this->checkEquals($first, $second);
    }
}
