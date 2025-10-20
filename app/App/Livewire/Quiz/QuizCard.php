<?php
/** @noinspection PhpMissingFieldTypeInspection */

namespace App\Livewire\Quiz;

use Auth;
use DB;
use Domain\Quiz\Actions\DeleteSuitableProfessionResult;
use Domain\Quiz\Actions\FinishQuizAction;
use Domain\Quiz\Actions\OpenQuizAction;
use Domain\Quiz\Actions\StoreCharacterTraitResult;
use Domain\Quiz\Actions\StoreFactorMotiveOfChoiceResult;
use Domain\Quiz\Actions\StoreInclinationResult;
use Domain\Quiz\Actions\StoreIntelligenceLevelResult;
use Domain\Quiz\Actions\StoreParentQuestionnaireResult;
use Domain\Quiz\Actions\StoreSolutionOfCasesResult;
use Domain\Quiz\Actions\StoreStudentQuestionnaireResult;
use Domain\Quiz\Actions\StoreSuitableProfessionResults;
use Domain\Quiz\Actions\StoreTypeCalculatorResults;
use Domain\Quiz\Actions\StoreTypeOfThinkingResult;
use Domain\Quiz\Models\AvailableQuiz;
use Livewire\Component;

/**
 * @property AvailableQuiz availableQuiz
 */
class QuizCard extends Component
{
    public $availableQuizId;

    public function mount($availableQuizId)
    {
        $this->availableQuizId = $availableQuizId;
    }

    public function render()
    {
        return view('livewire.quiz.quiz-card', [
            'availableQuiz' => $this->availableQuiz
        ]);
    }

    public function getAvailableQuizProperty()
    {
        return AvailableQuiz::findOrFail($this->availableQuizId);
    }

    public function finishQuiz()
    {

        $user = Auth::user();

        $finishQuizAction = new FinishQuizAction();

        DB::transaction(function () use ($user, $finishQuizAction) {
            if ($this->availableQuiz->quiz->isSuitableProfessions()) {
                (new StoreSuitableProfessionResults())->run($user);
            }

            if ($this->availableQuiz->quiz->slug == 'interests') {
                $action = new StoreTypeCalculatorResults();
                $action->run(Auth::user());
            }
            else if($this->availableQuiz->quiz->slug == 'traits') {
                $action = new StoreCharacterTraitResult();
                $action->run(Auth::user());
            }
            else if($this->availableQuiz->quiz->slug == 'parent-questionnaire') {
                $action = new StoreParentQuestionnaireResult();
                $action->run(Auth::user());
            }
            else if($this->availableQuiz->quiz->slug == 'student-questionnaire') {
                $storeFactorMotiveOfChoice = new StoreFactorMotiveOfChoiceResult();
                $storeFactorMotiveOfChoice->run(Auth::user());
                $storeQuestionnaireAction = new StoreStudentQuestionnaireResult();
                $storeQuestionnaireAction->run(Auth::user());
            }
            else if($this->availableQuiz->quiz->slug == 'inclinations') {
                $action = new StoreInclinationResult();
                $action->run(Auth::user());
            }
            else if($this->availableQuiz->quiz->slug == 'intelligence-level') {
                $action = new StoreIntelligenceLevelResult();
                $action->run(Auth::user());
            }
            else if($this->availableQuiz->quiz->slug == 'type-of-thinking') {
                $action = new StoreTypeOfThinkingResult();
                $action->run(Auth::user(), $this->availableQuiz->quiz);
            }
            else if($this->availableQuiz->quiz->slug == 'solution_of_cases') {
                $action = new StoreSolutionOfCasesResult();
                $action->run(Auth::user());
            }else if($this->availableQuiz->quiz->slug == 'mentor-cases') {
                $action = new StoreTypeOfThinkingResult();
                $action->run(Auth::user());
            }

            $finishQuizAction->run($this->availableQuiz);
        });
    }

    public function openQuiz()
    {
        $user = Auth::user();

        $openQuizAction = new OpenQuizAction();
        $suitableProfessionResultsRemover = new DeleteSuitableProfessionResult();

        if ($this->availableQuiz->quiz->isSuitableProfessions()) {
            $suitableProfessionResultsRemover->run($user);
        }

        $openQuizAction->run($user, $this->availableQuiz);
    }
}
