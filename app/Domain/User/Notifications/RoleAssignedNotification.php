<?php

namespace Domain\User\Notifications;

use Domain\User\Catalogs\BaseUserRole\UserBaseRoleCatalog;
use Illuminate\Notifications\Messages\MailMessage;
use Spatie\Permission\Models\Role;
use Support\Notification;

class RoleAssignedNotification extends Notification
{
    protected $role;
    public $title;

    public function __construct( $role)
    {
        $this->role = $role;

        $role = Role::findByName($role->name());

        $this->title = $role
            ? $role->title
            : '';
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(__("Настройка учетной записи"))
            ->markdown('mail.user.role-assigned', ['role' => $this->role, 'title' => $this->title]);
    }

    public function toArray($notifiable)
    {
        return [
            'title' => __('Назначена новая роль ') . $this->title,
        ];
    }

    public function toIqSms($notifiable)
    {
        return [
            'to' => $notifiable->phone,
            'message' => __('Вам была назначена новая роль ') . $this->title,
        ];
    }
}
