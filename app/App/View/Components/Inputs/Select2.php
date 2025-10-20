<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Select2 extends Component
{
    public string $name;

    public string $title;

    public string $value;

    public bool $required;

    public string $id;

    public string $placeholder;

    public string $event;

    public string $url;

    public string $selectedUrl;

    public bool $multiple;

    public function __construct
    (
        string $name,
        string $title,
        string $value = '',
        string $event = '',
        string $url = '',
        string $selectedUrl = '',
        string $placeholder = 'Выбрать',
        bool $required = false,
        string $id = '',
        bool $multiple = false
    )
    {
        $this->name = $name;
        $this->title = $title;
        $this->value = null === old($name)
            ? $value
            : old($name);
        $this->required = $required;
        $this->id = $id;
        $this->event = $event;
        $this->url = $url;
        $this->selectedUrl = $selectedUrl;
        $this->placeholder = $placeholder;
        $this->multiple = $multiple;
    }

    public function render()
    {
        return view('components.inputs.select2');
    }
}
