<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class RadioGroup extends Component
{
    public string $name;

    public string $title;

    public bool $required;

    public string $id;

    public function __construct
    (
        string $name,
        string $title,
        bool $required = false,
        string $id = ''
    )
    {
        $this->name = $name;
        $this->title = $title;
        $this->required = $required;
        $this->id = $id;
    }

    public function render()
    {
        return view('components.inputs.radio-group');
    }
}
