<?php
/** @noinspection PhpUndefinedFieldInspection */
/** @noinspection PhpMissingFieldTypeInspection */

namespace App\Livewire\User;

use Carbon\Carbon;
use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;

class Notification extends Component
{
    public $notification_id;

    /**
     * Тип уведомления
     *
     * @var string
     */
    public $type;

    /**
     * Заголовок
     *
     * @var string
     */
    public $title;

    /**
     * Тело сообщения
     *
     * @var string
     */
    public $body;

    /**
     * Ссылка
     *
     * @var string
     */
    public $link;

    /**
     * Время, прошедшее от даты создания
     *
     * @var string
     */
    public $created;

    /**
     * Иконка
     *
     * @var string
     */
    public $icon;

    /**
     * Режим только для чтения (в общих списках)
     */
    public $unread;

    /**
     * @var array|string[]
     */
    public $icons = [
        'info' => 'la la-info-circle',
        'warning' => 'la la-warning',
        'danger' => 'la la-warning',
        'success' => 'la la-check-circle',
        'primary' => 'la la-info-circle'
    ];

    protected $listeners = [
        'notificationMarkedAsRead',
    ];

    /**
     * @param DatabaseNotification $notification
     */
    public function mount($notification)
    {
        $this->notification_id = $notification->id;
        $this->unread = $notification->unread();
        $this->type = $notification->data['type'] ?? 'info';
        $this->title = $notification->data['title'] ?? '';
        $this->body = $notification->data['body'] ?? '';
        $this->link = $notification->data['link'] ?? route('user.edit');
        $this->created = $this->unread
            ? Carbon::createFromFormat('Y-m-d H:i:s', $notification->created_at)->locale('ru')->diffForHumans()
            : $notification->created_at->format('d.m.Y H:i:s');
        $this->icon = $this->icons[$this->type] ?? $this->icons['danger'];
    }

    public function render()
    {
        return view('livewire.user.notification');
    }

    public function markAsRead()
    {
        $notification = DatabaseNotification::find($this->notification_id);

        $notification->markAsRead();

        $this->emit('notificationMarkedAsRead', $this->notification_id);
    }

    public function notificationMarkedAsRead($notification_id)
    {
        if($this->notification_id == $notification_id) {
            $this->unread = false;
        }
    }

}
