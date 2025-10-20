<?php

namespace App\View\Components\Tables\FilterInputs;

use Illuminate\View\Component;

class Select extends Component
{
    /**
     * список классов стилей
     */
    public string $classes;

    public string $label;
    public string $id;
    public string $name;
    public string $value;
    public array $items;


    public function __construct(
        string $id,
        string $name,
        string $label,
        array $items,
        string $classes = "",
        string $value = "")
    {
        $this->classes = $classes;
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->items = $items;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.tables.filter-inputs.select');
    }
}
