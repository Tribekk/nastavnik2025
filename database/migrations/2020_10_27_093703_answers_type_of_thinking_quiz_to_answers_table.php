<?php

use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\Quiz;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AnswersTypeOfThinkingQuizToAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $quiz = Quiz::where('slug', 'type-of-thinking')->firstOrFail();
        $questions = Question::where('quiz_id', $quiz->id)->get();
        foreach ($questions as $question) {
            $question->answers()->createMany([
                [
                    'uuid' => Str::uuid(),
                    'title' => 'Да',
                    'value' => 1,
                    'question_id' => $question->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'uuid' => Str::uuid(),
                    'title' => 'Нет',
                    'value' => 0,
                    'question_id' => $question->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $quiz = Quiz::where('slug', 'type-of-thinking')->firstOrFail();
        $questions = Question::where('quiz_id', $quiz->id)->get()->pluck('id');

        DB::table('answers')
            ->whereIn('question_id', $questions)
            ->delete();
    }
}
