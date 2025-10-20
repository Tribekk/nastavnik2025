<?php
/** @noinspection PhpUnused */
/** @noinspection PhpUndefinedFieldInspection */
/** @noinspection PhpUndefinedMethodInspection */
/** @noinspection PhpMissingFieldTypeInspection */

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Permission;

class UpdatePermissions extends Command
{
    protected $signature = 'permissions:update
    {--force : Delete permission even if some users or roles are using it}
    {--pretend : Show permissions that would be added}
    {--missed : Show which permissions are exist in database, but are missing in config file}';

    protected $description = 'Update Spatie permissions table from config';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        if ($this->option('missed')) {
            return $this->searchMissedPermissions();
        } else {
            return $this->performUpdate();
        }
    }

    protected function searchMissedPermissions(): int
    {
        $missedPermissions = $this->missedPermissions();

        if ($missedPermissions->count() > 0) {
            $this->comment('This permissions are missing:');

            foreach ($missedPermissions as $permission) {
                $this->warn(' -- ' . $permission->name);
            }
        } else {
            $this->comment('There are no missing permissions.');
        }

        return 0;
    }

    protected function missedPermissions(): Collection
    {
        $missed = collect([]);

        $dbPermissions = Permission::all();

        $permissionGroups = config('permissions');

        foreach ($dbPermissions as $dbPermission) {
            foreach ($permissionGroups as $permissionGroup) {
                foreach ($permissionGroup as $permission) {
                    $collection = collect($permissionGroup);

                    if ($collection->where('name', $dbPermission->name)->count() == 0) {
                        $missed->push($dbPermission);
                    }
                }
            }
        }

        return $missed;
    }

    protected function performUpdate(): int
    {
        foreach (config('permissions') as $permissionGroup) {
            foreach ($permissionGroup as $permission) {
                $this->deletePermission($permission);

                try {
                    if (!$permission['deleted']) {
                        if ($this->option('pretend')) {
                            $this->echoIfMissing($permission);
                        } else {
                            $this->storePermission($permission);
                        }
                    }
                } catch (\Exception $e) {
                    $this->error($e->getMessage());

                    return 1;
                }
            }
        }

        $this->info('Spatie permissions table was updated successfully');

        return 0;
    }

    protected function storePermission(array $permission): void
    {
        try {
            Permission::updateOrCreate(
                ['name' => $permission['name']],
                $permission
            );
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }

    protected function echoIfMissing(array $permission): void
    {
        if (Permission::where('name', $permission['name'])->doesntExist()) {
            $this->info($permission['name'] . ' will be added');
        }
    }

    protected function deletePermission(array $permission): void
    {
        try {
            if ($permission['deleted']) {
                $p = Permission::where('name', $permission['name'])->first();

                if ($p) {
                    if ($p->users->count() == 0 and $p->roles->count() == 0) {
                        if ($this->option('pretend')) {
                            $this->warn($p->name . ' will be deleted');
                        } else {
                            $p->delete();
                        }
                    } else {
                        if ($this->option('force')) {
                            if ($this->option('pretend')) {
                                $this->warn($p->name . ' will be deleted');
                            } else {
                                $p->delete();
                            }
                        } else {
                            throw new \Exception("This permission are used by some users or roles. Use --force flag to delete");
                        }
                    }
                } else {
                    $this->warn('Permission ' . $permission['name'] . ' was not found in database, but marked as deleted in config. Maybe we should remove it from config?');
                }
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
