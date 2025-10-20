<?php

namespace App\User\Middleware;

use Closure;
use Domain\User\Models\RegisterUser;
use Illuminate\Http\Request;

class HasRegisterUser
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $registerUser = new RegisterUser();

        if ($registerUser->hasUser()) {
            return $next($request);
        }

        return redirect()->route('register');
    }
}
