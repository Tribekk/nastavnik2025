<?php

namespace Domain\User\Actions;

use Domain\User\Catalogs\BaseUserRole\UserBaseRoleCatalog;
use Domain\User\Models\User;
use Domain\User\Notifications\RoleAssignedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AssignRole
{
    public function run(User $user, UserBaseRoleCatalog $role, Request $request): User
    {
        $user->assignRole($role->name());

        if($role->requireEmployee()) {
            $user->employee()->create([
                'position' => $request->input('position', '-'),
            ]);
        }

        if($role->requireStudent()) {
            $user->student()->create([
                'uuid' => Str::uuid(),
            ]);
        }

        if($role->requireConsultant()) {
            $user->consultant()->create([
                'uuid' => Str::uuid(),
                'experience' => $request->input('experience', 1),
                'regalia_and_experience' => serializationString($request->input('regalia_and_experience', '-')) ?? '-',
            ]);
        }

        if($role->name() == "parent" || $role->name() == "student") {
            $user->sex = $request->input('sex', 1);
        }

        $user->email = $request->input('email', $user->email ?? null);
        $user->birth_date = $request->input('birth_date', $user->birth_date ?? null);
        $user->school_id = $request->input('school_id', $user->school_id ?? null);
        $user->class_id = $request->input('class_id', $user->class_id ?? null);
        $user->orgunit_id = $request->input('orgunit_id', $user->orgunit_id ?? null);

        $addAvailableQuizzesAction = new AddAvailableQuizzesAction();

        $addAvailableQuizzesAction->run($user, $role);

        if ($user->save()) {
            try {
                $user->notify(new RoleAssignedNotification($role));
            } catch (\Exception $exception) {
                Log::error("Уведомление не отправлено. Текст ошибки: ". $exception->getMessage());
            }
        }

        return $user;
    }
}
