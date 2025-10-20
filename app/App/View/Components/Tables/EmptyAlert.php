<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class EmptyAlert extends Component
{
    /**
     * сообщение status
     */
    public string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function render()
    {
        return view('components.tables.empty-alert');
    }
}
