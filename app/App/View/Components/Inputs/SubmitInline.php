<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class SubmitInline extends Component
{
    public string $title;

    public bool $disabled;

    public string $type;

    public string $size;

    public ?string $icon;

    public function __construct(string $title, bool $disabled = false, string $type = 'btn-success', string $size = '', string $icon = null)
    {
        $this->title = $title;
        $this->disabled = $disabled;
        $this->type = $type;
        $this->size = $size;
        $this->icon = $icon;
    }

    public function render()
    {
        return view('components.inputs.submit-inline');
    }
}
