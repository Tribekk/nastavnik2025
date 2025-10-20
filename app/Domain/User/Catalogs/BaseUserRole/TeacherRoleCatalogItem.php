<?php

namespace Domain\User\Catalogs\BaseUserRole;

class TeacherRoleCatalogItem extends UserBaseRoleCatalog
{
    public static function name(): string
    {
        return 'teacher';
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
        return false;
    }

    public function canObservePeople(): bool
    {
        return true;
    }

    public function availableQuizzes(): array
    {
        return [];
    }
}
