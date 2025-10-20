<?php

namespace Domain\User\Catalogs\BaseUserRole;

abstract class UserBaseRoleCatalog
{
    abstract static public function name(): string;

    abstract public function requireEmployee(): bool;

    abstract public function requireStudent(): bool;

    abstract public function requireConsultant(): bool;

    abstract public function canObservePeople(): bool;

    /**
     * Возвращает массив slug`ов с доступными тестами и анкетами.
     * @return array
     */
    abstract public function availableQuizzes(): array;
}
