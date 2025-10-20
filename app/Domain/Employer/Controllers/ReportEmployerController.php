<?php

namespace Domain\Employer\Controllers;

use App\Exports\StudentReportExport;
use Barryvdh\DomPDF\Facade as PDF;
use Domain\Consultation\Models\Consultation;
use Domain\Employer\Actions\GetAppliedAdmissionAction;
use Domain\Employer\Actions\GetBaseTestAction;
use Domain\Employer\Actions\GetCasesQuestionsStudentsCountAction;
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
use Domain\Employer\Actions\GetProposedAdmissionAction;
use Domain\Employer\Actions\GetQuestionnaireStudentsCountAction;
use Domain\Employer\Actions\GetRecommendAction;
use Domain\Employer\Actions\GetRegistrationStudentsCountAction;
use Domain\Employer\Actions\GetStudentsCountAction;
use Domain\Employer\Actions\GetTargetSelectionDepthStepAction;
use Domain\Orgunit\Models\OrgunitNote;
use Domain\User\Models\StageTestsAndConsultations;
use Domain\User\Models\User;
use Domain\UserProfile\Actions\UserProfiler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Support\Controller;
use App\Quiz\Controllers\QuizController;

class ReportEmployerController extends Controller
{
    public function students(Request $request, Consultation $consultation)
    {

        ////текущий пользователь
        if (Auth::user()->orgunit && !(Auth::user()->can('admin'))) {
            $orgunit = Auth::user()->orgunit;
            foreach ($orgunit->activityKinds()->get() as $aktivity_kind) {
                $profile_id = $aktivity_kind->activityKind()->first()->id;
            }

            $search_location = array();
            //какой у него кладр код города, области, школы и класса

            if (@$orgunit->search_location != "") {
                $search_location = unserialize(@$orgunit->search_location);
            }
        } else {
            $search_location = array();
        }

        if (Auth::user()->can('admin')){

        }
//        dd($request, $search_location);
        $data = $this->getStudentsData($request, $search_location);
        if (!count($data)) abort(404);

        $pos = 0;

        $new_users = collect();


        foreach ($data['users'] as $data_user) {


            //echo "filtered<br>";
            $user_id = $data_user->user_id;
            if (!empty($request->request->get("activity_kind_id"))) {
                $profile_id = $request->request->get("activity_kind_id")[0];
            }
            if (empty($profile_id)){
                $profile_id = 3; //default(пустой, используется при не выбранном профиле)
            }

            if (!empty($profile_id)) {

                $userProfile = new UserProfiler($user_id, $profile_id);

                $result = $userProfile->run();
                $data['profiler'][$data_user->id] = $result;
            }

            $data['filtered'][$data_user->id] = true;

            ///запрос заметок обычных
            $orgunitNote = OrgunitNote::where('orgunit_id', Auth::user()->id)->where('user_id', $data_user->id)->where('type', 'simple')->first();
            if ($orgunitNote) {
                $data['note_simple'][$data_user->id] = $orgunitNote->note;
            }

            ///запрос заметок мероприятий
            $orgunitNote = OrgunitNote::where('orgunit_id', Auth::user()->id)->where('user_id', $data_user->id)->where('type', 'events')->first();
            if ($orgunitNote) {
                $data['note_events'][$data_user->id] = $orgunitNote->note;
            }

            ///проходил ли квиз
            $user_for_quiz = User::find($data_user->user_id);
            $data["personal_quiz"][$data_user->id] = $user_for_quiz->getPersonalQuizBall();


            $pos++;
        }



        ///пересоздание коллекци
        /*
                $new_users->getCollection()->paginate(15)->transform(function ($item) use ($data) {

                    if(@$data['filtered'][$item->id]==true)
                        return $item;  else
                            return false;
                });

        */
        //  $data['users_new']= $data['users_new']->get();



        ///  $data['users']= $data['users_new'];

        $latestSyncData = StageTestsAndConsultations::orderBy('created_at', 'desc')->first();
        $latestSyncDataLabel = $latestSyncData ? $latestSyncData->created_at->format('d.m.Y H:i') : 'нет данных';

        $QuizController = new QuizController();


        return view('employer.reports.students', compact('data'))
            ->with($data)
            ->with('QuizController', $QuizController)
            ->withLatestSyncDataLabel($latestSyncDataLabel);
    }

