<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace App\Livewire\Users;

use Domain\Quiz\Models\AvailableQuiz;
use Domain\Quiz\Models\Quiz;
use Domain\User\Actions\AssignRole;
use Domain\User\Catalogs\BaseUserRole\ConsultantRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\CuratorRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\ParentRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\StudentRoleCatalogItem;
use Domain\User\Catalogs\BaseUserRole\TeacherRoleCatalogItem;
use Domain\User\Models\User;
use Domain\User\Rules\MatchSchoolClass;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Account extends Component
{
    public $user;

    /**
     * @var int
     */
    public $userId;

    /**
     * @var int
     */
    public $school_id;

    /**
     * @var int
     */
    public $class_id;

    /**
     * @var int
     */
    public $orgunit_id;

    /**
     * @var string
     */
    public $phone;

    public function mount($user)
    {
        $this->user = $user;
        $this->userId = $user->id;
        $this->fill($user);
    }

    public function render()
    {
        return view('livewire.users.account');
    }

    public function submit()
    {
        $user = User::find($this->userId);
        $rules = [
            'phone' => ['required', 'string', 'max:12', 'min:12', 'unique:users,phone,'.$this->userId],
        ];

        if($user->hasAnyRole(['parent', 'student', 'curator', 'teacher'])) {
            $rules = array_merge($rules, [
                'school_id' => ['required', 'exists:schools,id'],
            ]);
        }

        if($user->hasRole('student')) {
            $rules = array_merge($rules, [
                'class_id' => ['required', 'exists:school_classes,id', new MatchSchoolClass($this->school_id)],
            ]);
        }

        if($user->hasRole('employer')) {
            $rules = array_merge($rules, [
                'orgunit_id' => ['required', 'exists:external_orgunits,id'],
            ]);
        }


        if(!count($rules)) return;
        $this->phone = str_replace('_', '', unFormatPhone($this->phone ?? ''));
        $data = $this->validate($rules, [], []);

        $updated = $user->update($data);

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

    public function setOrgunit($orgunitId)
    {
        if($this->orgunit_id == intval($orgunitId)) return;
        $this->orgunit_id = $orgunitId;
    }
}
