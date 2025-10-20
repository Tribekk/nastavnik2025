<?php

namespace App\Livewire\Components;

use Livewire\Component;

class SelectCity extends Component
{
    public $select_id;

    public $name;

    public $url;

    public $placeholder;

    public $event;

    public $selected;

    public $selectedItemUrl;

    public function mount($id, $name, $url, $event, $placeholder = '', $selected = null, $selectedItemUrl = null)
    {
        $this->select_id = $id;
        $this->name = $name;
        $this->url = $url;
        $this->placeholder = $placeholder;
        $this->event = $event;
        $this->selected = $selected;
        $this->selectedItemUrl = $selectedItemUrl;
    }

    public function render()
    {
        return view('livewire.components.select-city');
    }
}