    public function studentsGeneratePdf(Request $request)
    {
        $data = $this->getStudentsDataBySettings($request);
        if(!count($data)) return back()
            ->withInput()
            ->withErrors(['error' => "Для генерации PDF включите отображение пунктов, в настройках главной страницы"]);

        $pdf = PDF::loadView('employer.reports._students._pdf.index', $data)
            ->setPaper('a4', 'landscape');

        return $pdf->stream('отчет.pdf');
    }

    public function studentsGenerateExcel(Request $request)
    {
        $request->merge(array('per_page' => 5000000));
        $request['page'] = 1;

        if (Auth::user()->orgunit) {
            $orgunit = Auth::user()->orgunit;
            foreach ($orgunit->activityKinds()->get() as $aktivity_kind) {
                $profile_id = $aktivity_kind->activityKind()->first()->id;
            }

            $search_location = array();
            //какой у него кладр код города, области, школы и класса
            if ($orgunit->search_location != "") {
                $search_location = unserialize($orgunit->search_location);
            }
        }


        @$data = $this->getStudentsData($request, $search_location);

        if (!count($data)) abort(404);

        $pos = 0;

        $new_users = collect();
        foreach ($data['users'] as $data_user) {


            //echo "filtered<br>";
            $user_id = $data_user->user_id;

            if (!empty($request->request->get("activity_kind_id"))) {
                $profile_id = $request->request->get("activity_kind_id")[0];
            }

            if (empty($profile_id)){
                $profile_id = 3; //default(пустой, используется при не выбранном профиле)
            }

            if (isset($profile_id) && !empty($profile_id)) {

                $userProfile = new UserProfiler($user_id, $profile_id);
                $result = $userProfile->run();

                $data['profiler'][$data_user->id] = $result;
            }

            $data['filtered'][$data_user->id] = true;

            ///запрос заметок обычных
            $orgunitNote = OrgunitNote::where('orgunit_id', Auth::user()->id)->where('user_id', $data_user->id)->where('type', 'simple')->first();
            if ($orgunitNote) {
                $data['note_simple'][$data_user->id] = $orgunitNote->note;
            }

            ///запрос заметок мероприятий
            $orgunitNote = OrgunitNote::where('orgunit_id', Auth::user()->id)->where('user_id', $data_user->id)->where('type', 'events')->first();
            if ($orgunitNote) {
                $data['note_events'][$data_user->id] = $orgunitNote->note;
            }

            ///проходил ли квиз
            $user_for_quiz = User::find($data_user->user_id);
            $data["personal_quiz"][$data_user->id] = $user_for_quiz->getPersonalQuizBall();


            $pos++;
        }

        $latestSyncData = StageTestsAndConsultations::orderBy('created_at', 'desc')->first();
        $latestSyncDataLabel = $latestSyncData ? $latestSyncData->created_at->format('d.m.Y H:i') : 'нет данных';

        $QuizController = new QuizController();
        $data['QuizController'] = $QuizController;

        /// переходим к экселю
        $exc_student = new StudentReportExport($data);


        return Excel::download(new StudentReportExport($data), 'report.xlsx');


    }

