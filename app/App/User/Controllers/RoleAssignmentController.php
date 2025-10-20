<?php /** @noinspection PhpUnused */

namespace App\User\Controllers;

use App\Providers\RouteServiceProvider;
use App\User\Requests\AssignConsultantRoleRequest;
use App\User\Requests\AssignEmployerRoleRequest;
use App\User\Requests\AssignParentRoleRequest;
use App\User\Requests\AssignStudentRoleRequest;
use App\User\Requests\AssignTeacherRoleRequest;
use Domain\User\Actions\AssignRole;
use Domain\User\Catalogs\BaseUserRole\ConsultantRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\CuratorRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\EmployerRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\ParentRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\StudentRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\TeacherRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\UserBaseRoleCatalog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Support\Controller;

class RoleAssignmentController extends Controller
{
    public function showAssignStudentRoleForm()
    {
        return view('user.type.attach-student')
            ->withUser(Auth::user());
    }

    public function showAssignTeacherRoleForm()
    {
        return view('user.type.attach-teacher')
            ->withUser(Auth::user());
    }

    public function showAssignParentRoleForm()
    {
        return view('user.type.attach-parent')
            ->withUser(Auth::user());
    }

    public function showAssignConsultantRoleForm()
    {
        return view('user.type.attach-consultant')
            ->withUser(Auth::user());
    }

    public function showAssignEmployerRoleForm()
    {
        return view('user.type.attach-employer')
            ->withUser(Auth::user());
    }

    public function assignStudentRole(AssignStudentRoleRequest $request, AssignRole $action)
    {
        return $this->assignRole($request, $action, new StudentRoleCatalogItem());
    }

    public function assignTeacherRole(AssignTeacherRoleRequest $request, AssignRole $action)
    {
        return $this->assignRole($request, $action,
            $request->input('role', 'teacher') === "teacher" ?
                new TeacherRoleCatalogItem() :
                new CuratorRoleCatalogItem);
    }

    public function assignParentRole(AssignParentRoleRequest $request, AssignRole $action)
    {
        return $this->assignRole($request, $action, new ParentRoleCatalogItem);
    }

    public function assignConsultantRole(AssignConsultantRoleRequest $request, AssignRole $action)
    {
        return $this->assignRole($request, $action, new ConsultantRoleCatalogItem);
    }

    public function assignEmployerRole(AssignEmployerRoleRequest $request, AssignRole $action)
    {
        return $this->assignRole($request, $action, new EmployerRoleCatalogItem);
    }

    private function assignRole(Request $request, AssignRole $action, UserBaseRoleCatalog $type)
    {
        try {
            /** @noinspection PhpParamsInspection */
            $action->run(Auth::user(), $type, $request);
        } catch (Exception $e) {
            if ($request->expectsJson()) {
                abort(406, $e->getMessage());
            }

            return back()->withErrors($e->getMessage())->withInput();
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
