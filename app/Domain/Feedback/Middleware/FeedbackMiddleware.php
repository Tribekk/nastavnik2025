<?php

namespace Domain\Feedback\Middleware;

use Closure;
use Domain\Orgunit\Models\ExternalOrgunit;
use Domain\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeedbackMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        /** @var User $user */
        $user = $request->user();

        /** @var ExternalOrgunit $userOrgunit */
        if ($user && !($user->isEmployer || $user->isConsultant)) {
           return $next($request);
        }

        return abort(Response::HTTP_FORBIDDEN);
    }
}
