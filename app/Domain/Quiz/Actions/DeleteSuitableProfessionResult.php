<?php

declare(strict_types=1);

namespace Domain\Quiz\Actions;

use Domain\User\Models\User;

class DeleteSuitableProfessionResult
{
    /**
     * Удаляет результат теста "Подходящие профессии" для данного пользователя
     *
     * @param User $user
     * @return void
     */
    public function run(User $user): void
    {
        $user->suitableProfessions()->delete();
    }
}
