<?php

namespace App\Livewire\School;

use Livewire\Component;

class SelectSchoolClass extends Component
{
    public $classId;
    public $schoolId;

    public $nullableClassId;

    public function mount($nullableClassId = false, $schoolId = null, $classId = null)
    {
        $this->reset();
        $this->schoolId = old('school_id', $schoolId ?? '');
        $this->classId = old('class_id', $classId ?? '');
        $this->nullableClassId = $nullableClassId;
    }

    public function render()
    {
        return view('livewire.school.select-school-class');
    }

    public function hydrate()
    {

        $this->emit("initSelectClass", $this->schoolId);

        if($this->classId) {
            $this->emit("initSelectedClass", $this->classId);
        }
    }

    public function setSchool($schoolId)
    {
        if($this->schoolId == intval($schoolId)) return;

        $this->schoolId = intval($schoolId);
        $this->classId = null;
        $this->emit("initSelectClass", $this->schoolId);
    }
}
