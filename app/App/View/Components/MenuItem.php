<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class MenuItem extends Component
{
    /**
     * Ссылка
     *
     * @var string
     */
    public $link;

    /**
     * Текст ссылки
     *
     * @var string
     */
    public $title;

    /**
     * Меню активно
     *
     * @var bool
     */
    public $active;

    /**
     * Иконка
     *
     * @var string
     */
    public $icon;

    public function __construct(string $link, string $title, string $icon)
    {
        $this->link = $link;
        $this->title = $title;
        $this->icon = $icon;


        $this->active = request()->url() == explode('?', $link)[0] ?? $link;
    }

    public function render()
    {
        return view('components.menu-item');
    }
}
