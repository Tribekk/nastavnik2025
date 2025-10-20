<?php

namespace App\User\Controllers;

use App\User\Requests\PasswordSendResetCodeRequest;
use Domain\User\Mail\ForgetPasswordMail;
use Domain\User\Models\ResetPasswordUser;
use Domain\User\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Support\Controller;
use Support\IqSMS\ErrorCode as IqSmsErrorCode;
use Support\IqSMS\IqSMS;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Display the form to request a password reset link.
     *
     * @return View
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    /**
     * Send a reset code to the given user.
     *
     * @param PasswordSendResetCodeRequest $request
     * @param IqSMS $iqSMS
     * @param ResetPasswordUser $resetUser
     * @return RedirectResponse|JsonResponse
     */
    public function sendResetCode(PasswordSendResetCodeRequest $request, ResetPasswordUser $resetUser)
    {
        $code = $resetUser->getCode();

        if(env('APP_ENV') === 'production') {
            try {
                Mail::to($request->email)->send(new ForgetPasswordMail($code));
            } catch (\Exception $exception) {
                return redirect(route('password.request'))
                    ->withErrors(['email' => 'Отправка письма невозможна, попробуйте позже.'])
                    ->withInput();
            }
        }

        $user = User::where('email', $request->email)->first();
        $user->update(['reset_password_code' => $code]);
        $resetUser->setUserId($user->id);

        if(env('APP_ENV') !== 'production') {
            return redirect(route('password.reset'))
                ->with('email_code', $code);
        }

        return redirect(route('password.reset'));
    }
}
