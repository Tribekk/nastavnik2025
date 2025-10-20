<?php

namespace Domain\User\Catalogs\BaseUserRole;

class EmployerRoleCatalogItem extends UserBaseRoleCatalog
{
    public static function name(): string
    {
        return 'employer';
    }

    public function requireEmployee(): bool
    {
        return true;
    }

    public function requireStudent(): bool
    {
        return false;
    }

    public function requireConsultant(): bool
    {
        return true;
    }

    public function canObservePeople(): bool
    {
        return false;
    }

    public function availableQuizzes(): array
    {
        return [];
    }
}
