<?php

namespace App\Livewire\Quiz;

use Auth;
use DB;
use Domain\Quiz\Actions\FinishQuizAction;
use Domain\Quiz\Actions\StoreSuitableProfessionResults;
use Domain\Quiz\Actions\SwitchSuitableProfessionAnswers;
use Domain\User\Actions\ValidateAnsweredQuestions;
use Livewire\Component;

class SuitableProfessions extends Component
{
    public $availableQuiz;

    public function mount($availableQuiz)
    {
        $this->availableQuiz = $availableQuiz;
    }

    public function render()
    {
        return view('livewire.quiz.suitable-professions', [
            'availableQuiz' => $this->availableQuiz,
        ]);
    }

    public function switch($questionId, $answerId)
    {
        $user = Auth::user();
        $switcher = new SwitchSuitableProfessionAnswers();

        $switcher->run($user, $this->availableQuiz->quiz, $questionId, $answerId);
    }

    public function finishQuiz()
    {
        $result = $this->validateAnswers();
        if(!$result) return false;

        $user = Auth::user();

        $finishQuizAction = new FinishQuizAction();
        $resultStore = new StoreSuitableProfessionResults();

        DB::transaction(function () use ($user, $resultStore, $finishQuizAction) {
            $resultStore->run($user);
            $finishQuizAction->run($this->availableQuiz);
        });

        return redirect()->route('quiz.result', $this->availableQuiz);
    }

    public function validateAnswers(): bool
    {
        $action = new ValidateAnsweredQuestions();
        $errors = $action->run($this->availableQuiz->quiz, Auth::user());
        if(count($errors)) {
            $this->emit('showQuestionErrors', $errors);
            return false;
        }

        return true;
    }
}
