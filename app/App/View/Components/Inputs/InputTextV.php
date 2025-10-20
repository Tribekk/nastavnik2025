<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class InputTextV extends Component
{
    public string $name;

    public string $title;

    public string $type;

    public bool $required;

    public string $value;

    public string $id;

    public string $prependIcon;

    public string $placeholder;

    public bool $readonly;

    public bool $datePicker;

    public bool $dateTimePicker;

    public ?string $model;

    public string $min;

    public string $step;

    public bool $multiple;

    public string $accept;

    public function __construct
    (
        string $name,
        string $title = "",
        bool $required = false,
        string $type = 'text',
        string $id = '',
        string $value = '',
        string $prependIcon = '',
        string $placeholder = '',
        bool $readonly = false,
        string $model = null,
        bool $datePicker = false,
        string $min = "",
        string $step = "",
        bool $dateTimePicker = false,
        bool $multiple = false,
        string $accept = ""
    )
    {
        $this->name = $name;
        $this->title = $title;
        $this->required = $required;
        $this->type = $type;
        $this->id = $id;
        $this->value = old($name) === null
            ? $value
            : old($name);
        $this->prependIcon = $prependIcon;
        $this->placeholder = $placeholder;
        $this->readonly = $readonly;
        $this->model = $model;
        $this->datePicker = $datePicker;
        $this->dateTimePicker = $dateTimePicker;
        $this->min = $min;
        $this->step = $step;
        $this->multiple = $multiple;
        $this->accept = $accept;
    }

    public function render()
    {
        return view('components.inputs.input-text-v');
    }
}
