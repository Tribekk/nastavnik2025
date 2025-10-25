<?php


namespace App\Admin\Controllers;

use App\Admin\Actions\GetTeachersAction;
use App\Admin\Actions\GetUsersAction;
use App\Admin\Requests\DeleteUserRequest;
use App\User\Requests\StoreUserRequest;
use Domain\User\Actions\AssignRole;
use Domain\User\Actions\CreateUser;
use Domain\User\Actions\DeleteUser;
use Domain\User\Catalogs\BaseUserRole\ConsultantRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\CuratorRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\EmployerRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\ParentRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\StudentRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\TeacherRoleCatalogItem;
use Domain\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Support\Controller;

class UserController extends Controller
{
    public function index(Request $request, GetUsersAction $action)
    {
        return view('admin.users.index')
            ->withUsers($action->run($request->all()));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit')
            ->withUser($user);
    }

    public function loginAsUser(User $user)
    {
        if (Auth::user()->can('admin')) {
            session(['admin_id' => Auth::id()]);
            Auth::login($user);

            return redirect(route('dashboard'));
        }

        return back()->withErrors([__('Недостаточно прав!')]);
    }

    public function loginAsAdmin()
    {
        if (session()->has('admin_id')) {
            Auth::loginUsingId(session()->get('admin_id'));
            session()->forget('admin_id');
        }

        return redirect(route('dashboard'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $roleName = array_column($request->input('roles', []), 'name');
        if($roleName) $roleName = $roleName[0];

        if($roleName == "student" && empty($request->class_id)) {
            return back()
                ->withInput()
                ->withErrors(['class_id' => 'Поле « структурное подразделение» является обязательным.']);
        }

        if($roleName == "employer" && empty($request->orgunit_id)) {
            return back()
                ->withInput()
                ->withErrors(['orgunit_id' => 'Поле «организация» является обязательным.']);
        }


        DB::transaction(function () use ($request, $roleName) {
            $createUserAction = new CreateUser();
            $user = $createUserAction->run($request->all());

            $assignRoleAction = new AssignRole();

            if($roleName == "student") {
                $assignRoleAction->run($user, new StudentRoleCatalogItem, $request);
            } else if($roleName == "parent") {
                $assignRoleAction->run($user, new ParentRoleCatalogItem, $request);
            } else if($roleName == "teacher") {
                $assignRoleAction->run($user, new TeacherRoleCatalogItem, $request);
            } else if($roleName == "curator") {
                $assignRoleAction->run($user, new CuratorRoleCatalogItem, $request);
            } else if($roleName == "consultant") {
                $assignRoleAction->run($user, new ConsultantRoleCatalogItem, $request);
            } else if($roleName == "employer") {
                $assignRoleAction->run($user, new EmployerRoleCatalogItem, $request);
            }

            if($request->has('permissions')) {
                $permissionIds = array_column($request->input('permissions'), 'id');
                $user->givePermissionTo($permissionIds);
            }
        });

        return redirect()->to(route('admin.users.view'))
            ->with('status', 'Пользователь добавлен');
    }

    public function destroy(DeleteUserRequest $request, User $user, DeleteUser $action)
    {
        $action->run($user);

        return redirect()->route('admin.users.view')
            ->with('status', __('Пользователь удалён'));
    }

    public function teachers(Request $request, GetTeachersAction $action)
    {
        if ($request->expectsJson()) {
            return $action->run($request->q);
        }

        abort(403);
    }
}
