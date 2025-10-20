<?php /** @noinspection PhpUndefinedMethodInspection */


namespace App\Quiz\Controllers;

use App\Quiz\ViewModels\AvailableQuizzesViewModel;
use App\Quiz\Wrappers\CharacterTraitResultWrapper;
use App\Quiz\Wrappers\ResultWrapper;
use App\Quiz\Wrappers\SolutionCasesResultWrapper;
use Barryvdh\DomPDF\Facade as PDF;
use Domain\Quiz\Models\Inclination;
use Domain\Quiz\Models\ProfessionalTypeResultValue;
use Domain\Quiz\Models\Situation;
use Domain\Quiz\Models\TypeOfThinking;
use Domain\Quiz\Models\TypeOfThinkingManifestation;
use Domain\Quiz\Models\TypeOfThinkingResult;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Domain\Quiz\Actions\OpenQuizAction;
use Domain\Quiz\Models\AvailableQuiz;
use Domain\Quiz\Models\CharacterTrait;
use Domain\Quiz\Models\ProfessionalType;
use Domain\Quiz\Models\SuitableProfessionResult;
use Domain\Quiz\States\Quiz\OpenQuizState;
use Domain\Quiz\States\Quiz\PendingQuizState;
use Illuminate\Support\Facades\DB;
use Support\Controller;
use App\Models\TypeOfThinkingResultAverage;
use Illuminate\Support\Collection;

class QuizController extends Controller
{
    public function index()
    {

        if(!Auth::user()->isStudent) abort(404);
        $viewModel = new AvailableQuizzesViewModel();


        return view('quiz.index', $viewModel);
    }

    public function description(AvailableQuiz $availableQuiz)
    {
        if(Auth::id() != $availableQuiz->user_id) abort(404);
        if($availableQuiz->quiz->isSuitableProfessions() && !$availableQuiz->interestsQuizFinished()) {
            return redirect(route('quiz.view'));
        }

        if($availableQuiz->quiz->slug == 'student-questionnaire') {
            return view('quiz._instruction.student-questionnaire-instruction')
                ->withAvailableQuiz($availableQuiz);
        }

        return view('quiz.description')
            ->withAvailableQuiz($availableQuiz);
    }

    public function restartQuiz(AvailableQuiz $availableQuiz)
    {
        if(Auth::id() != $availableQuiz->user_id) abort(404);
        if($availableQuiz->quiz->isSuitableProfessions() && !$availableQuiz->interestsQuizFinished()) {
            return redirect(route('quiz.view'));
        }

        $user = Auth::user();
        $openQuizAction = new OpenQuizAction();
        $openQuizAction->run($user, $availableQuiz);

        return $this->startQuiz($availableQuiz);
    }

    public function startQuiz(AvailableQuiz $availableQuiz)
    {
        if(Auth::id() != $availableQuiz->user_id) abort(404);
        if($availableQuiz->quiz->isSuitableProfessions() && !$availableQuiz->interestsQuizFinished()) {
            return redirect(route('quiz.view'));
        }

        if ($availableQuiz->state->equals(OpenQuizState::class)) {
            $availableQuiz->update([
                'state' => PendingQuizState::class,
                'started_at' => Carbon::now()
            ]);
        }

        return redirect(route('quiz.show', $availableQuiz));
    }

    public function supplementQuiz(AvailableQuiz $availableQuiz)
    {

        if(Auth::id() != $availableQuiz->user_id) abort(404);
        if($availableQuiz->quiz->isSuitableProfessions() && !$availableQuiz->interestsQuizFinished()) {
            return redirect(route('quiz.view'));
        }

        $availableQuiz->update([
            'state' => PendingQuizState::class,
            'started_at' => Carbon::now()
        ]);
//dd($availableQuiz);
        return redirect(route('quiz.show', $availableQuiz));
    }

    public function show(AvailableQuiz $availableQuiz)
    {
        if(Auth::id() != $availableQuiz->user_id) abort(404);
        if(is_null($availableQuiz->started_at)) {
            $availableQuiz->update([
                'started_at' => Carbon::now()
            ]);
        }

        return view('quiz.show')
            ->withAvailableQuiz($availableQuiz);
    }

