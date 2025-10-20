<?php

namespace App\Livewire\Quiz;

use Auth;
use Carbon\Carbon;
use DB;
use Domain\Quiz\Actions\FillAnswerQuizQuestions;
use Domain\Quiz\Actions\FinishQuizAction;
use Domain\Quiz\Actions\StoreCharacterTraitResult;
use Domain\Quiz\Actions\StoreFactorMotiveOfChoiceResult;
use Domain\Quiz\Actions\StoreInclinationResult;
use Domain\Quiz\Actions\StoreIntelligenceLevelResult;
use Domain\Quiz\Actions\StoreParentQuestionnaireResult;
use Domain\Quiz\Actions\StoreSolutionOfCasesResult;
use Domain\Quiz\Actions\StoreStudentQuestionnaireResult;
use Domain\Quiz\Actions\StoreTypeCalculatorResults;
use Domain\Quiz\Actions\StoreTypeOfThinkingResult;
use Domain\Quiz\Actions\ValidateQuestionsAction;
use Domain\Quiz\Models\Answer;
use Domain\Quiz\Models\AvailableQuiz;
use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\UserAnswer;
use Domain\Quiz\States\Quiz\FinishedConsultationState;
use Domain\User\Actions\ValidateAnsweredQuestions;
use Domain\User\Models\User;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;
use Str;

/**
 * @property AvailableQuiz availableQuiz
 */
class RunQuiz extends Component
{
    use WithPagination;

    public $availableQuizId;
    public $questionErrors = [];

    public function mount(AvailableQuiz $availableQuiz)
    {
        $this->availableQuizId = $availableQuiz->id;
    }

    public function paginationView()
    {
        return 'quiz._quiz-pagination';
    }

    public function questionPerPage() {
        return $this->availableQuiz->quiz->slug == 'traits'
            ? 5
            : 3;
    }

    public function render()
    {
        $this->initializeWithPagination();

        return view('livewire.quiz.run-quiz', [
            'questions' => Question::query()
                ->where('quiz_id', $this->availableQuiz->quiz->id)
                ->paginate($this->questionPerPage()),
            'availableQuiz' => $this->availableQuiz,
        ]);
    }

    public function answerTheQuestionSelect($questionId, $value)
    {
        $answer = Answer::where('question_id', $questionId)->where('id', $value)->firstOrFail();
        $this->answerTheQuestion($questionId, $answer->id);
    }

    public function answerTheQuestion($questionId, $answerId, $value = null)
    {
        $question = Question::findOrFail($questionId);

        if($question->max_answers > 1) {
            $this->multipleAnswerTheQuestion($question, $answerId, $value);

        } else {
            UserAnswer::updateOrCreate(
                [
                    'user_id' => Auth::user()->id,
                    'quiz_id' => $this->availableQuiz->quiz->id,
                    'question_id' => $questionId
                ],
                $this->fillUserAnswer($questionId, $answerId, $value)
            );
        }
    }

    private function multipleAnswerTheQuestion($question, $answerId, $value = null) {
        $user = Auth::user();

        $userAnswer = UserAnswer::where('quiz_id', $this->availableQuiz->quiz->id)
            ->where('user_id', $user->id)
            ->where('question_id', $question->id)
            ->where('answer_id', $answerId)->first();

        $canDelete = !empty($userAnswer);

        if($canDelete && $value != '') {
           $canDelete = false;
        }


        if($canDelete) {
            UserAnswer::where('quiz_id', $this->availableQuiz->quiz->id)
                ->where('user_id', $user->id)
                ->where('question_id', $question->id)
                ->where('answer_id', $answerId)->forceDelete();
        } else {
            $userAnswersCount = UserAnswer::where('quiz_id', $this->availableQuiz->quiz->id)
                ->where('user_id', $this->availableQuiz->user->id)
                ->where('question_id', $question->id)->get()->count();

            if($userAnswersCount >= $question->max_answers) {
                $answer = Answer::find($answerId);
                $this->dispatchBrowserEvent('show-notification', [
                    'message' => __('Превышено кол-во ответов на вопрос'),
                    'type' => 'error',
                ]);

                if($answer->is_arbitrary) {
                    UserAnswer::where('quiz_id', $this->availableQuiz->quiz->id)
                        ->where('user_id', $user->id)
                        ->where('question_id', $question->id)
                        ->where('answer_id', $answerId)->forceDelete();
                    $this->emit("clearAnswer$question->id.{$question->arbitraryAnswer->id}");
                }

                return;
            }

            UserAnswer::updateOrCreate(
                [
                    'user_id' => Auth::user()->id,
                    'quiz_id' => $this->availableQuiz->quiz->id,
                    'question_id' => $question->id,
                    'answer_id' => $answerId,
                ],
                $this->fillUserAnswer($question->id, $answerId, $value)
            );
        }
    }

