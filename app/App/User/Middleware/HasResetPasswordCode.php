<?php

namespace App\User\Middleware;

use Closure;
use Domain\User\Models\ResetPasswordUser;
use Illuminate\Http\Request;

class HasResetPasswordCode
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
        $resetPasswordUser = new ResetPasswordUser();
        if ($resetPasswordUser->hasUserId()) {
            return $next($request);
        }

        return redirect()->route('password.request');
    }
}
