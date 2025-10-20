<?php

namespace App\User\Controllers;

use App\Providers\RouteServiceProvider;
use Domain\User\Actions\CreateUser;
use Domain\User\Models\RegisterUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Support\Controller;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm(RegisterUser $registerUser)
    {
        $registerUser->flush();
        return view('auth.register.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param Request $request
     * @param array $data
     * @return RedirectResponse|JsonResponse
     */
    public function register(Request $request, array $data)
    {
        event(new Registered($user = $this->create($data)));

        $this->guard()->login($user, $request->filled('remember'));

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    protected function create(array $data)
    {
        $createUserAction = new CreateUser();
        return $createUserAction->run($data, false);
    }
}
