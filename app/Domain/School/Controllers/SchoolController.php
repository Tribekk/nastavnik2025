<?php

namespace Domain\School\Controllers;

use App\Admin\Actions\GetSchoolClassesAction;
use Domain\Admin\Models\School;
use Domain\Admin\Models\SchoolClass;
use Domain\School\Middleware\TeacherOrAdmin;
use Domain\School\Wrappers\SchoolStudentQuizWrapper;
use Domain\School\Requests\addStudentWithParentRequest;
use Domain\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Support\Controller;
use Domain\User\Actions\AssignRole;
use Domain\User\Actions\CreateUser;
use Domain\User\Catalogs\BaseUserRole\ParentRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\StudentRoleCatalogItem;
use Domain\User\Notifications\ChildAssignedNotification;
use Domain\User\Notifications\ParentAssignedNotification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class SchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware(TeacherOrAdmin::class)
            ->except([
                'jsonSchool',
                'jsonSchoolClass',
                'jsonClassesBySchool',
            ]);
    }

    public function schoolCard()
    {
        $school = Auth::user()->school;
        $query = SchoolClass::query();

        if(Auth::user()->hasRole('teacher') && !Auth::user()->isAdmin) {
            $query->whereHas('curators', function($q) {
                $q->where('curator_id', Auth::id());
            });
        }

        $classes = $query->where('school_id', Auth::user()->school_id)
            ->orderByRaw('number asc, letter asc, year asc')->get();


        return view('school.card')
            ->withSchool($school)
            ->withClasses($classes);
    }

    public function classes()
    {
        $query = SchoolClass::query();

        if(Auth::user()->hasRole('teacher')) {
            $query->whereHas('curators', function($q) {
                $q->where('curator_id', Auth::id());
            });
        }

        $classes = $query->where('school_id', Auth::user()->school_id)
            ->orderByRaw('number asc, letter asc, year asc')->paginate(5);
        $wrapper = new SchoolStudentQuizWrapper();


        return view('school.classes.list')
            ->withClasses($classes)
            ->withWrapper($wrapper);
    }

    public function class(SchoolClass $class)
    {
        $data = $this->takeClassData($class);

        return view('school.classes.show')
            ->withClass($class)
            ->withStudents($data['students'])
            ->withWrapper($data['wrapper']);
    }

    protected function takeClassData($class) {
        if(!Auth::user()->isAdmin && $class->school_id !== Auth::user()->school_id) abort(403);
        if(!Auth::user()->isAdmin && Auth::user()->hasRole('teacher') && !$class->curators()->where('curator_id', Auth::id())->get()->count()) {
            abort(403);
        }

        $wrapper = new SchoolStudentQuizWrapper();

        $students = $class->students()->orderByRaw('first_name asc, last_name asc, middle_name asc')->get();

        return ['wrapper' => $wrapper, 'students' => $students];
    }

    public function classTableView(SchoolClass $class)
    {
        $data = $this->takeClassData($class);

        return view('school.classes.show_table')
            ->withClass($class)
            ->withStudents($data['students'])
            ->withWrapper($data['wrapper']);
    }

    public function classes_add_student_with_parent(SchoolClass $class) {

        $data = $this->takeClassData($class);

        return view('school.classes.add_student_with_parent')
            ->withClass($class)
            ->withStudents($data['students'])
            ->withWrapper($data['wrapper']);
    }

    public function send_to_telegram($message,$chatId="-1001380411800") {


        $botToken="5309137610:AAGGvy5xWJUpsNDu0Fi0_QWfN-EAx6hy6Ng";


        $website="https://api.telegram.org/bot".$botToken;
        //** ===>>>NOTE: this chatId MUST be the chat_id of a person, NOT another bot chatId !!!**
        $params=[
            'chat_id'=>$chatId,
            'text'=>$message,
        ];
        $ch = curl_init($website . '/sendMessage');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        /// var_dump($result);
        curl_close($ch);
        return  $result;

    }

    public function  classes_add_student_with_parent_store(addStudentWithParentRequest $request) {



            $studentData=array(
                'last_name'=>$request->get('last_name'),
                'first_name'=>$request->get('first_name'),
                'middle_name'=>$request->get('middle_name'),
                'birth_date'=>$request->get('birth_date'),
                'class_id'=>$request->get('class_id'),
                'sex'=>$request->get('sex'),
                'phone'=>$request->get('phone'),
                'password'=>\Hash::make("12345"),
            );


        $parentData=array(
            'last_name'=>$request->get('last_name_parent'),
            'first_name'=>$request->get('first_name_parent'),
            'middle_name'=>$request->get('middle_name_parent'),
            'birth_date'=>$request->get('birth_date_parent'),
            'sex'=>$request->get('sex'),
            'phone'=>$request->get('phone_parent'),
            'password'=>\Hash::make("12345"),
        );




        $isStudentExist = User::all()->where('phone',$request->get('phone'));
        $isParentExist = User::all()->where('phone',$request->get('phone_parent'));

        if($isStudentExist->isEmpty()) {

            ////добавляем ученика
            $createUserActionStudent = new CreateUser();
            $userStudent = $createUserActionStudent->run($studentData);

            $assignRoleActionStudent = new AssignRole();
            $assignRoleActionStudent->run($userStudent, new StudentRoleCatalogItem, $request);
            $userStudent['phone_verified_at'] = now();
            $userStudent->update();

            $userStudent->update([
                'password' => \Hash::make("12345"),
                'reset_password_code' => null,
                'remember_token' => Str::random(60),
            ]);

        } else {
            return back()->withErrors(['msg'=>'Такой ученик уже существует в системе!'])->withInput();
        }



        if($isParentExist->isEmpty()) {
            ////добавляем родителя
            $createUserActionParent = new CreateUser();
            $userParent = $createUserActionParent->run($parentData);

            $assignRoleActionParent = new AssignRole();
            $assignRoleActionParent->run($userParent, new ParentRoleCatalogItem, $request);

            $userParent['phone_verified_at'] = now();
            $userParent->update();

            $userParent->update([
                'password' => \Hash::make("12345"),
                'reset_password_code' => null,
                'remember_token' => \Str::random(60),
            ]);
        } else {
            $userParent=$isParentExist->first();
        }

        //event(new Registered($userParent));
        //event(new Registered($userStudent));


        ///привязываем ребенка к родителю
        try {
            $userParent->observedUsers()->create(['observed_user_id' => $userStudent->id]);
        } catch (Exception $exception) {
           /// if($exception->getCode() == 23000) throw new Exception(__('Данный пользователь уже прикреплен к Вам.'));

            throw new Exception($exception);
        }

        try {
            $userStudent->notify(new ChildAssignedNotification($userParent));
            $userParent->notify(new ParentAssignedNotification($userStudent));
        } catch (\Exception $exception) {
            Log::error("Уведомление не отправлено. Текст ошибки: ". $exception->getMessage());
        }

       // return redirect()->to(route('admin.users.view'))
         //   ->with('status', 'Пользователь добавлен');

        $class=SchoolClass::find($request->get('class_id'));
        $data = $this->takeClassData($class);

        ////рассылка уведомлений


        $message1="[sms на номер ".$request->get('phone')."] \r\n\r\nВы зарегистрированы в системе как ученик, ваш логин ".$request->get('phone').", ваш пароль - 12345";
        $message2="[sms на номер ".$request->get('phone_parent')."] \r\n\r\nВы зарегистрированы в системе как родитель, ваш логин ".$request->get('phone_parent').", ваш пароль - 12345";

        $this->send_to_telegram($message1, -748612099);
        $this->send_to_telegram($message2, -748612099);

        return view('school.classes.show_table')
            ->withClass($class)
            ->withStudents($data['students'])
            ->withWrapper($data['wrapper']);
    }

    public function jsonClassesBySchool(Request $request, School $school, GetSchoolClassesAction $action)
    {
        if($request->wantsJson()) {
            return $action->run($school->id, $request->q, true);
        }

        abort(403);
    }

    public function jsonSchoolClass(?School $school, SchoolClass $class)
    {
        return $class;
    }

    public function jsonSchool(School $school)
    {
        return School::where('id', $school->id)
            ->select(['id', 'short_title as title', 'address', 'number', 'director', 'uuid', 'phone', 'email'])
            ->first();
    }
}
