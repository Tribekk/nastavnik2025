<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public string $classes;

    public function __construct(string $classes = "")
    {
        $this->classes = $classes;
    }

    public function render()
    {
        return view('components.card');
    }
}