    public function result(AvailableQuiz $availableQuiz)
    {

        if ($availableQuiz->quiz->slug == 'traits') {
            $wrapper = app()->make(CharacterTraitResultWrapper::class);
            return $this->traitsResult($wrapper, $availableQuiz);
        } else if ($availableQuiz->quiz->slug == 'interests') {
            return $this->interestsResult($availableQuiz);
        } else if ($availableQuiz->quiz->isSuitableProfessions()) {
            return $this->suitableProfessionsDetails($availableQuiz);
        } else if ($availableQuiz->quiz->slug == 'parent-questionnaire') {
            return $this->parentQuestionnaireResult($availableQuiz);
        } else if ($availableQuiz->quiz->slug == 'student-questionnaire') {
            return $this->studentQuestionnaireResult($availableQuiz);
        } else if ($availableQuiz->quiz->slug == 'inclinations') {
            return $this->inclinationsResult($availableQuiz);
        } else if ($availableQuiz->quiz->slug == 'intelligence-level') {
            return $this->intelligenceLevelResult($availableQuiz);
        } else if ($availableQuiz->quiz->slug == 'type-of-thinking') {
            return $this->typeOfThinkingResult($availableQuiz);
        } else if ($availableQuiz->quiz->slug == 'solution_of_cases') {
            return $this->solutionOfCasesResult($availableQuiz);
        } else if ($availableQuiz->quiz->slug == 'mentor-cases') {
            return $this->typeOfThinkingResult($availableQuiz);
        }

        return abort(404);
    }

    public function traitsResult(CharacterTraitResultWrapper $wrapper, AvailableQuiz $availableQuiz)
    {
        $traits = CharacterTrait::all();

        /** @noinspection PhpUndefinedFieldInspection */
        $result = Auth::user()->characterTraitResult;
        if(empty($result)) abort(404);

        $resultValues = $result->values;

        return view('quiz.result')
            ->withAvailableQuiz($availableQuiz)
            ->withTraits($traits)
            ->withWrapper($wrapper)
            ->withResult($result)
            ->withResultValues($resultValues);
    }

    public function interestsResult(AvailableQuiz $availableQuiz)
    {
        $types = ProfessionalType::all();

        /** @noinspection PhpUndefinedFieldInspection */
        $result = Auth::user()->professionalTypeResult;
        if(empty($result)) abort(404);

        return view('quiz.result')
            ->withResult($result)
            ->withTypes($types)
            ->withAvailableQuiz($availableQuiz);
    }

    public function traitDetails(CharacterTraitResultWrapper $wrapper, AvailableQuiz $availableQuiz, CharacterTrait $trait)
    {
        /** @noinspection PhpUndefinedFieldInspection */
        $result = $availableQuiz->user->characterTraitResult;
        if(empty($result)) abort(404);

        $resultTraits = $result->values;

        $resultValue = $result->values()->where('trait_id', $trait->id)->get()->first();

        return view('quiz.details')
            ->withAvailableQuiz($availableQuiz)
            ->withTrait($trait)
            ->withResultTraits($resultTraits)
            ->withResultValue($resultValue)
            ->withWrapper($wrapper);
    }

    public function parentQuestionnaireResult(AvailableQuiz $availableQuiz)
    {
        if(Auth::id() != $availableQuiz->user_id) abort(403);
        return view('quiz._result-parent-questionnaire')
            ->withAvailableQuiz($availableQuiz);
    }

    public function studentQuestionnaireResult(AvailableQuiz $availableQuiz)
    {
        /** @noinspection PhpUndefinedFieldInspection */
        $result = Auth::user()->studentQuestionnaireResult;
        /** @noinspection PhpUndefinedFieldInspection */
        $resultFactorMotiveOfChoice = Auth::user()->factorMotiveOfChoiceResult;

        return view('quiz._result-student-questionnaire')
            ->withResult($result)
            ->withResultFactorMotiveOfChoice($resultFactorMotiveOfChoice)
            ->withAvailableQuiz($availableQuiz);
    }

    public function typeDetails(AvailableQuiz $availableQuiz, ProfessionalType $type)
    {
        $types = ProfessionalType::all();

        /** @noinspection PhpUndefinedFieldInspection */
        $result = $availableQuiz->user->professionalTypeResult;
        if(empty($result)) abort(404);

        return view('quiz.details')
            ->withTypes($types)
            ->withType($type)
            ->withAvailableQuiz($availableQuiz)
            ->withResult($result);
    }

