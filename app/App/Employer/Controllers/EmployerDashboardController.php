<?php

namespace App\Employer\Controllers;

use App\Http\Controllers\Controller;
use Domain\Employer\Actions\GetAppliedAdmissionAction;
use Domain\Employer\Actions\GetBaseTestAction;
use Domain\Employer\Actions\GetCasesQuestionsStudentsCountAction;
use Domain\Employer\Actions\GetCharacterTraitsAction;
use Domain\Employer\Actions\GetChildGotConsultationAction;
use Domain\Employer\Actions\GetConcludedTargetAgreementAction;
use Domain\Employer\Actions\GetDepthTestAction;
use Domain\Employer\Actions\GetEnrolledProfileUZAction;
use Domain\Employer\Actions\GetGotConsultationAction;
use Domain\Employer\Actions\GetGotConsultationWithParentAction;
use Domain\Employer\Actions\GetInviteDepthTestAction;
use Domain\Employer\Actions\GetMatchedSelectionBaseStepAction;
use Domain\Employer\Actions\GetModelCompetenceRange31to100StudentsCountAction;
use Domain\Employer\Actions\GetParentRegistrationAction;
use Domain\Employer\Actions\GetParticipatedEventsAction;
use Domain\Employer\Actions\GetPersonTypesAction;
use Domain\Employer\Actions\GetProposedAdmissionAction;
use Domain\Employer\Actions\GetQuestionnaireStudentsCountAction;
use Domain\Employer\Actions\GetRecommendAction;
use Domain\Employer\Actions\GetRegistrationStudentsCountAction;
use Domain\Employer\Actions\GetStudentsAgeAction;
use Domain\Employer\Actions\GetStudentsCountAction;
use Domain\Employer\Actions\GetTargetSelectionDepthStepAction;
use Domain\Employer\Actions\GetYearsOfEducationAction;
use Domain\Employer\Actions\StoreDashboardSettingsAction;
use Domain\User\Models\StageTestsAndConsultations;
use Domain\UserProfile\Actions\UserProfiler;
use Domain\UserProfile\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerDashboardController extends Controller
{
    protected $user_profiles;

    public function index(Request $request)
    {

        $profiles=array();

        if(Auth::user()->orgunit) {
            $orgunit=Auth::user()->orgunit;
            foreach($orgunit->activityKinds()->get() as $aktivity_kind) {
                $profile=UserProfile::find($aktivity_kind->activityKind()->first()->id);
                $profiles[]=$profile;
            }
        }

        $this->user_profiles=$profiles;

        // данные для фильтров
        $getYearsOfEducationAction = new GetYearsOfEducationAction();
        $getStudentsAgeAction = new GetStudentsAgeAction();
        $getPersonTypesAction = new GetPersonTypesAction();

        $latestSyncData = StageTestsAndConsultations::orderBy('created_at', 'desc')->first();
        $latestSyncDataLabel = $latestSyncData ? $latestSyncData->created_at->format('d.m.Y H:i') : 'нет данных';


        $data = $this->getDashboardData($request);


        return view('employer.dashboard',compact('profiles'))
            // данные для фильтров
            ->withLatestSyncDataLabel($latestSyncDataLabel)
            ->withYears($getYearsOfEducationAction->run())
            ->withStudentsAge($getStudentsAgeAction->run())
            ->withPersonTypes($getPersonTypesAction->run())

            ->with($data);
    }

    public function settings(Request $request)
    {
        return view('employer.dashboard_settings');
    }

    public function storeSettings(Request $request, StoreDashboardSettingsAction $action)
    {
        $action->run(Auth::user(), $request->input());
        return back()->with('status', 'Настройки были сохранены');
    }

    protected function getDashboardData(Request $request): array
    {
        $settings = Auth::user()->employerDashboardSettings;
        $filters = $request->input();

        if (Auth::user()->orgunit && !(Auth::user()->can('admin'))) {
            $orgunit = Auth::user()->orgunit;
            foreach ($orgunit->activityKinds()->get() as $aktivity_kind) {
                $profile_id = $aktivity_kind->activityKind()->first()->id;
            }

            $search_location = [];
            //какой у него кладр код города, области, школы и класса
            if ($orgunit->search_location != "") {
                $search_location = unserialize($orgunit->search_location);
                @$filters['class_id'] = array_column($search_location, 'class_id');
            }


        }

        if (@count($filters["class"]) !== 0) {
            $filters["class_id"] = $filters["class"];
            unset($filters["class"]);
        }

//        if (Auth::user()->can('admin')){
//            $filters = [];
//        }
        $getStudentsCountAction = new GetStudentsCountAction();
        $data = [];
        $studentsCount = $getStudentsCountAction->run($filters);


        foreach($this->user_profiles as $user_profile) {

            ///Общая численность
            $getRegistrationStudentsCountAction = new GetRegistrationStudentsCountAction();

            $data['user_profiles'][$user_profile->id]['registration_count']=$getRegistrationStudentsCountAction->run($request->q, $filters, false, $studentsCount['all']);
            ///$getBaseTestAction = new GetBaseTestAction($user_profile->id,$search_location);
            $data['user_profiles'][$user_profile->id]['baseTest']['count']=round($data['user_profiles'][$user_profile->id]['registration_count']['count']*$user_profile->id/100);
           // $data['user_profiles'][$user_profile->id]['baseTest'] = $getBaseTestAction->run($request->q, $filters, false, $studentsCount['all']);
        }


        // данные progressbar`ов

        $getRegistrationStudentsCountAction = new GetRegistrationStudentsCountAction();
        $getQuestionnaireStudentsCountAction = new GetQuestionnaireStudentsCountAction();
        $getCasesQuestionsStudentsCountAction = new GetCasesQuestionsStudentsCountAction();
        $getModelCompetenceRange31to100 = new GetModelCompetenceRange31to100StudentsCountAction();
        $getBaseTestAction = new GetBaseTestAction();
        $getInviteDepthTestAction = new GetInviteDepthTestAction();
        $getDepthTestAction = new GetDepthTestAction();
        $getParentRegistrationAction = new GetParentRegistrationAction();
        $getRecommendAction = new GetRecommendAction();
        $getMatchedSelectionBaseStepAction = new GetMatchedSelectionBaseStepAction();
        $getTargetSelectionDepthStepAction = new GetTargetSelectionDepthStepAction();
        $getGotConsultationAction = new GetGotConsultationAction();
        $getParticipatedEventsAction = new GetParticipatedEventsAction();

        // progressbar`ы итоги отбора
        $getProposedAdmissionAction = new GetProposedAdmissionAction();
        $getAppliedAdmissionAction = new GetAppliedAdmissionAction();
        $getEnrolledProfileUzAction = new GetEnrolledProfileUZAction();
        $getConcludedTargetAgreementAction = new GetConcludedTargetAgreementAction();




        // Списочная численность школьников

        if ($settings['students_count']) {
            $data['studentsCount'] = $studentsCount;
        }

        // Зарегистрировано школьников
        if ($settings['registration_students_count']) {
            $data['registrationStudentsCount'] = $getRegistrationStudentsCountAction->run($request->q, $filters, false, $studentsCount['all']);
        }

        // Прошли анкету
        if ($settings['questionnaire_students_count']) {
            $data['questionnaireStudentsCount'] = $getQuestionnaireStudentsCountAction->run($request->q, $filters, false, $studentsCount['all']);
        }

        // Решили кейсы и тесты на оценку Soft и Hard
        if ($settings['cases_questions_students_count']) {
            $data['CasesQuestionsStudentsCount'] = $getCasesQuestionsStudentsCountAction->run($request->q, $filters, false, $studentsCount['all']);
        }

        // Соответствуют модели компетенций от 31 до 100 %
        if ($settings['model_competence_range_31_to_100']) {
            $data['modelCompetenceRange31to100'] = $getModelCompetenceRange31to100->run($request->q, $filters, false, $studentsCount['all']);
        }

        // Пройден базовый тест
        if ($settings['base_test']) {
            $data['baseTest'] = $getBaseTestAction->run($request->q, $filters, false, $studentsCount['all']);
        }

        // Пройден базовый тест
        if ($settings['participated_events']) {
            $data['participatedEvents'] = $getParticipatedEventsAction->run($request->q, $filters, false, $studentsCount['all']);
        }

        // Соответствует базовому профилю
        if ($settings['matched_selection_base_step']) {
            $data['matchedSelectionBaseStep'] = $getMatchedSelectionBaseStepAction->run($request->q, $filters, false, $studentsCount['all']);
        }

        // Приглашены на углубленный тест
        if ($settings['invite_depth_test']) {
            $data['inviteDepthTest'] = $getInviteDepthTestAction->run($request->q, $filters, false, $studentsCount['all']);
        }

        // Пройден углубленный тест
        if ($settings['depth_test']) {
            $data['depthTest'] = $getDepthTestAction->run($request->q, $filters, false, $studentsCount['all']);
        }

        // Соответствует целевому профилю
        if ($settings['target_selection_depth_step']) {
            $data['targetSelectionDepthStep'] = $getTargetSelectionDepthStepAction->run($request->q, $filters, false, $studentsCount['all']);
        }

        // Зарегистрировано родителей
        if ($settings['got_consultation']) {
            $data['gotConsultation'] = $getGotConsultationAction->run($request->q, $filters, false, $studentsCount['all']);
        }

        // Зарегистрировано родителей
        if ($settings['parent_registration']) {
            $data['parentRegistration'] = $getParentRegistrationAction->run($request->q, $filters, false, $studentsCount['all']);
        }

        // Рекомендованы
        if ($settings['recommend']) {
            $data['recommend'] = $getRecommendAction->run($request->q, $filters, false, $studentsCount['all']);
        }

        /**
            Итоги отбора
         */
        // Предложено поступление
        if ($settings['proposed_admission']) {
            $data['proposedAdmission'] = $getProposedAdmissionAction->run($request->q, $filters, false, $studentsCount['all']);
        }

        // Подали заявления на поступление
        if ($settings['applied_admission']) {
            $data['appliedAdmission'] = $getAppliedAdmissionAction->run($request->q, $filters, false, $studentsCount['all']);
        }

        // Зачислены в профильные УЗ
        if ($settings['enrolled_profile_uz']) {
            $data['enrolledProfileUZ'] = $getEnrolledProfileUzAction->run($request->q, $filters, false, $studentsCount['all']);
        }

        // Заключили ЦД
        if ($settings['concluded_target_agreement']) {
            $data['concludedTargetAgreement'] = $getConcludedTargetAgreementAction->run($request->q, $filters, false, $studentsCount['all']);
        }

        return $data;
    }
}
