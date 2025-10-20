<?php

namespace App\Livewire\Users;

use Domain\User\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $password;

    public $password_confirmation;

    public $userId;

    public function mount($userId)
    {
        $this->userId = $userId;
    }

    public function render()
    {
        return view('livewire.users.change-password');
    }

    public function getUserProperty()
    {
        return User::find($this->postId);
    }

    public function updatePassword()
    {
        $data = $this->validate(
            [
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
        );

        $updated = User::findOrFail($this->userId)->update(['password' => Hash::make($data['password'])]);

        if ($updated) {
            $this->dispatchBrowserEvent('show-notification', [
                'message' => __('Данные успешно обновлены'),
                'type' => 'success'
            ]);

            $this->password = '';

            $this->password_confirmation = '';
        } else {
            $this->dispatchBrowserEvent('show-notification', [
                'message' => __('Не удалось обновить данные'),
                'type' => 'error'
            ]);
        }
    }
}
