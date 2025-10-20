<?php

namespace Domain\Event\Models;

use Domain\Event\States\Event\EventState;
use Domain\Event\States\EventInvite\AcceptedEventInviteState;
use Domain\Event\States\EventInvite\CanceledEventInviteState;
use Domain\Event\States\EventInvite\EventInviteState;
use Domain\Event\States\EventInvite\PendingEventInviteState;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use Spatie\ModelStates\Exceptions\InvalidConfig;
use Spatie\ModelStates\HasStates;

class EventInvite extends Model
{
    use HasStates;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function event()
    {
        return $this->belongsTo(Event::class, "event_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function getEventStateAttribute()
    {
        return EventState::find($this->event->state, $this->event);
    }

    protected function registerStates(): void
    {
        try {
            $this
                ->addState('state', EventInviteState::class)
                ->default(PendingEventInviteState::class)

                ->allowTransition(PendingEventInviteState::class, PendingEventInviteState::class)
                ->allowTransition(PendingEventInviteState::class, AcceptedEventInviteState::class)
                ->allowTransition(PendingEventInviteState::class, CanceledEventInviteState::class)

                ->allowTransition(AcceptedEventInviteState::class, AcceptedEventInviteState::class)
                ->allowTransition(AcceptedEventInviteState::class, CanceledEventInviteState::class)

                ->allowTransition(CanceledEventInviteState::class, CanceledEventInviteState::class)
                ->allowTransition(CanceledEventInviteState::class, AcceptedEventInviteState::class);
        } catch (InvalidConfig $e) {
            Log::warning($e->getMessage());
        }
    }
}
