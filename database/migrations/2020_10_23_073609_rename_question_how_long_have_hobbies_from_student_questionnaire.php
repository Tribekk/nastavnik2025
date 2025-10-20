<?php

use Domain\Quiz\Models\Quiz;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RenameQuestionHowLongHaveHobbiesFromStudentQuestionnaire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $quiz = Quiz::where('slug', 'student-questionnaire')->firstOrFail();
        DB::table('questions')->where('quiz_id', $quiz->id)
            ->where('content', 'Как давно?')
            ->update([
                'content' => 'Какой секцией занимаешься самое продолжительное время - укажи сколько лет',
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $quiz = Quiz::where('slug', 'student-questionnaire')->firstOrFail();
        DB::table('questions')
            ->where('quiz_id', $quiz->id)
            ->where('content', 'Какой секцией занимаешься самое продолжительное время - укажи сколько лет')
            ->update([
                'content' => 'Как давно?',
            ]);
    }
}
