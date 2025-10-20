<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace App\Livewire\Users;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateUserFormRoles extends Component
{
    public $roleId;

    public $permissionId;

    public $userId;

    public $roles;

    public $permissions;

    public function mount()
    {
        $roles = old('roles', []);
        $this->roles = [];
        foreach ($roles as $role) {
            $this->roles[] = Role::find($role['id']);
        }

        $permissions = old('permissions', []);
        $this->permissions = [];
        foreach ($permissions as $permission) {
            $this->permissions[] = Permission::find($permission['id']);
        }
    }

    public function render()
    {
        return view('livewire.users.create_user_form_roles');
    }

    public function addRole()
    {
        $role = Role::find($this->roleId);
        $key = $this->findRoleById($this->roleId);

        if ($role && is_null($key)) {
            $this->roles[] = $role;
        }
    }

    public function removeRole($roleId)
    {
        $key = $this->findRoleById($roleId);
        if(!is_null($key)) unset($this->roles[$key]);
    }

    /**
     *
     * Поиск индекса роли в массиве ролей по ид
     *
     * @param $roleId
     * @return int|null
     */
    private function findRoleById($roleId): ?int
    {
        foreach ($this->roles as $key => $value) {
            if ($value['id'] == $roleId) {
                return $key;
            }
        }

        return null;
    }

    /**
     *
     * Поиск индекса роли в массиве ролей по ид
     *
     * @param $permissionId
     * @return int|null
     */
    private function findPermissionById($permissionId): ?int
    {
        foreach ($this->permissions as $key => $value) {
            if ($value['id'] == $permissionId) {
                return $key;
            }
        }

        return null;
    }

    public function addPermission()
    {
        $permission = Permission::find($this->permissionId);
        $key = $this->findPermissionById($this->permissionId);

        if ($permission && is_null($key)) {
            $this->permissions[] = $permission;
        }
    }

    public function removePermission($permissionId)
    {
        $key = $this->findPermissionById($permissionId);
        if(!is_null($key)) unset($this->permissions[$key]);
    }
}
