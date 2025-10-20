<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class SummernoteEditor extends Component
{
    public string $name;

    public string $title;

    public bool $required;

    public string $value;

    public string $id;

    public string $model;

    public function __construct
    (
        string $name,
        string $title = '',
        bool $required = false,
        string $id = '',
        string $value = '',
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
        $this->model = $model;
    }

    public function render()
    {
        return view('components.inputs.summernote-editor');
    }
}
