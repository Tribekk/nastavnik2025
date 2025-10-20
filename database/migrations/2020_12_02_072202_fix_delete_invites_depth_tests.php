<?php

use Carbon\Carbon;
use Domain\Quiz\Models\ActivityObject;
use Domain\Quiz\Models\AvailableQuiz;
use Domain\Quiz\Models\Question;
use Illuminate\Database\Migrations\Migration;

class FixDeleteInvitesDepthTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $users = AvailableQuiz::whereDate('created_at', (new Carbon('01.12.2020'))->toDateString())
            ->whereHas('quiz', function ($q) { $q->where('group', 1); })
            ->whereHas('user', function ($q) {
                // фильтрация по вероятности 4-10
                $q->whereHas('studentQuestionnaireResult', function ($q2) {
                    $q2->whereHas('values', function($q3) {
                        $question = Question::where('content', "Какова вероятность, что ты останешься строить карьеру (любую) в родном городе")
                            ->firstOrFail();

                        $q3->where('question_id', $question->id)
                            ->whereHas('answer', function ($q) {
                                $q->where('title', '>=', 4)
                                    ->where('title', '<=', 10);
                            });
                    });

                });

                // фильтрация по матрице
                $q->whereHas('suitableProfessions', function ($q2) {
                    $q2->whereHas('careerMatrix', function ($q3) {
                        $ids = ActivityObject::whereIn('title', ['Техника', 'Изделия', 'Человек', 'Природные ресурсы'])->get('id')->pluck('id');
                        $q3->whereIn('activity_object_id', $ids);
                    });
                });
            })
            ->select('user_id')
            ->distinct()
            ->get()->pluck('user_id');

            // удаление
            AvailableQuiz::whereDate('created_at', (new Carbon('01.12.2020'))->toDateString())
                ->whereNotIn('user_id', $users)
                ->whereHas('quiz', function ($q) { $q->where('group', 1); })
                ->delete();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
