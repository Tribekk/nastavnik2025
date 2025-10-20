<?php

namespace App\View\Components\Tables;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class Pagination extends Component
{
    /**
     * Элементы (LengthAwarePaginator)
     */
    public LengthAwarePaginator $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function render()
    {
        return view('components.tables.pagination');
    }
}
