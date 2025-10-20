<?php

namespace Domain\User\Actions;

use Domain\User\Models\User;
use Domain\User\Notifications\ChildAssignedNotification;
use Domain\User\Notifications\ParentAssignedNotification;
use Exception;
use Illuminate\Support\Facades\Log;

class AssignObserve
{
    /**
     * @var FindUserToAssignObserveQuery
     */
    public $query;

    public function __construct(FindUserToAssignObserveQuery $query)
    {
        $this->query = $query;
    }

    public function run(User $user): User
    {
        $observeUser = $this->query->get();
       
        if ($observeUser->count() > 1) {
            throw new Exception(__('По указанным данным найдено несколько пользователей.'));
        }

        if ($observeUser->count() == 0) {
            throw new Exception(__('По указанным данным не найдено ни одного пользователя.'));
        }


        $observeUser = $observeUser->first();

        if($observeUser->id == $user->id) {
            throw new Exception(__('Вы не можете прикрепить самого себя.'));
        }

        try {
            $user->observedUsers()->create(['observed_user_id' => $observeUser->id]);
        } catch (Exception $exception) {
            if($exception->getCode() == 23000) throw new Exception(__('Данный пользователь уже привязан к Вам.'));

            throw new Exception($exception);
        }

        try {
            $observeUser->notify(new ChildAssignedNotification($user));
            $user->notify(new ParentAssignedNotification($observeUser));
        } catch (\Exception $exception) {
            Log::error("Уведомление не отправлено. Текст ошибки: ". $exception->getMessage());
        }

        return $user;
    }
}
