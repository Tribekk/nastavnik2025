<?php

declare(strict_types=1);

namespace Domain\Quiz\Actions;

use Domain\Quiz\Models\ActivityKind;
use Domain\Quiz\Models\ActivityObject;
use Domain\Quiz\Models\CareerMatrix;
use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\SuitableProfessionResult;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreSuitableProfessionResults
{
    /**
     * Сохраняет результаты теста "Подходящие профессии"
     *
     * @param User $user
     * @return void
     */
    public function run(User $user): void
    {
        DB::transaction(function () use ($user) {
            $activityObjectQuestion = Question::query()
                ->where('questionable_type', ActivityObject::class)
                ->first();

            $activityKindQuestion = Question::query()
                ->where('questionable_type', ActivityKind::class)
                ->first();

            $activityObject = UserAnswer::query()
                ->where('user_id', $user->id)
                ->where('question_id', $activityObjectQuestion->id)
                ->firstOrFail()
                ->answer
                ->answerable;

            $activityKind = UserAnswer::query()
                ->where('user_id', $user->id)
                ->where('question_id', $activityKindQuestion->id)
                ->firstOrFail()
                ->answer
                ->answerable;

            $careerMatrix = CareerMatrix::query()
                ->where('activity_object_id', $activityObject->id)
                ->where('activity_kind_id', $activityKind->id)
                ->firstOrFail();

            SuitableProfessionResult::where('user_id', $user->id)->delete();

            SuitableProfessionResult::create([
                'uuid' => Str::uuid(),
                'user_id' => $user->id,
                'career_matrix_id' => $careerMatrix->id,
            ]);
        });
    }
}
