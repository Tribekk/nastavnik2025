<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Radio extends Component
{
    public string $name;

    public string $title;

    public bool $checked;

    public string $value;

    public function __construct
    (
        string $name,
        string $title,
        bool $checked = false,
        string $value = ''
    )
    {
        $this->name = $name;
        $this->title = $title;
        $this->checked = $checked;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.inputs.radio');
    }
}
