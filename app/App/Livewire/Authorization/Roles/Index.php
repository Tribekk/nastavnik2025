<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace App\Livewire\Authorization\Roles;

use App\Admin\Actions\GetRolesAction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

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
        $action = new GetRolesAction();

        return view('livewire.authorization.roles.index', [
            'roles' => $action->run($this->q)
        ]);
    }

    public function delete($id)
    {
        $this->authorize('admin');

        $role = Role::findById($id);

        $role->delete();

        if (request()->expectsJson()) {
            return response()->json(null, 204);
        }

        $this->dispatchBrowserEvent('show-notification', [
            'message' => __('Роль удалена'),
            'type' => 'success'
        ]);
    }
}
