<?php


namespace Domain\Quiz\Actions;


use Carbon\Carbon;
use Domain\Quiz\Models\AvailableQuiz;
use Domain\Quiz\States\Quiz\FinishedQuizState;

class FinishQuizAction
{
    public function run(AvailableQuiz $availableQuiz)
    {
        $availableQuiz->update([
            'state' => FinishedQuizState::class,
            'finished_at' => Carbon::now()
        ]);
    }

}
