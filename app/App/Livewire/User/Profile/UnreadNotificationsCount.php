<?php

namespace App\Livewire\User\Profile;

use Livewire\Component;

class UnreadNotificationsCount extends Component
{
    public $count;

    protected $listeners = [
        'notificationMarkedAsRead',
    ];

    public function mount()
    {
        $this->count = auth()->user()->unreadNotifications->count();
    }

    public function render()
    {
        return view('livewire.user.profile.unread-notifications-count');
    }

    public function notificationMarkedAsRead($notification_id)
    {
        $this->count = auth()->user()->unreadNotifications->count();
    }
}
