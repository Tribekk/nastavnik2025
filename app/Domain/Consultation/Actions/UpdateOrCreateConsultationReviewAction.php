<?php

namespace Domain\Consultation\Actions;

use Domain\Consultation\Models\Consultation;
use Domain\Consultation\Models\ConsultationReview;
use Domain\User\Models\User;
use Illuminate\Support\Str;

class UpdateOrCreateConsultationReviewAction
{
    public function run(User $user, Consultation $consultation, array $data): ?ConsultationReview
    {
        $review = ConsultationReview::where('user_id', $user->id)
            ->where('consultation_id', $consultation->id)
            ->first();

        if(empty($review)) {
            $action = new CreateConsultationReviewAction();
            return $action->run($user, $consultation, $data);
        }

        $review->update([
            'text' => $data['text'],
        ]);

        return $review;
    }
}
