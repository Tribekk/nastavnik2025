<?php

namespace App\View\Components\Tables\FilterInputs;

use Illuminate\View\Component;

class Select2 extends Component
{
    /**
     * список классов стилей
     */
    public string $classes;

    public string $label;
    public string $id;
    public string $name;
    public string $value;
    public string $placeholder;
    public string $indexUrl;
    public string $showUrl;
    public string $event;
    public bool $multiple;


    public function __construct(
        string $id,
        string $name,
        string $label,
        string $event,
        string $indexUrl,
        string $showUrl,
        string $placeholder = "",
        string $classes = "",
        string $value = "",
        bool $multiple = false)
    {
        $this->classes = $classes;
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->event = $event;
        $this->indexUrl = $indexUrl;
        $this->showUrl = $showUrl;
        $this->multiple = $multiple;
    }

    public function render()
    {
        return view('components.tables.filter-inputs.select2');
    }
}
