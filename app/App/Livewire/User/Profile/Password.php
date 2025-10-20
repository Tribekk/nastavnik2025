<?php
/** @noinspection PhpUnused */
/** @noinspection PhpMissingFieldTypeInspection */

namespace App\Livewire\User\Profile;

use Domain\User\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Password extends Component
{
    public $current_password;

    public $password;

    public $password_confirmation;

    public function render()
    {
        return view('livewire.user.profile.password');
    }

    public function updatePassword()
    {
        $data = $this->validate(
            [
                'current_password' => ['required', new MatchOldPassword],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
        );

        $updated = auth()->user()->update(['password' => Hash::make($data['password'])]);

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
}
