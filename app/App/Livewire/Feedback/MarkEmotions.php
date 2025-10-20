<?php

namespace App\Livewire\Feedback;

use Livewire\Component;

class MarkEmotions extends Component
{
    public $inputId;

    public $name;

    public $value;

    public function mount($id, $name, $value = null)
    {
        $this->inputId = $id;
        $this->name = $name;
        $this->value = $value;
    }

    public function render()
    {
        return view('livewire.feedback.mark-emotions');
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
}
