<?php /** @noinspection PhpUnused */

namespace App\User\Controllers;

use App\User\Requests\ObserveAddChildRequest;
use Domain\User\Actions\AssignObserve;
use Exception;
use Illuminate\Support\Facades\Auth;
use Support\Controller;

class ObserveUserController extends Controller
{
    public function showObserveAddChildForm()
    {
        return view('user.observe.observe-child');
    }


    public function observeAddChild(ObserveAddChildRequest $request, AssignObserve $action)
    {
        return $this->assignObserve($request, $action);
    }

    public function assignObserve($request, AssignObserve $action)
    {
        try {
            /** @noinspection PhpParamsInspection */
            $action->run(Auth::user());
            dd($action);
        } catch (Exception $e) {
            if ($request->expectsJson()) {
                abort(406, $e->getMessage());
            }

            return back()->with('error', $e->getMessage())->withInput();
        }

        return redirect(route('dashboard'));
    }
}
