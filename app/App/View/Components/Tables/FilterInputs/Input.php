<?php

namespace App\View\Components\Tables\FilterInputs;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * список классов стилей
     */
    public string $classes;

    public string $label;
    public string $placeholder;
    public string $id;
    public string $name;
    public string $value;
    public string $type;
    public string $icon;
    public bool $model;


    public function __construct(
        string $id,
        string $name,
        string $label,
        string $classes = "",
        string $placeholder = "",
        string $value = "",
        string $icon = "",
        bool $model = false,
        string $type = "text")
    {
        $this->classes = $classes;
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->type = $type;
        $this->model = $model;
        $this->icon = $icon;

        if($icon == "" && $type == "date") {
            $this->icon = "la la-calendar";
        }

        if($icon == "" && $type == "datetime-local") {
            $this->icon = "la la-clock";
        }
    }

    public function render()
    {
        return view('components.tables.filter-inputs.input');
    }
}