    public function suitableProfessionsDetails(AvailableQuiz $availableQuiz)
    {
        /** @noinspection PhpUndefinedFieldInspection */
        $matrix = SuitableProfessionResult::where('user_id', $availableQuiz->user_id)
            ->orderByDesc('created_at')
            ->firstOrFail()
            ->careerMatrix;

        return view('quiz.result')
            ->withMatrix($matrix)
            ->withAvailableQuiz($availableQuiz);
    }

    public function personTypes(AvailableQuiz $availableQuiz)
    {
        try {
            $professionalTypeResult = $availableQuiz->user->professionalTypeResult;
            $professionalTypeValues = $professionalTypeResult->values;
        } catch (\Exception $exception) {
            abort(404);
        }

        $prevItem = null;
        $sortedTypes = $professionalTypeValues->sortByDesc('value');
        foreach ($sortedTypes as $professionalTypeValue) {
            if(!empty($prevItem) && $prevItem->value != $professionalTypeValue->value || $professionalTypeValue->value == 0) {
                $professionalTypeValue->active = false;
                continue;
            }

            $prevItem = $professionalTypeValue;
            $professionalTypeValue->active = true;
        }

        return view('quiz._result-person-types')
            ->withAvailableQuiz($availableQuiz)
            ->withProfessionalTypeValues($professionalTypeValues);
    }

    public function personTypeDetails(AvailableQuiz $availableQuiz, int $typeId)
    {
        $professionalType = ProfessionalTypeResultValue::where('type_id', $typeId)->firstOrFail();
        return view('quiz._result-person-type-detail')
            ->withAvailableQuiz($availableQuiz)
            ->withType($professionalType);
    }

    public function inclinationsResult(AvailableQuiz $availableQuiz)
    {
        /** @noinspection PhpUndefinedFieldInspection */
        $result = $availableQuiz->user->inclinationResult;
        if(empty($result)) abort(404);

        $resultValues = $result->values;
//        $userTypes = $result->values()->where('is_higher', 1)->get();
        $userTypes = $result->values()->get();


        return view('quiz.result')
            ->withAvailableQuiz($availableQuiz)
            ->withUserTypes($userTypes)
            ->withResult($result)
            ->withResultValues($resultValues);
    }

    public function inclinationsDetails(AvailableQuiz $availableQuiz, Inclination $inclination)
    {
        /** @noinspection PhpUndefinedFieldInspection */
        $result = $availableQuiz->user->inclinationResult;
        if(empty($result)) abort(404);
        $inclinationResult = $result->values()->where('inclination_id', $inclination->id)->first();

        return view('quiz.details')
            ->withInclinationResult($inclinationResult)
            ->withAvailableQuiz($availableQuiz)
            ->withInclination($inclination);
    }

    public function intelligenceLevelResult(AvailableQuiz $availableQuiz)
    {
        /** @noinspection PhpUndefinedFieldInspection */
        $result = Auth::user()->intelligenceLevelResult;
        if(empty($result)) abort(404);

        $resultValues = $result->values;

        return view('quiz.result')
            ->withAvailableQuiz($availableQuiz)
            ->withResult($result)
            ->withResultValues($resultValues);
    }

    public function typeOfThinkingResult(AvailableQuiz $availableQuiz)
    {

        /** @noinspection PhpUndefinedFieldInspection */
        $result = Auth::user()->typeOfThinkingResult($availableQuiz->quiz_id);

        if(empty($result)) abort(404);
        $resultValues = $result->values;
//        $userTypes = $result->values()->where('is_higher', 1)->get();
        $userTypes = $result->values()->get();

        return view('quiz.result')
            ->withAvailableQuiz($availableQuiz)
            ->withUserTypes($userTypes)
            ->withResult($result)
            ->withResultValues($resultValues);
    }

    public function typeOfThinkingDetails(AvailableQuiz $availableQuiz, TypeOfThinking $type)
    {
        /** @noinspection PhpUndefinedFieldInspection */
        $result = $availableQuiz->user->typeOfThinkingResult;
        if(empty($result)) abort(404);
        $typeResult = $result->values()->where('type_id', $type->id)->first();

        return view('quiz.details')
            ->withTypeResult($typeResult)
            ->withAvailableQuiz($availableQuiz)
            ->withType($type);
    }

    public function solutionOfCasesResult(AvailableQuiz $availableQuiz)
    {
        /** @noinspection PhpUndefinedFieldInspection */
        $result = Auth::user()->solutionOfCasesResult;
        if(empty($result)) abort(404);
        $situations = Situation::all();
        $wrapper = new SolutionCasesResultWrapper();

        return view('quiz.result')
            ->withAvailableQuiz($availableQuiz)
            ->withSituations($situations)
            ->withResult($result)
            ->withWrapper($wrapper);
    }

