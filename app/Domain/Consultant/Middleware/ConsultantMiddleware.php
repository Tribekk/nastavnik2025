<?php

namespace Domain\Consultant\Middleware;

use Closure;
use Domain\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConsultantMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        /** @var User $user */
        $user = $request->user();

        if ($user && $user->hasRole('consultant')) {
            return $next($request);
        }

        return abort(Response::HTTP_FORBIDDEN);
    }
}
