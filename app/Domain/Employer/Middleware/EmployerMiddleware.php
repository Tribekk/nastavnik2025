<?php

namespace Domain\Employer\Middleware;

use Closure;
use Domain\Orgunit\Models\ExternalOrgunit;
use Domain\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class EmployerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        /** @var User $user */
        $user = $request->user();
        $orgunit = $request->route('orgunit');

        /** @var ExternalOrgunit $userOrgunit */
        if ($user && ($user->isEmployer || Auth::user()->can('admin'))) {
            if(empty($orgunit)) {
                return $next($request);
            } else if($userOrgunit = $user->orgunit) {
                $children = $userOrgunit->parentChildren()->pluck('id');
                if(in_array($orgunit->id, $children->toArray())) return $next($request);
            }
        }

        return abort(Response::HTTP_FORBIDDEN);
    }
}