    protected function getStudentsData(Request $request, $search_location): array
    {
        $filters = $request->input();

        $valid=true;


        ///фильтрация по умолчанию
//        if(@$filters["city"]=="") {
//            @$filters["city"]=$search_location[0]["city"];
//        }
//
//        if(@count($filters["school"])==0) {
//            @$filters["school"]=array($search_location[0]["school_name"]);
//        }

        if (@count($filters["class"]) !== 0) {
//            @$filters["class"] = array($search_location[0]["class_id"]);
            $filters["class_id"] = $filters["class"];
            unset($filters["class"]);
        }else if (!empty($search_location)){
            $filters["class_id"] = array_column($search_location, 'class_id');
        }

        ////проверка разрешенности по городу
//        if(@$filters["city"]!="") {
//
//            foreach($search_location as $search_loc) {
//                if ($search_loc["city"] != "") {
//                    if ($search_loc["city"] == $filters["city"]) {
//                        $valid = true;
//
//                    }
//                } else {
//                    $valid=true;
//                }
//            }
//
//        }
//
//
//
//        ///проверка разрешения по школе
//
//        if(@count($filters["school"])!=0) {
//            foreach($filters["school"] as $school) {
//
//                $school_valid=false;
//                foreach($search_location as $search_loc) {
//
//                    if($school==$search_loc["school_name"]) {
//                        $school_valid = true;
//                    }
//
//                }
//
//                if($school_valid==false) {
//                    $valid=false;
//                }
//
//            }
//        }
//
//
//
//        ////проверка разршения по классу
//        if(@count($filters["class"])!=0) {
//            foreach($filters["class"] as $class) {
//
//                $class_valid=false;
//                foreach($search_location as $search_loc) {
//
//                    if($class=$search_loc["class_id"]) {
//                        $class_valid = true;
//                    }
//
//
//                    if($class_valid==false) {
//                        $valid=false;
//                    }
//
//                }
//
//            }
//        }





        ///проверка, если ли city в настройках работодателя


       if($valid == false) {
           return array();
       }


        $getQuestionnaireStudentsCountAction = new GetQuestionnaireStudentsCountAction();
        $getCasesQuestionsStudentsCountAction = new GetCasesQuestionsStudentsCountAction();
        $getModelCompetenceRange31to100 = new GetModelCompetenceRange31to100StudentsCountAction();

        // данные progressbar`ов
        $getRegistrationStudentsCountAction = new GetRegistrationStudentsCountAction();
        $getBaseTestAction = new GetBaseTestAction();
        $getInviteDepthTestAction = new GetInviteDepthTestAction();
        $getDepthTestAction = new GetDepthTestAction();
        $getParentRegistrationAction = new GetParentRegistrationAction();
        $getRecommendAction = new GetRecommendAction();
        $getMatchedSelectionBaseStepAction = new GetMatchedSelectionBaseStepAction();
        $getTargetSelectionDepthStepAction = new GetTargetSelectionDepthStepAction();
        $getGotConsultationAction = new GetGotConsultationAction();
        $getParticipatedEventsAction = new GetParticipatedEventsAction();

        $data = [];

        if ($request->input('type') == 'registration_students_count') {
            $data['title'] = __('Зарегистрированы наставники');
            list($users, $userIds) = $getRegistrationStudentsCountAction->run($request->q, $filters, true);

            $data['users'] = $users;

            $data['user_ids'] = $userIds;
            return $data;
        }

        if ($request->input('type') == 'questionnaire_students') {
            $data['title'] = __('Прошли анкету');
            list($users, $userIds) = $getQuestionnaireStudentsCountAction->run($request->q, $filters, true);
            $data['users'] = $users;
            $data['user_ids'] = $userIds;
            return $data;
        }

        if ($request->input('type') == 'cases_questions_students') {
            $data['title'] = __('Решили кейсы и тесты на оценку Soft и Hard');
            list($users, $userIds) = $getCasesQuestionsStudentsCountAction->run($request->q, $filters, true);
            $data['users'] = $users;
            $data['user_ids'] = $userIds;
            return $data;
        }

        if ($request->input('type') == 'model_competence_range_31_to_100') {
            $data['title'] = __('Соответствуют модели компетенций  от 31 до 100%');
            list($users, $userIds) = $getModelCompetenceRange31to100->run($request->q, $filters, true);
            $data['users'] = $users;
            $data['user_ids'] = $userIds;
            return $data;
        }

        if ($request->input('type') == 'base_test') {
            $data['title'] = __('Пройден базовый тест');
            list($users, $userIds) = $getBaseTestAction->run($request->q, $filters, true);
            $data['users'] = $users;
            $data['user_ids'] = $userIds;
            return $data;
        }

        if ($request->input('type') == 'participated_events') {
            $data['title'] = __('Участвовали в мероприятиях');
            list($users, $userIds) = $getParticipatedEventsAction->run($request->q, $filters, true);
            $data['users'] = $users;
            $data['user_ids'] = $userIds;
            return $data;
        }

        if ($request->input('type') == 'matched_selection_base_step') {
            $data['title'] = __('Соответствует базовому профилю');
            list($users, $userIds) = $getMatchedSelectionBaseStepAction->run($request->q, $filters, true);
            $data['users'] = $users;
            $data['user_ids'] = $userIds;
            return $data;
        }

        if ($request->input('type') == 'invite_depth_test') {
            $data['title'] = __('Приглашены на углубленный тест');
            list($users, $userIds) = $getInviteDepthTestAction->run($request->q, $filters, true);
            $data['users'] = $users;
            $data['user_ids'] = $userIds;
            return $data;
        }

        if ($request->input('type') == 'depth_test') {
            $data['title'] = __('Результаты углубленный тест');
            list($users, $userIds) = $getDepthTestAction->run($request->q, $filters, true);
            $data['users'] = $users;
            $data['user_ids'] = $userIds;
            return $data;
        }

        if ($request->input('type') == 'target_selection_depth_step') {
            $data['title'] = __('Соответствуют целевому профилю');
            list($users, $userIds) = $getTargetSelectionDepthStepAction->run($request->q, $filters, true);
            $data['users'] = $users;
            $data['user_ids'] = $userIds;
            return $data;
        }

        if ($request->input('type') == 'got_consultation') {
            $data['title'] = __('Дети получили консультацию, в том числе с родителями');
            list($users, $userIds) = $getGotConsultationAction->run($request->q, $filters, true);
            $data['users'] = $users;
            $data['user_ids'] = $userIds;
            return $data;
        }

        if ($request->input('type') == 'parent_registration') {
            $data['title'] = __('Зарегистрировано родителей');
            list($users, $userIds) = $getParentRegistrationAction->run($request->q, $filters, true);
            $data['users'] = $users;
            $data['user_ids'] = $userIds;
            return $data;
        }

        if ($request->input('type') == 'recommend') {
            $data['title'] = __('Рекомендованы');
            list($users, $userIds) = $getRecommendAction->run($request->q, $filters, true);
            $data['users'] = $users;
            $data['user_ids'] = $userIds;
            return $data;
        }

        list($users, $userIds) = $getRegistrationStudentsCountAction->run($request->q, $filters, true);

        return [
            'title' => __('Отчет по базе учеников'),
            'users' => $users,
            'user_ids' => $userIds,
        ];

    }

    protected function getStudentsDataBySettings(Request $request): array
    {
        $settings = Auth::user()->employerDashboardSettings;
        $filters = $request->input();

        // данные progressbar`ов
        $getStudentsCountAction = new GetStudentsCountAction();
        $getRegistrationStudentsCountAction = new GetRegistrationStudentsCountAction();
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

        $data = [];

        // Списочная численность школьников
        $studentsCount = $getStudentsCountAction->run($filters);
        if ($settings['students_count']) {
            $data['studentsCount'] = $studentsCount;
        }

        // Зарегистрировано школьников
        if ($settings['registration_students_count']) {
            $data['registrationStudentsCount'] = $getRegistrationStudentsCountAction->run($request->q, $filters, false, $studentsCount['all']);
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
