<?php

namespace App\Console\Commands;

use Domain\Quiz\Actions\StoreCharacterTraitResult;
use Domain\Quiz\Actions\StoreSuitableProfessionResults;
use Domain\Quiz\Actions\StoreTypeCalculatorResults;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FixQuizResults extends Command
{
    protected $signature = 'fix:quiz_results';

    protected $description = 'Fix quiz results';

    public function handle(): int
    {
        $quizzes = DB::select("
            select id, q.slug from
                (select
                        usr.id,
                        q.slug,
                        IF(ptr.user_id is null, 0, 1) as ptr_result,
                        IF(ctr.user_id is null, 0, 1) as ctr_result,
                        IF(spr.user_id is null, 0, 1) as spr_result
                from users as usr
                     INNER JOIN available_quizzes aq
                        ON aq.user_id = usr.id
                        AND aq.state like '%FinishedQuizState'
                     INNER JOIN quizzes q on aq.quiz_id = q.id and q.slug in ('interests', 'traits', 'suitable-professions', 'solution_of_cases')
                     LEFT JOIN professional_type_results ptr on usr.id = ptr.user_id
                     LEFT JOIN character_trait_results ctr on usr.id = ctr.user_id
                     LEFT JOIN suitable_profession_results spr on usr.id = spr.user_id
                ) as q
                where (ptr_result = 0 and q.slug = 'interests')
                or (ctr_result = 0 and q.slug = 'traits')
                or (spr_result = 0 and q.slug = 'suitable-professions')
        ");

        foreach ($quizzes as $quiz) {
            $user = User::find($quiz->id);
            $quiz = Quiz::where('slug', $quiz->slug)->first();

            UserAnswer::where('quiz_id', $quiz->id)
                ->where('user_id', $user->id)
                ->update(['deleted_at' => null]);

            if ($quiz->slug == 'suitable-professions') {
                (new StoreSuitableProfessionResults())->run($user);
            }
            else if ($quiz->slug == 'interests') {
                (new StoreTypeCalculatorResults())->run($user);
            }
            else if($quiz->slug == 'traits') {
                (new StoreCharacterTraitResult())->run($user);
            }
        }

        return 1;
    }
}
