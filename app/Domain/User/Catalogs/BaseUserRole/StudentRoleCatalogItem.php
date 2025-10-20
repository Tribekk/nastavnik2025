<?php

namespace Domain\User\Catalogs\BaseUserRole;

class StudentRoleCatalogItem extends UserBaseRoleCatalog
{
    public static function name(): string
    {
        return 'student';
    }

    public function requireEmployee(): bool
    {
        return false;
    }

    public function requireStudent(): bool
    {
        return true;
    }

    public function requireConsultant(): bool
    {
        return false;
    }

    public function canObservePeople(): bool
    {
        return false;
    }

    public function availableQuizzes(): array
    {
        return [
//            'traits',
            'type-of-thinking',// Кейсы (Личностные характеристики, Профессиональные характеристики)
            'suitable-professions',// Вопросы (Профессиональные характеристики)
            'student-questionnaire', // Вопросы (Личностные характеристики)
//            'mentor-cases',
//            'prof-char-questions',
//            'personal-char-questions',
        ];
    }
}
