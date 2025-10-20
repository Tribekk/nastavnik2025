<?php

namespace Domain\Consultation\Actions;

use Domain\Consultation\Models\Consultation;
use Domain\Consultation\Models\ConsultationReview;
use Domain\User\Models\User;
use Illuminate\Support\Str;

class CreateConsultationReviewAction
{
    public function run(User $user, Consultation $consultation, array $data): ?ConsultationReview
    {
        return ConsultationReview::create([
            'uuid' => Str::uuid(),
            'consultation_id' => $consultation->id,
            'user_id' => $user->id,
            'text' => $data['text'],
        ]);
    }
}
