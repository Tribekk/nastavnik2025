<?php

namespace Domain\Employer\Middleware;

use Closure;
use Domain\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UndefinedOrgunitMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        /** @var User $user */
        $user = $request->user();

        if ($user && $user->orgunit) {
            return $next($request);
        }

        return new Response(view('orgunits.errors.undefined_orgunit'));
    }
}
