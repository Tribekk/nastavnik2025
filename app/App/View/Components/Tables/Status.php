<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class Status extends Component
{
    /**
     * сообщение status
     */
    public ?string $status;

    public function __construct(string $status = null)
    {
        $this->status = $status ? $status : session('status');
    }

    public function render()
    {
        return view('components.tables.status');
    }
}
