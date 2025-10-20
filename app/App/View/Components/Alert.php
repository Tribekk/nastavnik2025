<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public string $type;

    public ?string $icon;

    public string $text;

    public bool $close;

    public function __construct(string $text, string $type = 'light-primary', string $icon = null, bool $close = true)
    {
        $this->type = $type;
        $this->icon = $icon;
        $this->text = $text;
        $this->close = $close;
    }

    public function render()
    {
        return view('components.alert');
    }
}