    public function results()
    {

        if(!Auth::user()->isStudent) abort(404);
        $data = $this->takeUserResults(Auth::user());

//        dd($data, Auth::user()->getAuthIdentifier());
        if(empty($data)) return view('quiz.results_not_finished_tests')
            ->withUser(Auth::user());

        return view('quiz.results', $data);
    }

    public function createPdf()
    {
        if(!(Auth::user()->school_id && Auth::user()->class_id)) abort(404, 'Компания и  структурное подразделение не указаны');
        $data = $this->takeUserResults(Auth::user());
        if(empty($data)) abort(422, "Требуется пройти все тесты");


        $pdf = PDF::loadView('quiz.results-pdf', $data)
            ->setPaper('a4', 'landscape');
        return $pdf->stream('результаты.pdf');
    }

    public function userResults(User $user)
    {
        $data = $this->takeUserResults($user);
        if(empty($data)) return view('quiz.results_not_finished_tests')
            ->withUser($user);

        return view('quiz.results', $data);
    }

    public function createUserPdf(User $user)
    {
        if(!($user->school_id && $user->class_id)) abort(404, 'Компания и  структурное подразделение не указаны');
        $data = $this->takeUserResults($user);
        if(empty($data)) abort(422, "Требуется пройти все тесты");


        $pdf = PDF::loadView('quiz.results-pdf', $data)
            ->setPaper('a4', 'landscape');
        return $pdf->stream('результаты.pdf');
    }

