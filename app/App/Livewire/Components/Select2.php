<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Select2 extends Component
{
    public $select_id;

    public $name;

    public $url;

    public $placeholder;

    public $event;

    public $selected;

    public $selectedItemUrl;

    public $multiple;

    public function mount($id, $name, $url, $event, $placeholder = '', $selected = null, $selectedItemUrl = null, $multiple = false)
    {
        $this->select_id = $id;
        $this->name = $name;
        $this->url = $url;
        $this->placeholder = $placeholder;
        $this->event = $event;
        $this->selected = $selected;
        $this->selectedItemUrl = $selectedItemUrl;
        $this->multiple = $multiple;
    }

    public function render()
    {
        return view('livewire.components.select2');
    }
}
