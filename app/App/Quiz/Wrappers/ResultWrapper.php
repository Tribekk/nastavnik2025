<?php

namespace App\Quiz\Wrappers;


use Domain\User\Models\User;

class ResultWrapper
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function bothReliability(): int
    {
        return (optional($this->user->professionalTypeResult)->reliability ?? 0) +
            (optional($this->user->characterTraitResult)->reliability ?? 0);
    }

    public function bothReliabilityDescription(): string
    {
        $reliability = $this->bothReliability();

        if($reliability >= 18) return __('В результатах встречается много неправдивых ответов, лучше пройти тест еще раз');
        if($reliability >= 16) return __('Результат может быть неточен, возможно, допущена невнимательность');
        if($reliability >= 11) return __('В результатах отмечены противоречивые ответы, но данным можно доверять');
        return __('Спасибо за искренние, правдивые ответы, ответственное выполнение!');
    }

    public function bothReliabilityPercentage(): int
    {
        $reliability = $this->bothReliability();
        return 100 - (5 * $reliability);
    }
}