    public function getAllResultValuesTypeOfThinking(User $user)
    {
        $types = TypeOfThinking::all();
        dd($this->results());
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
            ->where('user_answers.user_id', $user->id)
            ->whereNull('user_answers.deleted_at')
            ->groupBy('type_of_thinking.uuid')
            ->get();

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
                $values[$key]['hexColor'] = $this->hexColor($values[$key]['percentage']);
                if($value['score'] == $maxScore && $maxScore > 2) $values[$key]['is_higher'] = true;
            }
        }
        return $values;
    }

    public function hexColor($percentage)
    {
        if ($percentage <= 34) return '#FF0000';
        if (34 < $percentage && $percentage <= 70) return "#FFD966";

        return '#548235';
    }

    public function is_FinishTypeOfThinking(User $user)
    {
        $typeThinkingQuizzes = AvailableQuiz::where('user_id', $user->id)
            ->whereHas('quiz', function ($q) {
                $q->where('slug', 'type-of-thinking');
            })->get();

        $count_fillable = 3;
        $real_fillable = 0;
        if (count($typeThinkingQuizzes) === $count_fillable) {
            foreach ($typeThinkingQuizzes as $typeThinkingQuiz) {
                if ($typeThinkingQuiz->state->is('Domain\Quiz\States\Quiz\FinishedQuizState')) $real_fillable++;
            }
        }else{
            return false;
        }

        if ($real_fillable === $count_fillable){
            return true;
        }else{
            return false;
        }
    }

    public function getHexForPercentage($percentage)
    {
        if ($percentage <= 34) {
            $hex_color = '#FF0000'; // Красный цвет
        } elseif ($percentage <= 70) {
            $hex_color = '#FFD966'; // Желтый цвет
        } elseif ($percentage <= 100) {
            $hex_color = '#548235'; // Зеленый цвет
        } else {
            $hex_color = '#000000'; // Черный цвет (значение вне диапазона)
        }
        return $hex_color;
    }

    public function getResultThinkingAverage($type_result, $percentage)
    {
        return TypeOfThinkingResultAverage::where('type_result', $type_result)
            ->where('percentage_from', '<=', $percentage)
            ->where('percentage_to', '>', $percentage)
            ->first();
    }

    public function getAveragePercentForResult($items)
    {
        $totalPercentage = 0;
        $count = count($items);
        foreach ($items as $item)
            $totalPercentage += $item->percentage;

        $average = ($count > 0) ? round($totalPercentage / $count) : 0;

        return $average;
    }

    public function takeUserResults($user) {

        $is_FinishTypeOfThinking = $this->is_FinishTypeOfThinking($user);
//        if (!$is_FinishTypeOfThinking) return [];

        $questionnaireResult = $user->studentQuestionnaireResult;

        $typeThinkingQuiz = AvailableQuiz::where('user_id', $user->id)
            ->whereHas('quiz', function ($q) {
                $q->where('slug', 'type-of-thinking');
            })->first();
//        $typeThinkingResult = $user->typeOfThinkingResult(8);
        $PersonalTypeThinkingResult = $user->typeOfThinkingResult(13);
        $ProfessionalThinkingResult = $user->typeOfThinkingResult(3);
        $typeThinkingResult = new Collection();

//dd($PersonalTypeThinkingResult, $ProfessionalThinkingResult);
        if ($PersonalTypeThinkingResult) {
            //Личностный
            $PersonalThinkingTypes = $PersonalTypeThinkingResult->values;

            $PersonalThinkingTypesAverage = round($PersonalThinkingTypes->avg('percentage'));
            $PersonalThinkingTypesAverageDesc = $this->getResultThinkingAverage('personal', $PersonalThinkingTypesAverage)->description;
            $PersonalThinkingTypesAverageColor = $this->getHexForPercentage($PersonalThinkingTypesAverage);

            $typeThinkingResult = $typeThinkingResult->concat($PersonalThinkingTypes);
        }else{
            $PersonalThinkingTypes = [];
            $PersonalThinkingTypesAverage = 0;
            $PersonalThinkingTypesAverageDesc = '';
            $PersonalThinkingTypesAverageColor = "FFFFFF";
        }
        if ($ProfessionalThinkingResult) {
            //Профессиональный
            $ProfessionalThinkingTypes = $ProfessionalThinkingResult->values;
            $ProfessionalThinkingTypesAverage = round($ProfessionalThinkingTypes->avg('percentage'));
            $ProfessionalThinkingTypesAverageDesc = $this->getResultThinkingAverage('professional', $ProfessionalThinkingTypesAverage)->description;
            $ProfessionalThinkingTypesAverageColor = $this->getHexForPercentage($ProfessionalThinkingTypesAverage);

            $typeThinkingResult = $typeThinkingResult->concat($ProfessionalThinkingTypes);
        }else{
            $ProfessionalThinkingTypes = [];
            $ProfessionalThinkingTypesAverage = 0;
            $ProfessionalThinkingTypesAverageDesc = '';
            $ProfessionalThinkingTypesAverageColor = 'FFFFFF';
        }

            //Результирующий
            $typeThinkingValuesEndAverage = round($typeThinkingResult->avg('percentage'));
            $typeThinkingValuesEndAverageDesc = $this->getResultThinkingAverage('end', $typeThinkingValuesEndAverage)->description;
            $typeThinkingValuesEndAverageColor = $this->getHexForPercentage($typeThinkingValuesEndAverage);

        $is_FinishTypeOfThinking = $this->is_FinishTypeOfThinking($user);

//        if (!$is_FinishTypeOfThinking) return [];

        return [
            'user' => $user,
            'questionnaireResult' => $questionnaireResult,
            'typeThinkingQuiz' => $typeThinkingQuiz,
            'typeThinkingResult' => $typeThinkingResult ?? null,
            'typeThinkingValues' => $PersonalThinkingTypes ?? null,

//            'thinkingTypes' => $thinkingTypes ?? null,
            'depthTestsFinished' => false,

            'typeThinkingValuesEndAverage' => $typeThinkingValuesEndAverage ?? null,
            'typeThinkingValuesEndAverageDesc' => $typeThinkingValuesEndAverageDesc ?? null,
            'typeThinkingValuesEndAverageColor' => $typeThinkingValuesEndAverageColor ?? null,

            'PersonalThinkingTypes' => $PersonalThinkingTypes ?? null,
            'PersonalThinkingTypesAverage' => $PersonalThinkingTypesAverage ?? null,
            'PersonalThinkingTypesAverageDesc' => $PersonalThinkingTypesAverageDesc ?? null,
            'PersonalThinkingTypesAverageColor' => $PersonalThinkingTypesAverageColor ?? null,

            'ProfessionalThinkingTypes' => $ProfessionalThinkingTypes ?? null,
            'ProfessionalThinkingTypesAverage' => $ProfessionalThinkingTypesAverage ?? null,
            'ProfessionalThinkingTypesAverageDesc' => $ProfessionalThinkingTypesAverageDesc ?? null,
            'ProfessionalThinkingTypesAverageColor' => $ProfessionalThinkingTypesAverageColor ?? null

        ];
    }
}
