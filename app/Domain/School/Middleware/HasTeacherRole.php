<?php

namespace Domain\School\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasTeacherRole
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
        if (Auth::check() && (Auth::user()->hasAnyRole(['teacher', 'curator']))) {
            return $next($request);
        }

        return abort(403);
    }
}
