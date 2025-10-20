<?php

namespace Domain\User\Actions;

use App\Quiz\Controllers\QuizController;
use Domain\Consultation\States\CarriedOutConsultationState;
use Domain\Kladr\Models\Kladr;
use Domain\Quiz\Models\CharacterTrait;
use Domain\Quiz\Models\Inclination;
use Domain\Quiz\Models\IntelligenceLevelType;
use Domain\Quiz\Models\ProfessionalTypeResult;
use Domain\Quiz\Models\TypeOfThinking;
use Domain\User\Models\StageTestsAndConsultations;
use Domain\User\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SyncStageTestsAndConsultationsAction
{
    public function run()
    {
        try {
            set_time_limit(0);
            DB::beginTransaction();

            DB::table('stages_tests_and_consultations')->update(['deleted_at' => now()]);
            User::query()->students()->chunk(100, function ($students) {

                foreach ($students as $user) {
                    if(!$user->class_id || !$user->school_id) continue;

                    $data = $this->getData($user);
                    StageTestsAndConsultations::create($data);
                }
            });

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            Log::error("code: ".$exception->getLine()."; trace:".$exception->getTraceAsString());
            throw $exception;
        }
    }

    public function getUser($user_id)
    {
        $User = User::where('id', $user_id)->first();
        return $User;
    }

    protected function getData(User $user): array
    {
        $parent = $this->getChildParent($user);
        $kladr = $this->getKladr($user->kladr_code);
        $consultationData = $this->getConsultationData($user);
        $eventsData = $this->getEventsData($user);

        $personTypeValues = $this->getPersonTypeValues($user);
        $professional_types_str = $this->getStringProfessionalTypesResults($user);
        $QuizController = new QuizController();
        $takeUserResults = $QuizController->takeUserResults($user);
        $typeThinkingValuesEndAverage = $takeUserResults['typeThinkingValuesEndAverage'];

        return [
            'uuid' => Str::uuid(),
            'user_id' => $user->id,
            'school_id' => $user->school_id,
            'class_id' => $user->class_id,
            'consultation_id' => $consultationData['id'],
            'parent_id' => optional($parent)->id,

            // школа и класс
            'class__year' => $user->class->year,
            'class' => $user->class->number . $user->class->letter,
            'school' => $user->school->short_title,

            // ученик
            'full_name' => $user->fullName,
            'age' => $user->fullYears,
            'gender' => $user->sex,
            'kladr_code' => optional($kladr)->code,
            'kladr_name' => optional($kladr)->name ?? 'не указан',
            'email' => $user->email,
            'phone' => $user->phone,
            'student_questionnaire_finished' => $user->studentQuestionnaireFinished,

            // тип личности
            'person_type__pm' => $personTypeValues['pm'],
            'person_type__cb' => $personTypeValues['cb'],
            'person_type__se' => $personTypeValues['se'],
            'person_type__sp' => $personTypeValues['sp'],
            'person_type__p' => $personTypeValues['p'],
            'person_type__h' => $personTypeValues['h'],
            'person_type__aa' => $personTypeValues['aa'],
            'person_type__d' => $personTypeValues['d'],
            'person_type__gg' => $personTypeValues['gg'],
            'person_type__t' => $personTypeValues['t'],
            'person_type__ds' => $personTypeValues['ds'],

            // базовый этап
            'base_tests_finished' => $user->countNotFinishedBaseTests == 0,
            'base_tests_percentage' => (100 / 3) * (3 - $user->countNotFinishedBaseTests),
            'base_step_selection' => $this->selectionBaseStep($user),

            // глубинный этап
            'depth_tests_finished' => $user->finishedDepthTests,
            'depth_tests_percentage' => (100 / 4) * (4 - $user->countNotFinishedDepthTests),
            'depth_step_selection' => $this->selectionDepthStep($user),
            'invited_depth_tests' => $user->hasDepthTests(),

            // родитель
            'parent__full_name' => optional($parent)->fullName,
            'parent__phone' => optional($parent)->phone,
            'parent__email' => optional($parent)->email,
            'parent_questionnaire_finished' => optional($parent)->parentQuestionnaireFinished,

            // консультация
            'got_consultation' => boolval($consultationData['child']),
            'got_consultation_status' => $consultationData['carried_out'] ?
                'carried_out' : ($consultationData['child'] ? 'invited' : 'not_invited'),

            'got_consultation_with_parent' => boolval($consultationData['with_parent']),
            'got_consultation_status_with_parent' => $consultationData['with_parent__carried_out'] ?
                'carried_out' : ($consultationData['with_parent'] ? 'invited' : 'not_invited'),

            'recommend' => optional($consultationData['result'])->recommend,
            'agree' => optional($consultationData['result'])->agree,
            'has_events' => $eventsData['has_events'],
            'has_visited_events' => $eventsData['has_visited_event'],
            'count_events' => $eventsData['count_events'],
            'count_visited_events' => $eventsData['count_visited_events'],
            'events_formats' => $eventsData['events_formats'],
            'proposed_admission' => $user->student->proposed_admission,
            'applied_admission' => $user->student->applied_admission,
            'enrolled_profile_uz' => $user->student->enrolled_profile_uz,
            'concluded_target_agreement' => $user->student->concluded_target_agreement,
            'professional_types_str' => $professional_types_str,
            'type_thinking_values_end_average' => $typeThinkingValuesEndAverage,
        ];
    }

    protected function getChildParent(User $child): ?User
    {
        $observer = $child->observers()->first();
        if($observer) {
            return $observer->user;
        }

        return null;
    }

    protected function getKladr(?string $code): ?Kladr
    {
        return Kladr::where('code', $code)
            ->orWhere('name', $code)
            ->first();
    }

    protected function selectionBaseStep(User $user): string
    {
        if(!$user->suitableProfessionsQuizFinished || !$user->studentQuestionnaireFinished) return 'mismatched';
        $chanceStaying = $user->studentQuestionnaireResult->chancesOfStayingHometown['value'];
        $types = $this->userTypeTitles($user);
        $objectType = mb_strtolower($user->suitableProfessions->careerMatrix->activityObject->title);

        if($this->containRange($chanceStaying, [6,10]) && ($this->hasArrayValueInArray($types, ['физико-математический тип', 'технический тип', 'оборонно-спортивный тип']) || in_array($objectType, ['техника', 'изделия', 'природные ресурсы']))) {
            return 'matched';
        }

        if($this->containRange($chanceStaying, [4,10]) && ($this->hasArrayValueInArray($types, ['физико-математический тип', 'технический тип', 'оборонно-спортивный тип', 'химико-биологический тип', 'геолого-географический тип']) || in_array($objectType, ['техника', 'изделия', 'природные ресурсы', 'человек']))) {
            return 'partially_matched';
        }

        return 'mismatched';
    }

    protected function selectionDepthStep(User $user): string
    {
        if(!$user->finishedDepthTests) return 'not_target';

        // данные с теста на уровень интеллекта
        $intelligenceLevelPercentage = $user->intelligenceLevelResult->percentage;
        $intelligenceLevelTechPercentage = $this->userIntelligenceLevelPercentage($user, 'Уровень образованности в области точных наук, навыки восприятия числовой информации');

        // данные с теста тип мышления
        $typeThinkingPdPercentage = $this->userTypeThinkingPercentage($user, 'П-Д');
        $typeThinkingAsPercentage = $this->userTypeThinkingPercentage($user, 'А-С');
        $typeThinkingKPercentage = $this->userTypeThinkingPercentage($user, 'К');

        // данные с теста склонности
        $logicPercentage = $this->userInclinationTypePercentage($user, 'Логик');
        $researcherPercentage = $this->userInclinationTypePercentage($user, 'Исследователь');
        $analyticPercentage = $this->userInclinationTypePercentage($user, 'Аналитик');

        /**
         * ЦЕЛЕВОЙ
         * */

        // склонности
        if($this->containPercentageByIndexArray(
                [$logicPercentage, $researcherPercentage, $analyticPercentage],
                [[70,100], [60,100], [60,100]]) &&
            // тип мышления
            $this->containPercentageByIndexArray(
                [$typeThinkingPdPercentage, $typeThinkingAsPercentage, $typeThinkingKPercentage],
                [[80,100], [60,100], [60,100]]) &&
            // интеллект
            $this->containRange($intelligenceLevelPercentage, [66,100]) &&
            $this->containRange($intelligenceLevelTechPercentage, [50,100])
        ) {
            return 'target';
        }

        /**
         * ЧАСТИЧНО ЦЕЛЕВОЙ
         * */

        // склонности
        if($this->containPercentageByIndexArray(
                [$logicPercentage, $researcherPercentage, $analyticPercentage],
                [[45,100], [45,100], [45,100]]) &&
            // тип мышления
            $this->containPercentageByIndexArray(
                [$typeThinkingPdPercentage, $typeThinkingAsPercentage, $typeThinkingKPercentage],
                [[50,100], [50,100], [50,100]]) &&
            // интеллект
            $this->containRange($intelligenceLevelPercentage, [38,100]) &&
            $this->containRange($intelligenceLevelTechPercentage, [40,100])
        ) {
            return 'partially_target';
        }

        return 'not_target';
    }

    protected function containRange($number, array $range): bool {
        list($min, $max) = $range;
        $num = intval($number);
        if($max >= $num && $num >= $min) return true;

        return false;
    }

    /**
     * Функция по нахождению хотя бы одного значения в промежуток значений
     * @param $numbers - массив с проверяемыми числами
     * @param $ranges - массив с диапазонами где index это index массива чисел
     * @return bool
     */
    protected function containPercentageByIndexArray($numbers, $ranges): bool {
        foreach ($numbers as $index => $number) {
            if($this->containRange($numbers[$index], $ranges[$index])) {
                return true;
            }
        }

        return false;
    }

    protected function userInclinationTypePercentage(User $user, string $title): int
    {
        $type = Inclination::where('title', $title)->first();
        if($type && $user->inclinationResult) {
            $res = $user->inclinationResult->values()->where('type_id', $type->id)->first();
            return $res->percentage ?? 0;
        }

        return 0;
    }

    protected function userIntelligenceLevelPercentage(User $user, string $title): int
    {
        $type = IntelligenceLevelType::where('title', $title)->first();
        if($type && $user->intelligenceLevelResult) {
            $res = $user->intelligenceLevelResult->values()->where('type_id', $type->id)->first();
            return $res->percentage ?? 0;
        }

        return 0;
    }

    protected function userTypeThinkingPercentage(User $user, string $shortTitle): int
    {
        $type = TypeOfThinking::where('short_title', $shortTitle)->first();
        if($type && $user->typeOfThinkingResult) {
            $res = $user->typeOfThinkingResult->values()->where('type_id', $type->id)->first();
            return $res->percentage ?? 0;
        }

        return 0;
    }

    protected function hasArrayValueInArray(array $search, array $values): bool
    {
        foreach ($search as $item) {
            if(in_array($item, $values)) return true;
        }
        return false;
    }

    protected function userTypeTitles(User $user): array
    {
        $types = [];
        $pTypes = $user->personTypes();
        foreach ($pTypes as $type) {
            $types[] = trim(mb_strtolower($type->type->title));
        }

        return $types;
    }

    protected function getTraitValues(User $user): array
    {
        return [
            'ie' => $this->userTraitIsHigher($user, 'ie'),
            'ar' => $this->userTraitIsHigher($user, 'ar'),
            'op' => $this->userTraitIsHigher($user, 'op'),
            'ic' => $this->userTraitIsHigher($user, 'ic'),
            'ib' => $this->userTraitIsHigher($user, 'ib'),
        ];
    }

    protected function getPersonTypeValues(User $user): array
    {
        $types = $user->personTypes();

        return [
            'pm' => $this->personTypeContainTypes($types, 'pm'),
            'cb' => $this->personTypeContainTypes($types, 'cb'),
            'se' => $this->personTypeContainTypes($types, 'se'),
            'sp' => $this->personTypeContainTypes($types, 'sp'),
            'p' => $this->personTypeContainTypes($types, 'p'),
            'h' => $this->personTypeContainTypes($types, 'h'),
            'aa' => $this->personTypeContainTypes($types, 'aa'),
            'd' => $this->personTypeContainTypes($types, 'd'),
            'gg' => $this->personTypeContainTypes($types, 'gg'),
            't' => $this->personTypeContainTypes($types, 't'),
            'ds' => $this->personTypeContainTypes($types, 'ds'),
        ];
    }

    protected function personTypeContainTypes($types, $shortCode): bool
    {
        foreach($types as $type) {
            if($type->type->short_code == $shortCode) return true;
        }

        return  false;
    }

    protected function userTraitIsHigher(User $user, string $code): bool
    {
        $type = CharacterTrait::where('code', $code)->first();
        if($type && $user->characterTraitResult) {
            $res = $user->characterTraitResult->values()->where('trait_id', $type->id)->first();
            return boolval($res->is_higher ?? 0);
        }

        return false;
    }

    protected function getConsultationData(User $user): array
    {
        $consultationWithParent = $user->consultations()->whereNotNull('parent_id')->first();
        $consultationOnlyChild = $user->consultations()->whereNull('parent_id')->first();

        $consultationResult = null;
        $consultationId = null;

        if($consultationOnlyChild && $consultationWithParent) {
            if($consultationOnlyChild->id < $consultationWithParent->id) {
                $consultationId = $consultationWithParent->id;
                $consultationResult = $consultationWithParent->result;
            } else {
                $consultationId = $consultationOnlyChild->id;
                $consultationResult = $consultationOnlyChild->result;
            }
        } else if($consultationOnlyChild) {
            $consultationId = $consultationOnlyChild->id;
            $consultationResult = $consultationOnlyChild->result;
        } else if($consultationWithParent) {
            $consultationId = $consultationWithParent->id;
            $consultationResult = $consultationWithParent->result;
        }

        $carriedOutConsultationWithParent = false;
        if($consultationWithParent) {
            $carriedOutConsultationWithParent = $consultationWithParent->state->is(CarriedOutConsultationState::class);
        }

        $carriedOutConsultation = false;
        if($consultationOnlyChild) {
            $carriedOutConsultation = $consultationOnlyChild->state->is(CarriedOutConsultationState::class);
        }


        return [
            'id' => $consultationId,
            'result' => $consultationResult,
            'with_parent' => $consultationWithParent,
            'child' => $consultationOnlyChild,
            'with_parent__carried_out' => $carriedOutConsultationWithParent,
            'carried_out' => $carriedOutConsultation,
        ];
    }

    protected function getEventsData(User $user): array
    {
        $eventsCount = $user->events()->count();

        $visitedEventsCount = $user->events()->where('visited', true)->count();
        $str_events_formats = $user->getEventsFormats();

        return [
            'has_events' => boolval($eventsCount),
            'has_visited_event' => boolval($visitedEventsCount),
            'count_events' => $eventsCount,
            'count_visited_events' => $visitedEventsCount,
            'events_formats' => $str_events_formats,
        ];
    }

    protected function getStringProfessionalTypesResults($user)
    {
        $str_user_professional_types = $user->getStringProfessionalTypesResults();

        return $str_user_professional_types;
    }
}
