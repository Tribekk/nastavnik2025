<?php

namespace Domain\Employer\Controllers;

use Domain\Employer\Notifications\SendInviteNotification;
use Domain\Employer\Requests\SendInviteRequest;
use Domain\User\Actions\AddDepthTestsAction;
use Domain\User\Models\User;
use Domain\User\Notifications\PersonalQuizNotification;
use Domain\User\Notifications\RoleAssignedNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Support\Controller;

class EmployerSendInviteController extends Controller
{
    public function send(SendInviteRequest $request, User $user)
    {
        $this->sendInviteUser($request, $user);
        return response()->json(['message' => 'Приглашение отправлено'], 201);
    }

    public function sendToUsers(SendInviteRequest $request)
    {
        set_time_limit(0);
        User::whereIn('id', $request->input('users', []))->chunk(50, function ($users) use ($request) {
            foreach ($users as $user) {
                $this->sendInviteUser($request, $user);
                sleep(1);
            }
        });

        return response()->json(['message' => 'Приглашения отправлены'], 201);
    }

    public function sendInviteUser(SendInviteRequest $request, User $user)
    {
        try {
            switch ($request->input('type')) {
                case 'depth_tests':
                    if($user->finishedBaseTests && $user->studentQuestionnaireResult && !$user->finishedDepthTests) {
                        $action = new AddDepthTestsAction();
                        $action->run($user);
                        $user->notify(new SendInviteNotification('Приглашение пройти углубленное тестирование', $request->message, route('quiz.view')));
                    }
                    break;
                case 'base_tests':
                    if(!$user->finishedBaseTests) {
                        $user->notify(new SendInviteNotification('Приглашение пройти базовое тестирование', $request->message, route('quiz.view')));
                    }
                    break;
                case 'personal_quiz_tests':
                   // if(!$user->finishedBaseTests) {
                    if(Auth::user()->orgunit) {
                        $user->personal_quiz_description= $request->message;
                        $user->personal_quiz_available=Auth::user()->orgunit->id;
                        $user->update();
                    }
                      ///  dd($user);
                        $user->notify(new PersonalQuizNotification(Auth::id()));
                     ///   $user->notify(new SendInviteNotification('Приглашение пройти квиз от работодателя', $request->message, route('orgunits.personal_quiz.personal_quiz', Auth::id())));
                   //
                    break;
            }
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }
    }

}
