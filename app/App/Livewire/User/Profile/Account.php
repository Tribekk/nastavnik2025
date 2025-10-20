<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace App\Livewire\User\Profile;

use Domain\User\Actions\UpdateUser;
use Domain\User\Rules\MatchSchoolClass;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Account extends Component
{
    use WithFileUploads;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $last_name;

    /**
     * @var string
     */
    public $first_name;

    /**
     * @var string
     */
    public $middle_name;

    /**
     * @var int
     */
    public $sex;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var
     */
    public $birth_date;

    /**
     * @var string
     */
    public $type;

    /**
     * @var int
     */
    public $school_id;

    /**
     * @var int
     */
    public $class_id;

    /**
     * @var
     */
    public $new_avatar;

    public function mount()
    {
        $this->fill(Auth::user());
    }

    public function render()
    {
        return view('livewire.user.profile.account');
    }

    public function updateUser(UpdateUser $action)
    {

        $rules = [
            'first_name' => ['required', 'string', 'min:2', 'max:191'],
            'last_name' => ['required', 'string', 'min:2', 'max:191'],
            'middle_name' => ['string', 'max:191', 'min:2', 'nullable'],
            'new_avatar' => ['image', 'max:500', 'nullable'],
            'tmp_sms' =>  ['string'],
        ];

        if(Auth::user()->hasRole('parent')) {
            $rules = array_merge($rules, [
                'school_id' => ['required', 'exists:schools,id'],
            ]);
        } else if(Auth::user()->hasRole('student')) {
            $rules = array_merge($rules, [
                'school_id' => ['required', 'exists:schools,id'],
                'class_id' => ['required', 'exists:school_classes,id', new MatchSchoolClass($this->school_id)],
            ]);
        }

        $data = $this->validate(
            $rules,
            [
                'last_name.min' => __('Фамилия не может содержать менее двух букв'),
                'last_name.required' => __('Необходимо указать фамилию'),
                'first_name.min' => __('Имя не может содержать менее двух букв'),
                'first_name.required' => __('Необходимо указать имя'),
                'middle_name.min' => __('Отчество не может содержать менее двух букв'),
            ],
            [
                'files' => '«аватар»',
                'files.0' => '«аватар»',
            ],
        );

        $updated = $action->run($data);

        if ($updated) {
            $this->dispatchBrowserEvent('show-notification', [
                'message' => __('Данные успешно обновлены'),
                'type' => 'success'
            ]);
        } else {
            $this->dispatchBrowserEvent('show-notification', [
                'message' => __('Не удалось обновить данные'),
                'type' => 'error'
            ]);
        }

    }


    public function setUserSchool($schoolId)
    {
        if($this->school_id == intval($schoolId)) return;
        $this->school_id = $schoolId;
        $this->class_id = null;
    }

    public function setUserClass($classId)
    {
        $this->class_id = $classId;
        $this->emit("initSelectedClass", $this->class_id);
    }


    public function removeAvatar()
    {
        auth()->user()->update(['avatar' => null]);
    }


}
