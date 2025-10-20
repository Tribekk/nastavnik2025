<?php

use Domain\Quiz\Models\Answer;
use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\QuestionType;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\StudentQuestionnaireResultValue;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RemoveBirthDateFromStudentQuestionnaire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $question = Question::where('content', 'Дата твоего рождения?')->firstOrFail();
        StudentQuestionnaireResultValue::where('question_id', $question->id)->delete();
        Answer::where('question_id', $question->id)->delete();
        $question->delete();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $typeText = QuestionType::where('code', 'text')->firstOrFail();
        $quiz = Quiz::where('slug', 'student-questionnaire')->firstOrFail();

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeText->id,
                'quiz_id' => $quiz->id,
                'content' => 'Дата твоего рождения?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Дата твоего рождения?')->firstOrFail();
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Ответ',
            'type' => 'date',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
