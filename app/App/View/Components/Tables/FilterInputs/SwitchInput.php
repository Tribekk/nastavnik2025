<?php

namespace App\View\Components\Tables\FilterInputs;

use Illuminate\View\Component;

class SwitchInput extends Component
{
    /**
     * список классов стилей
     */
    public string $classes;

    public string $label;
    public string $id;
    public string $name;
    public string $value;


    public function __construct(
        string $id,
        string $name,
        string $label,
        string $classes = "",
        string $value = ""
    )
    {
        $this->classes = $classes;
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.tables.filter-inputs.switch-input');
    }
}
