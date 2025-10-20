<?php

namespace App\Results\Middleware;

use Closure;
use Domain\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class ShowResultsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        /** @var User $user */
        $user = $request->user();

        if($user && $user->isAdmin) {
            return $next($request);
        }

        if ($user && $user->hasAnyRole(['consultant', 'employer'])) {
            return $next($request);
        }

        return abort(Response::HTTP_FORBIDDEN);
    }
}
