<?php

namespace Domain\Feedback\Actions;

use Domain\Feedback\Models\EmotionsFeedback;
use Domain\User\Models\User;

class UpdateOrCreateEmotionsFeedback
{
    public function run(User $user, array $data, $feedbackableId = null, $feedbackableType = null): EmotionsFeedback
    {
        $feedback = EmotionsFeedback::where('user_id', $user->id)
            ->where('feedbackable_id', $feedbackableId)
            ->where('feedbackable_type', $feedbackableType)
            ->first();

        if(empty($feedback)) {
            $action = new CreateEmotionsFeedback();
            return $action->run($user, $data, $feedbackableId, $feedbackableType);
        }

        $feedback->update([
            'emotion' => $data['emotion'],
        ]);

        return $feedback;
    }
}
