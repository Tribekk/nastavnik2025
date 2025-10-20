<?php

namespace App\User\Middleware;

use Closure;
use Domain\User\Models\ResetPasswordUser;
use Illuminate\Http\Request;

class NoUserType
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
        if (!$request->user()->haveType) {
            return $next($request);
        }

        return abort(403);
    }
}
