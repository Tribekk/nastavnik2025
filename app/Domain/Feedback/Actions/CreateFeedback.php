<?php

namespace Domain\Feedback\Actions;

use Domain\Feedback\Models\Feedback;
use Domain\User\Models\User;
use Illuminate\Support\Str;

class CreateFeedback
{
    public function run(User $user, array $data): Feedback
    {
        return Feedback::create([
            'user_id' => $user->id,
            'uuid' => Str::uuid(),
            'events_attached_earlier' => $data['events_attached_earlier'] ,
            'effective' => $data['effective'] ?? null,
            'intelligibility' => $data['intelligibility'] ?? 5,
            'interesting' => $data['interesting'] ?? 5,
            'elaboration' => $data['elaboration'] ?? 5,
            'utility' => $data['utility'] ?? 5,
            'project_definition' => $data['project_definition'] ?? null,
            'mark' => $data['mark'],
            'emotion' => $data['emotion'],
            'comment' => $data['comment'] ?? null,
        ]);
    }
}
