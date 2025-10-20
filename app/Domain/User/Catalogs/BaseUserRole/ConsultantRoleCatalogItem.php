<?php

namespace Domain\User\Catalogs\BaseUserRole;

class ConsultantRoleCatalogItem extends UserBaseRoleCatalog
{
    public static function name(): string
    {
        return 'consultant';
    }

    public function requireEmployee(): bool
    {
        return false;
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
