<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Image extends Component
{
    public string $name;

    public string $title;

    public bool $required;

    public string $id;

    public string $model;

    public string $placeholder;

    public string $destroyPlaceholder;

    public ?string $destroyAction;

    public function __construct
    (
        string $name,
        string $title = '',
        bool $required = false,
        string $id = '',
        string $value = '',
        string $model = "",
        string $placeholder = 'https://www.gravatar.com/avatar/placeholder',
        string $destroyPlaceholder = 'https://www.gravatar.com/avatar/placeholder',
        ?string $destroyAction = null
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
        $this->placeholder = $placeholder;
        $this->destroyPlaceholder = $destroyPlaceholder;
        $this->destroyAction = $destroyAction;
    }

    public function render()
    {
        return view('components.inputs.image');
    }
}
