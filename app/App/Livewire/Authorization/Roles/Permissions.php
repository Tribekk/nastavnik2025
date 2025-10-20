<?php

namespace App\Livewire\Authorization\Roles;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Permissions extends Component
{
    public $roleId;

    public $guardName;

    public function mount(Role $role)
    {
        $this->roleId = $role->id;
        $this->guardName = $role->guard_name;
    }

    public function render()
    {
        return view('livewire.authorization.roles.permissions', [
            'permissions' => Permission::where('guard_name', $this->guardName)->get(),
            'role' => Role::findById($this->roleId)
        ])->extends('layout.page')
            ->section('content');
    }

    public function toggleRolePermission($roleId, $permission)
    {
        $role = Role::findById($roleId);

        if($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
        } else {
            try {
                $role->givePermissionTo($permission);
            } catch (PermissionDoesNotExist $e) {
                $this->dispatchBrowserEvent('show-notification', [
                    'message' => __('Роль удалена'),
                    'type' => 'error'
                ]);
            }

        }
    }
}
