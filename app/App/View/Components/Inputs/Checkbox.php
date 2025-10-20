<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public string $id;
    public string $name;
    public string $label;
    public ?string $value;
    public ?string $model;
    public string $type;

    public function __construct
    (
        string $name,
        string $label = "",
        string $value = null,
        string $type = 'checkbox-outline checkbox-success',
        string $id = '',
        string $model = null
    )
    {
        $this->name = $name;
        $this->label = $label;
        $this->id = $id;
        $this->value = old($name, $value);
        $this->model = $model;
        $this->type = $type;
    }

    public function render()
    {
        return view('components.inputs.checkbox');
    }
}
