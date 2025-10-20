<?php

namespace App\Livewire\Employer\Students;

use Domain\User\Models\StageTestsAndConsultations;
use Domain\User\Models\Student;
use Livewire\Component;

class SelectionResults extends Component
{
    public StageTestsAndConsultations $row;
    public Student $student;

    protected $rules = [
        'student.proposed_admission' => ['nullable'],
        'student.applied_admission' => ['nullable'],
        'student.enrolled_profile_uz' => ['nullable'],
        'student.concluded_target_agreement' => ['nullable'],
    ];

    public function render()
    {
        return view('livewire.employer.students.selection-results');
    }

    public function mount(StageTestsAndConsultations $row)
    {
        $this->row = $row;
        $this->student = $row->user->student;
    }

    public function updated($propertyName)
    {
        $this->row->update([
            'proposed_admission' => $this->student->proposed_admission,
            'applied_admission' => $this->student->applied_admission,
            'enrolled_profile_uz' => $this->student->enrolled_profile_uz,
            'concluded_target_agreement' => $this->student->concluded_target_agreement,
        ]);

        $this->student->save();
    }
}
