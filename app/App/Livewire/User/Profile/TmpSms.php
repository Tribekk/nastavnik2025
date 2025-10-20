<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace App\Livewire\User\Profile;

use Domain\User\Actions\UpdateUser;
use Domain\User\Actions\UpdateUserTmpSms;
use Domain\User\Rules\MatchSchoolClass;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class TmpSms extends Component
{

    /**
     * @var string
     */
    public $tmp_sms;


    public function render()
    {
        return view('livewire.user.profile.tmp-sms');
    }

    public function updateUserTmpSms(UpdateUserTmpSms $action)
    {

        $rules = [
            'tmp_sms' => ['string'],
        ];


        $data = $this->validate(
            $rules
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

    public function setUserTmpSms($tmp_sms_items)
    {

        $index = 0;
        $result_tmp_sms = [];
        if (isset($tmp_sms_items) && is_array($tmp_sms_items) && !empty($tmp_sms_items)) {
            foreach ($tmp_sms_items as $tmp_sms_item) {
                if (strpos($tmp_sms_item['name'], 'url') !== false) {
                    $result_tmp_sms[$index]['url'] = $tmp_sms_item['value'];
                    $index++;
                } else if (strpos($tmp_sms_item['name'], 'text') !== false) {
                    $result_tmp_sms[$index]['text'] = $tmp_sms_item['value'];
                } else {
                    $result_tmp_sms[$index]['zag'] = $tmp_sms_item['value'];
                }
            }
        }

        $this->tmp_sms = serialize($result_tmp_sms);

    }

    public function getUserTmpSms()
    {
        $this->tmp_sms = unserialize(auth()->user()->tmp_sms);

        return $this->tmp_sms;
    }



}
