<?php

namespace App\User\Controllers;

use App\User\Requests\RegisterGoToVerifyRequest;
use App\User\Requests\RegisterVerifyRequest;
use Domain\User\Mail\RegisterVerifyMail;
use Domain\User\Models\RegisterUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Support\Controller;
use Support\IqSMS\IqSMS;
use Illuminate\Support\Facades\Mail;
use Support\IqSMS\ErrorCode as IqSmsErrorCode;

class RegisterVerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showVerifyForm()
    {
        return view('auth.register.verify');
    }

    /**
     * Переход с формы регистрации на форму подтверждение
     * Сохранение текущих полей и отправка смс с кодом подтверждения регистрации
     *
     * @param RegisterGoToVerifyRequest $request
     * @param IqSMS $iqSMS
     * @param RegisterUser $registerUser
     * @return RedirectResponse
     */
    public function goToVerify(RegisterGoToVerifyRequest $request, IqSMS $iqSMS, RegisterUser $registerUser)
    {
        $registerUser->storeUser($request->all());
        $code = $registerUser->getCode();

        try {
            Mail::to($request->email)->send(new RegisterVerifyMail($code));
        } catch (\Exception $exception) {
            return redirect(route('register'))
                ->withErrors(['email' => 'Отправка письма невозможна, попробуйте позже.'])
                ->withInput();
        }

        return redirect(route('register.verify'))
            ->with('email_code', $code);
    }

    /**
     * Проверка кода подтверждения регистрация и создание пользователя
     *
     * @param RegisterVerifyRequest $request
     * @param RegisterUser $registerUser
     * @return JsonResponse|RedirectResponse
     */
    public function verify(RegisterVerifyRequest $request, RegisterUser $registerUser)
    {
        $registerController = new RegisterController();
        $userData = $registerUser->getUser();
        $userData['email_verified_at'] = now();
        $response = $registerController->register($request, $userData);
        $registerUser->flush();
        return $response;
    }
}
