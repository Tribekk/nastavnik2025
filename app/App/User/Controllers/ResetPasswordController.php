<?php

namespace App\User\Controllers;

use App\Providers\RouteServiceProvider;
use App\User\Requests\ResetPasswordRequest;
use Domain\User\Models\ResetPasswordUser;
use Domain\User\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Support\Controller;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm(Request $request)
    {
        return view('auth.passwords.reset');
    }

    /**
     * Reset the given user's password.
     *
     * @param ResetPasswordRequest $request
     * @param ResetPasswordUser $resetPasswordUser
     * @return Application|RedirectResponse|Redirector
     */
    public function reset(ResetPasswordRequest $request, ResetPasswordUser $resetPasswordUser)
    {
        $user = User::findOrFail($resetPasswordUser->getUserId());

        $user->update([
            'password' => \Hash::make($request->password),
            'reset_password_code' => null,
            'remember_token' => Str::random(60),
        ]);

        $resetPasswordUser->flush();

        event(new PasswordReset($user));

        $this->guard()->login($user);

        return redirect(route('dashboard'));
    }
}
