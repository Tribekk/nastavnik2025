<?php

namespace App\Livewire\Filters;

use Livewire\Component;

class SchoolAndClass extends Component
{
    public $schoolId;
    public $classId;

    public $classes;
    public $schoolClasses;
    public $classClasses;

    public function mount($classes = "col-12", $schoolClasses = "col-12 my-3", $classClasses = "col-12 my-3")
    {
       $this->schoolId = request()->school_id ?? '';
       if($this->schoolId == 'undefined') $this->schoolId = '';

       $this->classId = request()->class_id ?? '';
       if($this->classId == 'undefined') $this->classId = '';

       $this->classes = $classes;
       $this->schoolClasses = $schoolClasses;
       $this->classClasses = $classClasses;
    }

    public function render()
    {
        return view('livewire.filters.school-and-class');
    }

    public function setSchool($id)
    {
        if($this->schoolId == $id) return;
        $this->schoolId = $id;
        $this->classId = '';

        $this->emitSelf('reInitClass', $id);
    }

    public function setClass($id)
    {
        if($this->classId == $id) return;

        if($id == "") {
            $this->classId = "";
            $this->emitSelf('reInitClass', $this->schoolId);
            return;
        }

        $this->classId = $id;
    }
}
