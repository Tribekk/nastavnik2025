<?php
/** @noinspection PhpUndefinedClassInspection */

use App\AttachFile\Controllers\AttachFileController;
use App\Consultation\Controllers\ConsultationController;
use App\Dashboard\Controllers\DashboardController;
use App\Employer\Controllers\EmployerDashboardController;
use App\Event\Controllers\EventAudienceController;
use App\Event\Controllers\EventController;
use App\Event\Controllers\EventDirectionController;
use App\Event\Controllers\EventFormatController;
use App\Event\Controllers\UserEventController;
use App\Event\Controllers\UserEventInviteController;
use App\Feedback\Controllers\EmotionsFeedbackController;
use App\Feedback\Controllers\FeedbackController;
use App\IqSms\Controllers\IqSmsController;
use App\Kladr\Controllers\KladrController;
use App\Orgunit\Controllers\ExternalOrgunitActivityKindController;
use App\Orgunit\Controllers\LegalFormController;
use App\Orgunit\Controllers\OrgunitController;
use App\Quiz\Controllers\QuestionnaireController;
use App\Quiz\Controllers\QuizController;
use App\Results\Controllers\ResultController;
use App\Results\Middleware\ShowResultsMiddleware;
use App\Summernote\Controllers\SummernoteController;
use App\User\Controllers\ObserveUserController;
use App\User\Controllers\ProfileController;
use App\User\Controllers\RoleAssignmentController;
use App\User\Controllers\UserTypeController;
use App\User\Controllers\RegisterVerificationController;
use Domain\Consultant\Controllers\BusinessCardController;
use Domain\Consultant\Controllers\MeetingScheduleController;
use Domain\Consultant\Middleware\ConsultantMiddleware;
use Domain\Employer\Controllers\EmployerSendInviteController;
use Domain\Employer\Controllers\EmployerSendInviteEventController;
use Domain\Employer\Controllers\EmployerSendNotifyController;
use Domain\Employer\Controllers\ReportEmployerController;
use Domain\Employer\Controllers\StageTestsAndConsultationsController;
use Domain\Employer\Middleware\EmployerMiddleware;
use Domain\Employer\Controllers\EmployerController;
use Domain\Employer\Middleware\UndefinedOrgunitMiddleware;
use Domain\Event\Middleware\UserEventsMiddleware;
use Domain\Parent\Controllers\ParentController;
use Domain\Parent\Middleware\ParentRole;
use Domain\Profession\Controllers\ActivityKindController;
use Domain\Profession\Controllers\ActivityObjectController;
use Domain\School\Controllers\ClassProfileController;
use Domain\School\Controllers\SchoolController;
use Domain\School\Middleware\HasTeacherRole;
use Domain\School\Middleware\TeacherOrAdmin;
use Illuminate\Support\Facades\Route;
use App\Admin\Controllers\UserController;
use Domain\UserProfile\Controllers\UserProfileController;

use App\Http\Controllers\projectController;
use App\Project\Controllers\ExternalProjectActivityKindController;
use App\Project\Controllers\LegalFormProjectController;


use App\project;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\Products\ProductController;


Route::get('/', function () {
    if (Auth::check()) {
        return redirect(route('dashboard'));
    }

    return redirect(route('login'));
});

//Route::get('/admin/products/product/add', [Products::class, 'add_product']);
//
//Route::get('/admin/products/product/edit/{id}', [Products::class, 'get_product']);
//
//Route::get('/admin/products/product/index', [Products::class, 'index']);



//Route::get('/project',    [projectController::class, 'projectList'])->name('project.list');
//Route::post('/project',    [projectController::class, 'store'])->name('project.list');
//Route::get('project/create',    [projectController::class, 'projList'])->name('project.create');

