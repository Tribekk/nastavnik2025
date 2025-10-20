<?php

namespace App\Livewire\Authorization\Permissions;

use App\Admin\Actions\GetPermissionsAction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, AuthorizesRequests;

    public $q;

    protected $updatesQueryString = ['q'];

    public function mount()
    {
        $this->q = request()->query('q', $this->q);
    }

    public function render()
    {
        $action = new GetPermissionsAction();

        return view('livewire.authorization.permissions.index', [
            'permissions' => $action->run($this->q)
        ])->extends('layout.page')
            ->section('content');
    }

}
