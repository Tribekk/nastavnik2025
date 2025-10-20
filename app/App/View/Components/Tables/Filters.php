<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class Filters extends Component
{
    /**
     * URL для кнопки сбросить
     */
    public string $clearHref;

    /**
     * Без кнопок действия
     * @var bool
     */
    public bool $withoutActions;

    public function __construct(string $clearHref = "", bool $withoutActions = false)
    {
        $this->clearHref = $clearHref;
        $this->withoutActions = $withoutActions;
    }

    public function render()
    {
        return view('components.tables.filters');
    }
}