//Route::get('/admin/products/product/add', [Products::class, 'add_product']);
//
//Route::get('/admin/products/product/edit/{id}', [Products::class, 'get_product']);
//Route::post('/admin/products/product/edit/{id}', [Products::class, 'get_product']);
//
//Route::get('/admin/products/product/index', [Products::class, 'index']);
Route::get('product/edit', [ProductController::class, 'edit'] )->name('Product.edit');
Route::get('product/{id}/edit', [ProductController::class, 'edit_id'] )->name('Product.edit_id');
Route::post('product/{id}/edit', [ProductController::class, 'edit_class_up'] )->name('Product.edit_class_up');
Route::get('product/{id}/create/edit_loc', [ProductController::class, 'edit_loc'] )->name('Product.edit_loc');
Route::post('product/{id}/create/edit_schul', [ProductController::class, 'edit_schul'] )->name('Product.edit_schul');
Route::get('product/{id}/create/edit_schul', [ProductController::class, 'edit_schul2'] )->name('Product.edit_schul2');
Route::post('product/{id}/create/edit_sity', [ProductController::class, 'edit_sity'] )->name('Product.edit_sity');
Route::post('product/{id}/create/edit_class', [ProductController::class, 'edit_class'] )->name('Product.edit_class');
Route::get('product/{id}/create/edit_classs', [ProductController::class, 'edit_class2'] )->name('Product.edit_class2');
Route::get('product/{id}/del', [ProductController::class, 'del'] )->name('product.del');
Route::post('product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('product/create/location', [ProductController::class, 'storeLoc'])->name('product.storeLoc');
Route::post('product/create/location_sity', [ProductController::class, 'storeScul'])->name('product.storeScul');
Route::post('product/create/location_school', [ProductController::class, 'storeSchool'])->name('product.storeSchool');
Route::post('product/create/location_class', [ProductController::class, 'storeClass'])->name('product.storeClass');
Route::post('product', [ProductController::class, 'storeClassE'])->name('product.storeClassE');

Route::resource('/products', ProductController::class);
Route::resource('/user_profiles', UserProfileController::class);
Route::get('/user_profiles/{id}/ankets',[UserProfileController::class, 'ankets'])->name('user_profiles.ankets');
Route::post('/user_profiles/{id}/ankets',[UserProfileController::class, 'ankets_update'])->name('user_profiles.ankets_update');


Route::get('/user_profiles/{id}/base_tests',[UserProfileController::class, 'baseTestItems'])->name('user_profiles.base_test_items');
Route::post('/user_profiles/{id}/base_tests',[UserProfileController::class, 'baseTestUpdate'])->name('user_profiles.base_test_items_update');

Route::get('/user_profiles/{id}/deep_test',[UserProfileController::class, 'deepTestItems'])->name('user_profiles.deep_test_items');
Route::post('/user_profiles/{id}/deep_test',[UserProfileController::class, 'deepTestUpdate'])->name('user_profiles.deep_test_items_update');

Route::get('/user_profiles/{id}/anket_results',[UserProfileController::class, 'anketResults'])->name('user_profiles.anket_results');
Route::post('/user_profiles/{id}/anket_results',[UserProfileController::class, 'anketResultsUpdate'])->name('user_profiles.anket_results_update');

Route::get('/user_profiles/{id}/deep_test_results',[UserProfileController::class, 'deepTestResults'])->name('user_profiles.deep_test_results');
Route::post('/user_profiles/{id}/deep_test_results',[UserProfileController::class, 'deepTestResultsUpdate'])->name('user_profiles.deep_test_results_update');

Route::get('/user_profiles/{id}/consult_results',[UserProfileController::class, 'consultResults'])->name('user_profiles.consult_results');
Route::post('/user_profiles/{id}/consult_results',[UserProfileController::class, 'consultResultsUpdate'])->name('user_profiles.consult_results_update');

Route::get('/user_profiles_by_exists',[UserProfileController::class, 'createByExists'])->name('user_profiles.create_by_exists');
Route::post('/user_profiles_store_by_exists',[UserProfileController::class, 'storeByExists'])->name('user_profiles.store_by_exists');

Route::get('/user_profiles/{id}/excel',[UserProfileController::class, 'excelCreating'])->name('user_profiles.excel');

Route::get('/test_user_profile',[UserProfileController::class, 'testUserProfile'])->name('user_profiles.test_user_profile');


Route::get('/политика_конфиденциальности.pdf', function () {
    return readDocument(storage_path('app/documents/политика_конфиденциальности.pdf'), 'application/pdf');
});

////////////тестовое!! Удалить!

//Route::get('/reset_all_passwords',[App\User\Controllers\ResetAllUsersToPasswordTest::class, "reset"])->name("reset_all_passwords");


/////страница для вставки на сайт работодателя
Route::get('/partners/{orgunit}/',[OrgunitController::class, 'partnersPage'])->name('partners.page');


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard');
    Route::get('/dashboard-admin', [DashboardController::class, "employersAdmin"])->name('employersAdmin');
    Route::get('/dashboard/settings', [DashboardController::class, "settings"])->name('dashboard.settings');
    Route::post('/dashboard/settings/employer', [EmployerDashboardController::class, "storeSettings"])->name('dashboard.settings.store');

    Route::get('/user/edit', [ProfileController::class, 'edit'])->name('user.edit');
    Route::get('/user/login-admin', [UserController::class, 'loginAsAdmin'])->name('login_as_admin');

    Route::prefix('attach')->name('attach.')->middleware('no_user_type')->namespace('App\User\Controllers')->group(function () {
        Route::get('teacher', [RoleAssignmentController::class, 'showAssignTeacherRoleForm'])->name('teacher');
        Route::post('teacher', [RoleAssignmentController::class, 'assignTeacherRole']);

        Route::get('student', [RoleAssignmentController::class, 'showAssignStudentRoleForm'])->name('student');
        Route::post('student', [RoleAssignmentController::class, 'assignStudentRole']);

        Route::get('parent', [RoleAssignmentController::class, 'showAssignParentRoleForm'])->name('parent');
        Route::post('parent', [RoleAssignmentController::class, 'assignParentRole']);

        Route::get('consultant', [RoleAssignmentController::class, 'showAssignConsultantRoleForm'])->name('consultant');
        Route::post('consultant', [RoleAssignmentController::class, 'assignConsultantRole']);

        Route::get('employer', [RoleAssignmentController::class, 'showAssignEmployerRoleForm'])->name('employer');
        Route::post('employer', [RoleAssignmentController::class, 'assignEmployerRole']);
    });

    Route::prefix('quiz')->name('quiz.')->namespace('App\User\Controllers')->group(function () {
        Route::get('', [QuizController::class, 'index'])->name('view');
        Route::get('results', [QuizController::class, 'results'])->name('results');
        Route::get('results/pdf', [QuizController::class, 'createPdf'])->name('results.pdf');

        Route::prefix('questionnaire')->name('results.')->middleware(ShowResultsMiddleware::class)->group(function () {
            Route::get('/student/{user?}', [QuestionnaireController::class, "student"])->name('student_questionnaire');
            Route::get('/parent/{user?}', [QuestionnaireController::class, "parent"])->name('parent_questionnaire');
        });

        Route::get('/results/{user}', [QuizController::class, "userResults"])->middleware(ShowResultsMiddleware::class)->name('user_results');
        Route::get('results/{user}/pdf', [QuizController::class, 'createUserPdf'])->middleware(ShowResultsMiddleware::class)->name('user_results.pdf');

        Route::get('{availableQuiz}/description', [QuizController::class, 'description'])->name('description');
        Route::post('{availableQuiz}/start', [QuizController::class, 'startQuiz'])->name('start');
        Route::get('{availableQuiz}/restart', [QuizController::class, 'restartQuiz'])->name('restart');
        Route::post('{availableQuiz}/supplement', [QuizController::class, 'supplementQuiz'])->name('supplement');
        Route::get('{availableQuiz}', [QuizController::class, 'show'])->name('show');
        Route::get('{availableQuiz}/result', [QuizController::class, 'result'])->name('result');
        Route::get('{availableQuiz}/result/trait-details/{trait}', [QuizController::class, 'traitDetails'])->name('trait-details');
        Route::get('{availableQuiz}/result/type-details/{type}', [QuizController::class, 'typeDetails'])->name('type-details');
        Route::get('{availableQuiz}/result/inclination-details/{inclination}', [QuizController::class, 'inclinationsDetails'])->name('inclination-details');
        Route::get('{availableQuiz}/result/type-of-thinking-details/{type}', [QuizController::class, 'typeOfThinkingDetails'])->name('type-of-thinking-details');
        Route::get('{availableQuiz}/result/person-types', [QuizController::class, "personTypes"])->name('person-types');
        Route::get('{availableQuiz}/result/person-type-details/{type}', [QuizController::class, "personTypeDetails"])->name('person-type-detail');
    });

    Route::prefix('kladr')->name('kladr.')->group(function () {

        Route::get('/cities/used', [KladrController::class, 'usedCities'])->name('used_cities');
        Route::get('/cities', [KladrController::class, 'cities'])->name('cities');
        Route::get('/cities/{code}', [KladrController::class, 'city'])->name('city');

        Route::get('/regions', [KladrController::class, 'regions'])->name('regions');
        Route::get('/regions/{code}', [KladrController::class, 'region'])->name('region');

        Route::get('/streets', [KladrController::class, 'streets'])->name('streets');
        Route::get('/streets/{code}', [KladrController::class, 'street'])->name('street');

        Route::get('/schools/{code}', [KladrController::class, 'schools'])->name('schools');
        Route::get('/classes/{code}', [KladrController::class, 'classes'])->name('classes');
    });

    Route::prefix('school')->name('school.')->namespace('Domain\School\Controllers')->group(function () {

        Route::get('classes', [SchoolController::class, 'classes'])
            ->middleware(HasTeacherRole::class)
            ->name('classes.list');

        Route::get('classes_add_with_parent/{class}/', [SchoolController::class, 'classes_add_student_with_parent'])
            ->middleware(HasTeacherRole::class)
            ->name('classes.add_student_with_parent');

        Route::post('classes_add_with_parent', [SchoolController::class, 'classes_add_student_with_parent_store'])
            ->middleware(HasTeacherRole::class)
            ->name('classes.add_student_with_parent_store');

        Route::get('classes/{class}', [SchoolController::class, 'class'])->name('classes.show');
        Route::get('classes/{class}/table', [SchoolController::class, 'classTableView'])->name('classes.show.table');

        Route::get('{school}', [SchoolController::class, 'jsonSchool'])->name('json');
        Route::get('{school}/classes', [SchoolController::class, 'jsonClassesBySchool'])->name('classes.view.json');
        Route::get('class/{class}/json', [SchoolController::class, 'jsonSchoolClass'])->name('classes.show.json');
        Route::get('{school}/classes/{class}', [SchoolController::class, 'jsonSchoolClass']);
    });

    Route::prefix('class_profiles')->name('class_profiles.')->namespace('Domain\School\Controllers')->middleware(TeacherOrAdmin::class)->group(function () {
        Route::get('', [ClassProfileController::class, 'index'])->name('view');
        Route::get('{profile}', [ClassProfileController::class, 'show'])->name('show');
    });

    Route::prefix('observe')->name('observe.')->namespace('App\User\Controllers')->group(function () {
        Route::get('add-child', [ObserveUserController::class, 'showObserveAddChildForm'])->name('user');
        Route::post('add-child', [ObserveUserController::class, 'observeAddChild'])->name('user');
    });

    Route::prefix('orgunits')->name('orgunits.')->namespace('App\Orgunit\Controllers')->group(function () {
        Route::prefix('legal_forms')->name('legal_forms.')->group(function () {
            Route::get('/', [LegalFormController::class, 'index'])->name('view');
            Route::get('/{legalForm}', [LegalFormController::class, 'show'])->name('show');

        });


        Route::prefix('activity_kinds')->name('activity_kinds.')->group(function () {
            Route::get('/', [ExternalOrgunitActivityKindController::class, 'index'])->name('view');
            Route::get('/{activityKind}', [ExternalOrgunitActivityKindController::class, 'show'])->name('show');
        });



        Route::middleware([EmployerMiddleware::class, UndefinedOrgunitMiddleware::class])->group(function () {
            Route::get('/{orgunit}/edit/description', [OrgunitController::class, 'editDescription'])->name('description.edit');
            Route::patch('/{orgunit}/edit/description', [OrgunitController::class, 'updateDescription'])->name('description.update');

            Route::post('/', [OrgunitController::class, 'store'])->name('store');
            Route::patch('/{orgunit}', [OrgunitController::class, 'update'])->name('update');
            Route::delete('/{orgunit}', [OrgunitController::class, 'destroy'])->name('destroy');
            Route::get('/{orgunit}/create', [OrgunitController::class, 'childCreate'])->name('child.create');
            Route::get('/{orgunit}/edit', [OrgunitController::class, 'edit'])->name('edit');
            Route::delete('/{orgunit}/logo', [OrgunitController::class, 'logoDestroy'])->name('logo.destroy');


        });

        Route::get('/', [OrgunitController::class, 'index'])->name('view');
        Route::get('/{orgunit}', [OrgunitController::class, 'show'])->name('show');
        Route::get('/{orgunit}/children', [OrgunitController::class, 'children'])->name('children');
        Route::get('/{orgunit}/description', [OrgunitController::class, 'description'])->name('description');


        Route::get('/{orgunit}/personal_quiz/', [OrgunitController::class, 'personal_quiz'])->name('personal_quiz');
        Route::get('/{orgunit}/personal_quiz_send/', [OrgunitController::class, 'personal_quiz_send'])->name('personal_quiz_send');


    });

     Route::post('/orgunit/save_personal_notes', [OrgunitController::class, 'save_personal_notes'])->name('personal_notes_send2');






    Route::prefix('employer')->name('employer.')->namespace('Domain\Employer\Controllers')->group(function () {



Route::get('project/list',
    [projectController::class, 'projectList']
)->name('project.list');

Route::get('project/create',
    [projectController::class, 'projList']
)->name('project.create');








        Route::get('students/list', [EmployerController::class, 'studentsList'])->name('students.list');
        Route::post('students/list_excel', [EmployerController::class, 'studentsListToExcel'])->name('students.list.excel');

        Route::post('students/{student}/invite/depth_test', [EmployerController::class, "inviteDepthTests"])->name('students.invite.depth_test');
        Route::post('students/invite/depth_test', [EmployerController::class, "inviteStudentsDepthTests"])->name('students.invite.depth_test.all');

        Route::middleware(EmployerMiddleware::class)->group(function() {
            Route::prefix('reports')->name('reports.')->group(function () {
                Route::get('/students/generate_pdf', [ReportEmployerController::class, "studentsGeneratePdf"])->name('students.generate_pdf');
                Route::get('/students/generate_excel', [ReportEmployerController::class, "studentsGenerateExcel"])->name('students.generate_excel');
                Route::get('/students', [ReportEmployerController::class, "students"])->name('students');
            });

            Route::prefix('stages_tests_and_consultations')->name('stages_tests_and_consultations.')->group(function () {
                Route::get('/schools', [StageTestsAndConsultationsController::class, "schools"])->name('schools');
                Route::get('/schools/{school}', [StageTestsAndConsultationsController::class, "school"])->name('school');

                Route::get('/classes', [StageTestsAndConsultationsController::class, "classes"])->name('classes');
                Route::get('/classes/{class}', [StageTestsAndConsultationsController::class, "class"])->name('class');
            });

            Route::post('/send_invite/{user}', [EmployerSendInviteController::class, 'send']);
            Route::post('/send_invite_event/{user}', [EmployerSendInviteEventController::class, 'send']);
            Route::post('/send_notify/{user}', [EmployerSendNotifyController::class, 'send']);
            Route::post('/send_invite', [EmployerSendInviteController::class, 'sendToUsers']);
            Route::post('/send_invite_event', [EmployerSendInviteEventController::class, 'sendToUsers']);
            Route::post('/send_notify', [EmployerSendNotifyController::class, 'sendToUsers']);
        });

        Route::prefix('events')->name('events.')->group(function () {
            Route::prefix('formats')->name('formats.')->group(function () {
                Route::get('/', [EventFormatController::class, 'index'])->name('view');
                Route::get('/{format}', [EventFormatController::class, 'show'])->name('show');
            });

            Route::prefix('directions')->name('directions.')->group(function () {
                Route::middleware(EmployerMiddleware::class)->group(function () {
                    Route::get('/create', [EventDirectionController::class, "create"])->name('create');
                    Route::post('/create', [EventDirectionController::class, "store"])->name('store');
                    Route::delete('/{direction}', [EventDirectionController::class, 'destroy'])->name('destroy');
                    Route::patch('/{direction}', [EventDirectionController::class, 'update'])->name('update');
                    Route::get('/{direction}/edit', [EventDirectionController::class, 'edit'])->name('edit');
                });

                Route::get('/', [EventDirectionController::class, 'index'])->name('view');
                Route::get('/{direction}', [EventDirectionController::class, 'show'])->name('show');
            });

            Route::prefix('audience')->name('audience.')->group(function () {
                Route::middleware(EmployerMiddleware::class)->group(function () {
                    Route::get('/create', [EventAudienceController::class, "create"])->name('create');
                    Route::post('/create', [EventAudienceController::class, "store"])->name('store');
                    Route::delete('/{audience}', [EventAudienceController::class, 'destroy'])->name('destroy');
                    Route::patch('/{audience}', [EventAudienceController::class, 'update'])->name('update');
                    Route::get('/{audience}/edit', [EventAudienceController::class, 'edit'])->name('edit');
                });
                Route::get('/', [EventAudienceController::class, 'index'])->name('view');
                Route::get('/{audience}', [EventAudienceController::class, 'show'])->name('show');
            });

            Route::middleware([EmployerMiddleware::class, UndefinedOrgunitMiddleware::class])->group(function () {
                Route::get('/', [EventController::class, 'index'])->name('view');
                Route::get('/create', [EventController::class, "create"])->name('create');
                Route::get('/{event}/edit', [EventController::class, 'edit'])->name('edit');
                Route::get('/{event}/participants', [EventController::class, 'participants'])->name('participants');
                Route::put('/participants/{participant}/state', [EventController::class, 'participantsUpdateState'])->name('participants.state');
                Route::post('/create', [EventController::class, "store"])->name('store');
                Route::delete('/{event}', [EventController::class, 'destroy'])->name('destroy');
                Route::patch('/{event}', [EventController::class, 'update'])->name('update');
            });
        });
    });

    Route::prefix('parent')->name('parent.')->middleware(ParentRole::class)->namespace('Domain\Parent\Controllers')->group(function () {
        Route::get('children', [ParentController::class, "children"])->name('children');
        Route::get('children/{child}/results', [ParentController::class, "childResults"])->name('children.results');
        Route::get('children/{child}/results/pdf', [ParentController::class, 'createPdf'])->name('children.results.pdf');
    });

    Route::prefix('feedback')->name('feedback.')->namespace('App\Feedback\Controllers')->group(function () {
        Route::get('/', [FeedbackController::class, "form"])->name('form');
        Route::post('/', [FeedbackController::class, "store"])->name('store');
        Route::get('/quiz/{availableQuiz}', [EmotionsFeedbackController::class, "quizForm"])->name('quiz.form');
        Route::post('/quiz/{availableQuiz}', [EmotionsFeedbackController::class, "quizStore"])->name('quiz.store');
    });

    Route::prefix('profession')->name('profession.')->namespace('Domain\Profession\Controllers')->group(function () {
        Route::get('/activity_kinds', [ActivityKindController::class, 'index'])->name('activity_kinds.list');
        Route::get('/activity_kinds/{activityKind}', [ActivityKindController::class, 'show'])->name('activity_kinds.show');

        Route::get('/activity_objects', [ActivityObjectController::class, 'index'])->name('activity_objects.list');
        Route::get('/activity_objects/{activityObject}', [ActivityObjectController::class, 'show'])->name('activity_objects.show');
    });

    Route::prefix('consultant')->name('consultant.')->namespace('Domain\Consultant\Controllers')->middleware(ConsultantMiddleware::class)->group(function () {
        Route::get('/business_card', [BusinessCardController::class, 'card'])->name('business_card');
        Route::get('/business_card/edit', [BusinessCardController::class, 'edit'])->name('business_card.edit');
        Route::post('/business_card/edit', [BusinessCardController::class, 'update'])->name('business_card.update');

        Route::get('/meeting_schedule', [MeetingScheduleController::class, 'index'])->name('meeting_schedule');
        Route::get('/meeting_schedule/create', [MeetingScheduleController::class, 'create'])->name('meeting_schedule.create');
        Route::post('/meeting_schedule/create', [MeetingScheduleController::class, 'store'])->name('meeting_schedule.store');
        Route::get('/meeting_schedule/{appointment}', [MeetingScheduleController::class, 'updateForm'])->name('meeting_schedule.update_view');
        Route::post('/meeting_schedule/{appointment}', [MeetingScheduleController::class, 'update'])->name('meeting_schedule.update');
        Route::delete('/meeting_schedule/{appointment}', [MeetingScheduleController::class, 'destroy'])->name('meeting_schedule.destroy');
    });

    Route::prefix('consultations')->name('consultations.')->namespace('App\Consultation\Controllers')->group(function () {
        Route::get('/record', [ConsultationController::class, 'recordForm'])->name('record.form');
        Route::get('/', [ConsultationController::class, 'index'])->name('list');
        Route::delete('/{consultation}', [ConsultationController::class, 'destroy'])->name('destroy');
        Route::post('/{consultation}/confirm', [ConsultationController::class, 'confirm'])->name('confirm');
        Route::get('/{consultation}', [ConsultationController::class, 'show'])->name('show');
        Route::get('/{consultation}/edit', [ConsultationController::class, 'edit'])->name('edit');
        Route::post('/{consultation}', [ConsultationController::class, 'update'])->name('update');
        Route::post('/{consultation}/feedback', [ConsultationController::class, "storeFeedback"])->name('feedback');
    });

    Route::prefix('results')->name('results.')->middleware(ShowResultsMiddleware::class)->group(function () {
        Route::get('/student_questionnaire/', [ResultController::class, "studentQuestionnaire"])->name('student_questionnaire');
        Route::get('/parent_questionnaire/', [ResultController::class, "parentQuestionnaire"])->name('parent_questionnaire');
    });

    Route::prefix('iq_sms')->name('iq_sms.')->group(function () {
        Route::post('/send', [IqSmsController::class, "send"])->name('send');
    });

    Route::prefix('summernote')->name('summernote.')->group(function () {
        Route::post('upload', [SummernoteController::class, "upload"])->name('upload');
    });

    Route::prefix('events')->name('events.')->middleware(UserEventsMiddleware::class)->namespace('App\Event\Controller')->group(function () {
        Route::prefix('invites')->name('invites.')->group(function () {
            Route::get('/', [UserEventInviteController::class, 'index'])->name('view');
            Route::get('/{eventInvite}', [UserEventInviteController::class, 'show'])->name('show');
            Route::delete('/{eventInvite}', [UserEventInviteController::class, 'destroy'])->name('destroy');
            Route::put('/{eventInvite}/accept', [UserEventInviteController::class, 'accept'])->name('accept');
            Route::put('/{eventInvite}/cancel', [UserEventInviteController::class, 'cancel'])->name('cancel');
        });

        Route::get('/', [UserEventController::class, 'index'])->name('view');
        Route::get('/{event}', [UserEventController::class, 'show'])->name('show');

    });

    Route::get('/attached_files/download', [AttachFileController::class, 'download'])->name('attached_files.download');
});

