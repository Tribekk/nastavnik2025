<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace App\Livewire\Users;

use Domain\Quiz\Models\AvailableQuiz;
use Domain\Quiz\Models\Quiz;
use Domain\User\Actions\AssignRole;
use Domain\User\Catalogs\BaseUserRole\ConsultantRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\CuratorRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\EmployerRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\ParentRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\StudentRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\TeacherRoleCatalogItem;
use Domain\User\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    public $roleId;

    public $permissionId;

    public $userId;

    public $userRoles;

    public $userPermissions;

    public function mount($userId)
    {
        $this->userId = $userId;

        $user = User::find($userId);

        $this->userRoles = $user->roles;

        $this->userPermissions = $user->getDirectPermissions();
    }

    public function render()
    {
        return view('livewire.users.roles');
    }

    public function addRole()
    {
        $user = User::find($this->userId);

        if(count($user->roles)) {
            $this->dispatchBrowserEvent('show-notification', [
                'message' => __('Пользователь может иметь только одну роль'),
                'type' => 'error',
            ]);
            return;
        }

        $role = Role::find($this->roleId);

        $roleCatalog = $this->takeRoleCatalog($role);

        if ($user && $role) {
            if($roleCatalog) {
                $action = new AssignRole();
                $action->run($user, $roleCatalog, request());
            } else {
                $user->assignRole($role);
            }

            $this->redirect(url()->previous('/'));
        }
    }

    protected function takeRoleCatalog(Role $role) {
        switch ($role->name) {
            case "student":
                return new StudentRoleCatalogItem();
            case "parent":
                return new ParentRoleCatalogItem();
            case "curator":
                return new CuratorRoleCatalogItem();
            case "teacher":
                return new TeacherRoleCatalogItem();
            case "consultant":
                return new ConsultantRoleCatalogItem();
            case "employer":
                return new EmployerRoleCatalogItem();
        }

        return null;
    }

    protected function removeRoleAssignedItems(User $user, Role $role) {
        $roleCatalog = $this->takeRoleCatalog($role);
        if(!$roleCatalog) return;

        if(count($roleCatalog->availableQuizzes())) {
            $quizIds = Quiz::select('id')
                ->whereIn('slug', $roleCatalog->availableQuizzes())
                ->get()->pluck('id');

            $user->availableQuizzes()
                ->whereIn('quiz_id', $quizIds)
                ->delete();
        }

        if($roleCatalog->requireEmployee()) {
            $user->employee()->delete();
        }

        if($roleCatalog->requireStudent()) {
            $user->employee()->delete();
        }

        if($roleCatalog->requireConsultant()) {
            $user->consultant()->delete();
        }

        if($roleCatalog->canObservePeople()) {
            $user->observedUsers()->delete();
        }
    }

    public function removeRole($roleId)
    {
        $user = User::find($this->userId);

        $role = Role::findById($roleId);

        if ($user && $role) {
            $this->removeRoleAssignedItems($user, $role);
            $user->removeRole($role);
            $this->redirect(url()->previous('/'));
        }
    }

    public function addPermission()
    {
        $user = User::find($this->userId);

        $permission = Permission::find($this->permissionId);

        if ($user && $permission) {
            $user->givePermissionTo($permission);
            $this->userPermissions = $user->getDirectPermissions();
        }
    }

    public function revokePermission($permissionId)
    {
        $user = User::find($this->userId);

        $permission = Permission::findById($permissionId);

        if ($user && $permission) {
            $user->revokePermissionTo($permission);
            $this->userPermissions = $user->getDirectPermissions();
        }
    }

}
