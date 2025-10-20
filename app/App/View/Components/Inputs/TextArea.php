<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class TextArea extends Component
{
    public string $name;

    public string $title;

    public bool $required;

    public string $value;

    public string $id;

    public int $rows;

    public bool $readOnly;

    public string $model;

    public function __construct
    (
        string $name,
        string $title = '',
        bool $required = false,
        string $type = 'text',
        string $id = '',
        string $value = '',
        int $rows = 3,
        bool $readOnly = false,
        string $model = ""
    )
    {
        $this->name = $name;
        $this->title = $title;
        $this->required = $required;
        $this->id = $id;
        $this->value = old($name) === null
            ? $value
            : old($name);
        $this->rows = $rows;
        $this->readOnly = $readOnly;
        $this->model = $model;
    }

    public function render()
    {
        return view('components.inputs.text-area');
    }
}
