<?php

namespace App\Livewire\School;

use Domain\Admin\Models\School;
use Domain\Admin\Models\SchoolClass;
use Domain\Admin\Models\SchoolClassCurator;
use Domain\User\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Card extends Component
{
    /**
     * Школа
     *
     * @var School
     */
    public $school;

    /**
     * Классы
     */
    public $classes;

    protected $listeners = [
        'update-school-card' => 'getClasses'
    ];

    public function mount(School $school)
    {
        $this->school = $school;
        $this->getClasses();
    }

    public function render()
    {
        return view('livewire.school.card');
    }

    public function getClasses()
    {
        $query = $this->school->classes();
        if(Auth::user()->hasRole('teacher')) {
            $query->whereHas('curators', function($q) {
               $q->where('curator_id', Auth::id());
            });
        }

        $this->classes = $query->get();
    }
}
