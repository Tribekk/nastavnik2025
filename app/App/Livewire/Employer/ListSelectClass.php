<?php

namespace App\Livewire\Employer;

use Livewire\Component;

class ListSelectClass extends Component
{
    public $classId = null;
    public $schoolId = null;

    public function render()
    {
        return view('livewire.employer.list_select-class');
    }

    public function setClass($classId)
    {
        $this->classId = $classId;
    }
}
