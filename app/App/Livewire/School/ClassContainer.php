<?php

namespace App\Livewire\School;

use Domain\Admin\Models\ClassProfile;
use Domain\Admin\Models\School;
use Domain\Admin\Models\SchoolClass;
use Domain\Admin\Models\SchoolClassCurator;
use Domain\School\Rules\RequiredArbitraryProfileTitleRule;
use Domain\User\Models\User;
use Illuminate\Database\QueryException;
use Livewire\Component;

class ClassContainer extends Component
{
    /**
     * Событие
     *
     * @var SchoolClass
     */
    public $class;

    /**
     * Школа
     *
     * @var School
     */
    public $school;

    public $classes;

    public $curators;

    public $curatorId;

    public $classProfile;


    protected $listeners = [
        'classClicked' => 'editSchool',
        'modalClosed' => 'resetAll',
    ];

    protected $rules = [
        'class.number' => ['required', 'string', 'min:1', 'max:255'],
//        'class.letter' => ['string', 'max:10'],
        'class.profile_id' => ['required', 'exists:class_profiles,id'],
        'class.arbitrary_profile_title' => ['nullable', 'string', 'max:191'],
        'class.students_count' => ['nullable', 'integer', 'min:0', 'max:9999'],
        'class.year' => ['nullable', 'integer', 'min:1990', 'max:2043'],
    ];

    protected $messages = [
//        'class.number.integer' => 'Поле «номер» должно быть числом.',
        'class.number.required' => 'Поле «Название подразделения» является обязательным.',
        'class.number.max' => 'Поле «Название подразделения» не может быть длиннее 255 символов.',
//        'class.letter.required' => 'Поле «буква» является обязательным.',
//        'class.letter.max' => 'Поле «буква» не может быть длиннее 10 символа.',

        'class.year.integer' => 'Поле «год» должно быть числом.',
        'class.year.min' => 'Поле «год» не может быть меньше 1990.',
        'class.year.max' => 'Поле «год» не может быть больше 2043.',

        'class.students_count.integer' => 'Поле «количество студентов» должно быть числом.',
        'class.students_count.min' => 'Поле «количество студентов» не может быть числом меньше 0.',
        'class.students_count.max' => 'Поле «количество студентов» не может быть числом больше 9999.',
        'class.profile_id.required' => 'Поле «профиль структурного подразделения» является обязательным.',
        'class.profile_id.exists' => 'Выбранное значение в поле «профиль структурного подразделения» не найдено.',
        'class.arbitrary_profile_title.max' => 'Поле «профиль структурного подразделения» не может быть длиннее 191 символов.',
    ];

    public function mount(School $school)
    {
        $this->resetAll();
        $this->school = $school;
        $this->classes = $school->classes()->get();
    }

    public function render()
    {
        return view('livewire.school.class-container');
    }

    public function createClass() {
        $this->resetAll();
        $this->emit("initSelectedProfile");
        $this->emit('clearSelectedProfileOptions');
        $this->dispatchBrowserEvent('show-modal');
    }

    public function editClass(SchoolClass $class)
    {
        $this->class = $class;
        $this->curators = $this->class->curators;
        $this->classProfile = $this->class->profile;
        $this->emit("initSelectedProfile", $this->classProfile->id ?? '');

        $this->dispatchBrowserEvent('show-modal');
        $this->emit('start-edit-class');
    }

    public function updateOrCreateClass()
    {
        $this->validate();
        $requiredProfileTitleRule = new RequiredArbitraryProfileTitleRule($this->classProfile->id);
        if(!$requiredProfileTitleRule->passes('class.arbitrary_profile_title', $this->class->arbitrary_profile_title)) {
            $this->addError('class.arbitrary_profile_title', $requiredProfileTitleRule->message());
            return;
        }

        if(!$this->classProfile->arbitrary_title) {
            $this->class->arbitrary_profile_title = null;
        }

        $this->class->school_id = $this->school->id;
        $this->class->letter = mb_strtolower($this->class->letter);

        $query = SchoolClass::query()
            ->where('school_id', $this->school->id)
            ->where('number', $this->class->number)
            ->where('letter', $this->class->letter);

        if($this->class->year) {
            $query->where('year', $this->class->year);
        } else {
            $query->whereNull('year');
        }

        if($this->class->id) {
            $query->where('id', '!=', $this->class->id);
        }

        if($query->get()->count()) {
            $this->addError('class.letter', 'Такое  структурное подразделение уже существует');
            return;
        }

        if($this->class->id) {
            $this->class->update();
        } else {
            $this->class->save();
        }

        $this->emit('hide-modal');

        $this->classes = $this->school->classes()->get();
        $this->emit('start-edit-class');
        $this->emit('update-school-card');
    }

    public function deleteClass()
    {
        try {
            $this->class->delete();
            $this->classes = $this->school->classes()->get();
            $this->emit('hide-modal');
            $this->emit('update-school-card');
        } catch (\Exception $exception) {
            $this->dispatchBrowserEvent('show-notification', [
                'message' => __('У структурного подразделения есть руководители и (или) ученики'),
                'type' => 'error',
            ]);
        }
    }

    public function resetAll()
    {
        $this->resetErrorBag();
        $this->curators = [];
        $this->class = new SchoolClass();
        $this->classProfile = null;
    }


    public function addCurator()
    {
        $user = User::find($this->curatorId);

        if ($user && $this->class->id) {
            try {
                $this->class->curators()->create([
                    'curator_id' => $this->curatorId,
                    'school_id' => $this->school->id,
                ]);
            } catch (\Exception $exception) {
            }

            $this->curators = $this->class->curators()->get();
            $this->emit('update-school-card');
        }
    }

    public function removeCurator($curatorId)
    {
        $curator = SchoolClassCurator::find($curatorId);

        if ($curator && $this->class->id) {
            $curator->delete();

            $this->curators = $this->class->curators()->get();
            $this->emit('update-school-card');
        }
    }

    public function setProfileId($id)
    {
        $this->classProfile = ClassProfile::find($id);
        $this->class->profile_id = $id;
        $this->emit("initSelectedProfile", $this->classProfile->id ?? '');
    }
}
