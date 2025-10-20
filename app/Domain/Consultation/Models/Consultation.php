<?php

namespace Domain\Consultation\Models;

use Carbon\Carbon;
use Domain\Consultant\Models\ConsultantAppointmentInterval;
use Domain\Consultation\States\CarriedOutConsultationState;
use Domain\Consultation\States\ConfirmedConsultationState;
use Domain\Consultation\States\ConsultationState;
use Domain\Consultation\States\NotCarriedOutConsultationState;
use Domain\Consultation\States\NotVerifiedConsultationState;
use Domain\Consultation\States\PendingConsultationState;
use Domain\Feedback\Models\EmotionsFeedback;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Spatie\ModelStates\Exceptions\InvalidConfig;
use Spatie\ModelStates\HasStates;

class Consultation extends Model
{
    use HasStates;

    protected $guarded = ['id'];

    protected $casts = [
        'confirmed' => 'boolean',
        'with_child' => 'boolean',
        'personal_communication_parent' => 'boolean',
        'personal_communication_child' => 'boolean',
        'separation_during_consultation' => 'boolean',
    ];

    public function result()
    {
        return $this->hasOne(ConsultationResult::class, "consultation_id");
    }

    public function consultant()
    {
        return $this->belongsTo(User::class, "consultant_id");
    }

    public function parent()
    {
        return $this->belongsTo(User::class, "parent_id");
    }

    public function child()
    {
        return $this->belongsTo(User::class, "child_id");
    }

    public function appointment() {
        return $this->belongsTo(ConsultantAppointmentInterval::class, "appointment_id");
    }

    public function interval()
    {
        return optional($this->appointment)->interval();
    }

    public function getFormattedStartAtAttribute(): string
    {
        $date = $this->appointment->date_at;
        $startAt = new Carbon($this->interval->start_at);

        return (new Carbon($date))
            ->setTime($startAt->hour, $startAt->minute)
            ->translatedFormat("d F, l, в H:i");

    }

    public function feedbacks()
    {
        return $this->morphMany(EmotionsFeedback::class, "feedbackable");
    }

    public function review()
    {
        return $this->hasOne(ConsultationReview::class, "consultation_id");
    }

    public function getCommunicationTypeLabelAttribute(): string
    {
        switch ($this->communication_type) {
            case 'zoom': return 'в Zoom';
            case 'whatsapp': return 'в WhatsApp';
            case 'skype': return 'в Skype';
            default:
                return 'в Zoom, WhatsApp или Skype';
        }
    }

    protected function registerStates(): void
    {
        try {
            $this
                ->addState('state', ConsultationState::class)
                ->default(NotVerifiedConsultationState::class)

                ->allowTransition(NotVerifiedConsultationState::class, NotVerifiedConsultationState::class)
                ->allowTransition(NotVerifiedConsultationState::class, ConfirmedConsultationState::class)

                ->allowTransition(ConfirmedConsultationState::class, ConfirmedConsultationState::class)
                ->allowTransition(ConfirmedConsultationState::class, PendingConsultationState::class)
                ->allowTransition(ConfirmedConsultationState::class, CarriedOutConsultationState::class)
                ->allowTransition(ConfirmedConsultationState::class, NotCarriedOutConsultationState::class)

                ->allowTransition(PendingConsultationState::class, PendingConsultationState::class)
                ->allowTransition(PendingConsultationState::class, CarriedOutConsultationState::class)
                ->allowTransition(PendingConsultationState::class, NotCarriedOutConsultationState::class)

                ->allowTransition(CarriedOutConsultationState::class, CarriedOutConsultationState::class)
                ->allowTransition(CarriedOutConsultationState::class, PendingConsultationState::class)
                ->allowTransition(CarriedOutConsultationState::class, NotCarriedOutConsultationState::class)

                ->allowTransition(NotCarriedOutConsultationState::class, NotCarriedOutConsultationState::class)
                ->allowTransition(NotCarriedOutConsultationState::class, CarriedOutConsultationState::class)
                ->allowTransition(NotCarriedOutConsultationState::class, PendingConsultationState::class);

        } catch (InvalidConfig $e) {
            Log::warning($e->getMessage());
        }
    }
}