    private function fillUserAnswer($questionId, $answerId, $value = null): array {
        $user = Auth::user();

        if($value) {
            $value = mb_substr($value, 0, 191);
        }

        return [
            'uuid' => Str::uuid(),
            'user_id' => $user->id,
            'quiz_id' => $this->availableQuiz->quiz->id,
            'question_id' => $questionId,
            'answer_id' => $answerId,
            'value' => $value ?? null,
        ];
    }

    public function toggleInterest($questionId, $answerId)
    {
        $user = Auth::user();

        $userAnswer = UserAnswer::query()
            ->where('user_id', $user->id)
            ->where('answer_id', $answerId)
            ->first();

        if ($userAnswer) {
            $userAnswer->delete();
        } else {
            $question = Question::find($questionId);
            $userAnswersCount = UserAnswer::where('quiz_id', $this->availableQuiz->quiz->id)
                ->where('user_id', $this->availableQuiz->user->id)
                ->where('question_id', $questionId)->get()->count();

            if($userAnswersCount >= $question->max_answers) {
                $this->dispatchBrowserEvent('show-notification', [
                    'message' => __('Превышено кол-во ответов на вопрос'),
                    'type' => 'error',
                ]);
                return;
            }


            UserAnswer::create([
                'uuid' => Str::uuid(),
                'user_id' => $user->id,
                'quiz_id' => $this->availableQuiz->quiz->id,
                'question_id' => $questionId,
                'answer_id' => $answerId
            ]);
        }
    }

    public function generateAnswers()
    {
        UserAnswer::where('user_id', $this->availableQuiz->user->id)
            ->where('quiz_id', $this->availableQuiz->quiz->id)->delete();

        $action = new FillAnswerQuizQuestions();
        $action->run($this->availableQuiz->user, $this->availableQuiz->quiz, false);
    }

    public function finishQuiz()
    {
        $result = $this->validateAnswers();
        if(!$result) return false;

        $finishQuizAction = new FinishQuizAction();

        DB::transaction(function () use ($finishQuizAction) {
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

//                $storeFactorMotiveOfChoice = new StoreFactorMotiveOfChoiceResult();
//                $storeFactorMotiveOfChoice->run(Auth::user());
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
            }


            $finishQuizAction->run($this->availableQuiz);
        });

        return redirect()->to(route('quiz.result', $this->availableQuizId));
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

    public function getAvailableQuizProperty()
    {
        return AvailableQuiz::query()
            ->where('id', $this->availableQuizId)
            ->firstOrFail();
    }

    public function previousPage()
    {
        $this->page = $this->page - 1;
        return $this->redirectToPage();
    }

    public function nextPage()
    {
        if(!$this->canGoNextPage()) {
            $this->dispatchBrowserEvent('show-notification', [
                'message' => __('Ответ был дан не на все вопросы'),
                'type' => 'error',
            ]);

            return;
        }

        $this->page = $this->page + 1;
        return $this->redirectToPage();
    }

    private function redirectToPage()
    {
        return redirect()
            ->to(route('quiz.show', [
                'availableQuiz' => $this->availableQuizId,
                'page' => $this->page
            ]));
    }

    public function resolvePage()
    {
        // The "page" query string item should only be available
        // from within the original component mount run.
        return intval(request()->query('page', $this->page));
    }

    public function canGoNextPage()
    {
        $questions = Question::query()
            ->where('quiz_id', $this->availableQuiz->quiz->id)
            ->paginate($this->questionPerPage());

        $action = new ValidateQuestionsAction();
        $this->questionErrors = $action->run($this->availableQuiz->quiz, $questions->items(), $this->availableQuiz->user);

        return !count($this->questionErrors);
    }

    public function questionError($index)
    {
        if(array_key_exists($index, $this->questionErrors)) {
            return $this->questionErrors[$index];
        }

        return null;
    }
}
