<?php

use Domain\Quiz\Models\Answer;
use Domain\Quiz\Models\Question;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddRequiredByToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->integer('required_by_question_id')->after('questionable_type')->nullable();
            $table->string('required_by_answer_id')->after('required_by_question_id')->nullable();
        });



        $question = Question::where('content', 'Расскажи, в какой сфере, какой именно опыт имеешь?')->firstOrFail();
        $requiredQuestion = Question::where('content', 'У тебя есть опыт трудовой деятельность?')->firstOrFail();
        $answer = Answer::where('title', 'Да, есть опыт работы')->where('question_id', $requiredQuestion->id)->firstOrFail();

        DB::table('questions')
            ->where('id', $question->id)
            ->update([
                'required_by_question_id' => $requiredQuestion->id,
                'required_by_answer_id' => $answer->id,
            ]);


        $question = Question::where('content', 'Какие будешь сдавать экзамены?')->firstOrFail();
        $requiredQuestion = Question::where('content', 'Определился с экзаменами для ЕГЭ?')->firstOrFail();
        $answer = Answer::where('title', 'Да')->where('question_id', $requiredQuestion->id)->firstOrFail();

        DB::table('questions')
            ->where('id', $question->id)
            ->update([
                'required_by_question_id' => $requiredQuestion->id,
                'required_by_answer_id' => $answer->id,
            ]);

        $question = Question::where('content', 'Какие будешь сдавать экзамены?')->firstOrFail();
        $requiredQuestion = Question::where('content', 'Определился с экзаменами для ЕГЭ?')->firstOrFail();
        $answer = Answer::where('title', 'Да')->where('question_id', $requiredQuestion->id)->firstOrFail();

        DB::table('questions')
            ->where('id', $question->id)
            ->update([
                'required_by_question_id' => $requiredQuestion->id,
                'required_by_answer_id' => $answer->id,
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn(['required_by_question_id', 'required_by_answer_id']);
        });
    }
}
