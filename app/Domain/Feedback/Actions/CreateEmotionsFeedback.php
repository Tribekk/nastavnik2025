<?php

namespace Domain\Feedback\Actions;

use Domain\Feedback\Models\EmotionsFeedback;
use Domain\User\Models\User;
use Illuminate\Support\Str;

class CreateEmotionsFeedback
{
    public function run(User $user, array $data, $feedbackableId = null, $feedbackableType = null): EmotionsFeedback
    {
        return EmotionsFeedback::create([
            'user_id' => $user->id,
            'uuid' => Str::uuid(),
            'feedbackable_id' => $feedbackableId,
            'feedbackable_type' => $feedbackableType,
            'emotion' => $data['emotion'],
        ]);
    }
}
