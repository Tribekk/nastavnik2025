<?php

namespace App\Livewire\User\Attach;

use Livewire\Component;

class SelectParentSex extends Component
{
    public $sex = 1;

    public function mount($sex)
    {
        $this->sex = $sex;
    }

    public function render()
    {
        return view('livewire.user.attach.select-parent-sex');
    }

    public function setSex(string $sex)
    {
        $this->sex = $sex == 1 ? 1 : 2;
    }
}
