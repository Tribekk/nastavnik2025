<?php

namespace Domain\User\Actions;

use Domain\User\Models\User;
use Illuminate\Support\Facades\DB;

class DeleteUser
{
    public function run(User $user): void
    {
        DB::transaction(static function () use ($user): void {
            $user->delete();
        });
    }
}
