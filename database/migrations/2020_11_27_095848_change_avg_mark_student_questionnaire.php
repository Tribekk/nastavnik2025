<?php

use Domain\Quiz\Models\Answer;
use Domain\Quiz\Models\Question;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ChangeAvgMarkStudentQuestionnaire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $question = Question::where('content', 'Какой у тебя средний балл?')->firstOrFail();

        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '2,5 - 3,4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '3,5 - 4,4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '4,5 - 5,0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // первый вариант ответа
        $newAnswer = Answer::where('question_id', $question->id)->where('title', '2,5 - 3,4')->firstOrFail();
        $answerIds = Answer::where('question_id', $question->id)->whereIn('title', ['2,5', '3'])->get()->pluck('id');
        DB::table('user_answers')->whereIn('answer_id', $answerIds)
            ->update(['answer_id' => $newAnswer->id]);
        DB::table('student_questionnaire_result_values')->whereIn('answer_id', $answerIds)
            ->update(['answer_id' => $newAnswer->id]);

        // второй вариант ответа
        $newAnswer = Answer::where('question_id', $question->id)->where('title', '3,5 - 4,4')->firstOrFail();
        $answerIds = Answer::where('question_id', $question->id)->whereIn('title', ['3,5', '4'])->get()->pluck('id');
        DB::table('user_answers')->whereIn('answer_id', $answerIds)
            ->update(['answer_id' => $newAnswer->id]);
        DB::table('student_questionnaire_result_values')->whereIn('answer_id', $answerIds)
            ->update(['answer_id' => $newAnswer->id]);

        // третий вариант ответа
        $newAnswer = Answer::where('question_id', $question->id)->where('title', '4,5 - 5,0')->firstOrFail();
        $answerIds = Answer::where('question_id', $question->id)->whereIn('title', ['4,5', '5'])->get()->pluck('id');
        DB::table('user_answers')->whereIn('answer_id', $answerIds)
            ->update(['answer_id' => $newAnswer->id]);
        DB::table('student_questionnaire_result_values')->whereIn('answer_id', $answerIds)
            ->update(['answer_id' => $newAnswer->id]);


        // удаление старых вариантов ответа
        Answer::where('question_id', $question->id)->whereIn('title', ['2,5', '3', '3,5', '4', '4,5', '5'])->delete();
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
