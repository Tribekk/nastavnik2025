<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Select extends Component
{
    public string $name;

    public string $title;

    public array $values;

    public bool $required;

    public  $currentValue;

    public string $id;

    public string $model;

    public function __construct
    (
        string $name,
        string $title,
        array $values,
        string $currentValue = '',
        bool $required = false,
        string $id = '',
        string $model = ''
    )
    {
        $this->name = $name;
        $this->title = $title;
        $this->values = $values;
        $this->currentValue = null === old($name)
            ? $currentValue
            : old($name);
        $this->required = $required;
        $this->id = $id;
        $this->model = $model;
    }

    public function render()
    {
        return view('components.inputs.select');
    }
}
