<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\GetLoyaltyLevelsAction;
use Domain\Admin\Models\LoyaltyLevel;
use Illuminate\Http\Request;
use Support\Controller;

class LoyaltyLevelController extends Controller
{
    public function index(Request $request, GetLoyaltyLevelsAction $action)
    {
        if ($request->expectsJson()) {
            return $action->run($request->q, true);
        }

        return abort(403);
    }

    public function show(Request $request, LoyaltyLevel $level)
    {
        if ($request->expectsJson()) {
            return $level;
        }

        return abort(403);
    }
}
