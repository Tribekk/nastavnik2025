<?php

namespace Domain\Event\Models;

use Domain\AttachFile\Models\AttachedFile;
use Domain\Event\States\Event\CanceledEventState;
use Domain\Event\States\Event\CarriedOutEventState;
use Domain\Event\States\Event\EventState;
use Domain\Event\States\Event\NotCarriedOutEventState;
use Domain\Event\States\Event\StartedEventState;
use Domain\Event\States\Event\WaitingEventState;
use Domain\Orgunit\Models\ExternalOrgunit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Spatie\ModelStates\Exceptions\InvalidConfig;
use Spatie\ModelStates\HasStates;
use Support\CastAttributes\SerializationString;

class Event extends Model
{
    use HasStates;

    protected $guarded = ['id'];

    protected $casts = [
        'title' => SerializationString::class,
        'program' => SerializationString::class,
        'start_at' => 'datetime',
        'finish_at' => 'datetime',
    ];

    public function audience()
    {
        return $this->hasMany(EventHasAudience::class, "event_id");
    }

    public function orgunit()
    {
        return $this->belongsTo(ExternalOrgunit::class, "orgunit_id");
    }

    public function format()
    {
        return $this->belongsTo(EventFormat::class, "format_id");
    }

    public function directions()
    {
        return $this->hasMany(EventHasDirection::class, "event_id");
    }

    public function getAudienceIdsArrAttribute(): array
    {
        return $this->audience()->get()->pluck('audience_id')->toArray();
    }

    public function getDirectionIdsArrAttribute(): array
    {
        return $this->directions()->get()->pluck('direction_id')->toArray();
    }

    public function invites()
    {
        return $this->hasMany(EventInvite::class, "event_id");
    }

    public function participants()
    {
        return $this->hasMany(EventParticipant::class, "event_id");
    }

    public function attachedFiles()
    {
        return $this->morphMany(AttachedFile::class, "attacheable");
    }

    protected function registerStates(): void
    {
        try {
            $this
                ->addState('state', EventState::class)
                ->default(WaitingEventState::class)

                ->allowTransition(WaitingEventState::class, WaitingEventState::class)
                ->allowTransition(WaitingEventState::class, StartedEventState::class)
                ->allowTransition(WaitingEventState::class, CanceledEventState::class)
                ->allowTransition(WaitingEventState::class, CarriedOutEventState::class)
                ->allowTransition(WaitingEventState::class, NotCarriedOutEventState::class)

                ->allowTransition(StartedEventState::class, StartedEventState::class)
                ->allowTransition(StartedEventState::class, WaitingEventState::class)
                ->allowTransition(StartedEventState::class, CanceledEventState::class)
                ->allowTransition(StartedEventState::class, CarriedOutEventState::class)
                ->allowTransition(StartedEventState::class, NotCarriedOutEventState::class)

                ->allowTransition(CanceledEventState::class, CanceledEventState::class)
                ->allowTransition(CanceledEventState::class, StartedEventState::class)
                ->allowTransition(CanceledEventState::class, WaitingEventState::class)
                ->allowTransition(CanceledEventState::class, CarriedOutEventState::class)
                ->allowTransition(CanceledEventState::class, NotCarriedOutEventState::class)

                ->allowTransition(CarriedOutEventState::class, CarriedOutEventState::class)
                ->allowTransition(CarriedOutEventState::class, StartedEventState::class)
                ->allowTransition(CarriedOutEventState::class, WaitingEventState::class)
                ->allowTransition(CarriedOutEventState::class, CanceledEventState::class)
                ->allowTransition(CarriedOutEventState::class, NotCarriedOutEventState::class)

                ->allowTransition(NotCarriedOutEventState::class, NotCarriedOutEventState::class)
                ->allowTransition(NotCarriedOutEventState::class, StartedEventState::class)
                ->allowTransition(NotCarriedOutEventState::class, WaitingEventState::class)
                ->allowTransition(NotCarriedOutEventState::class, CanceledEventState::class)
                ->allowTransition(NotCarriedOutEventState::class, CarriedOutEventState::class);
        } catch (InvalidConfig $e) {
            Log::warning($e->getMessage());
        }
    }
}
