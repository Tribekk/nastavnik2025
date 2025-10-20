<?php

namespace App\Admin\ViewModels;

use App\Admin\Controllers\RoleController;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\ViewModels\ViewModel;
use Support\Actions\FormatDateAction;

class RoleViewModel extends ViewModel
{
    public ?string $indexUrl = null;

    public ?Role $permission;

    public function __construct(Role $permission = null)
    {
        $this->permission = $permission;

        $this->indexUrl = action([RoleController::class, 'index']);
    }

    public function role()
    {
        return $this->permission ?? new Role();
    }

    public function guards()
    {
        return [
            ['value' => 'web', 'title' => 'web'],
            ['value' => 'api', 'title' => 'api'],
        ];
    }

    public function formatDate(Carbon $date, FormatDateAction $formatter): string
    {
        return $formatter->run($date);
    }
}
