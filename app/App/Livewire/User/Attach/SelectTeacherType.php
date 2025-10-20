<?php

namespace App\Livewire\User\Attach;

use Livewire\Component;

class SelectTeacherType extends Component
{
    public $role = 'teacher';

    public function mount($role)
    {
        $this->role = $role;
    }

    public function render()
    {
        return view('livewire.user.attach.select-teacher-type');
    }

    public function setRole(string $role)
    {
        $this->role = $role == "teacher" ? "teacher" : "curator";
    }
}
