<?php

namespace Domain\Event\Middleware;

use Closure;
use Domain\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserEventsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        /** @var User $user */
        $user = $request->user();

        if ($user && !$user->isEmployer) {
            return $next($request);
        }

        return abort(Response::HTTP_FORBIDDEN);
    }
}
