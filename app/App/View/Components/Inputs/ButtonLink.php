<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class ButtonLink extends Component
{
    public string $link;

    public string $title;

    public string $type;

    public string $size;

    public bool $disabled;

    public string $icon;

    public string $target;

    public function __construct
    (
        string $link,
        string $title,
        string $type = 'btn-success',
        string $target = '',
        bool $disabled = false,
        string $icon = '',
        string $size = '')
    {
        $this->link = $link;
        $this->title = $title;
        $this->icon = $icon;
        $this->disabled = $disabled ? 'disabled' : '';
        $this->type = $type;
        $this->size = $size;
        $this->target = $target;
    }

    public function render()
    {
        return view('components.inputs.button-link');
    }
}
