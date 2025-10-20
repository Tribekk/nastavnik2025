<?php

use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\QuestionType;
use Domain\Quiz\Models\Quiz;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddQuestionToStudentQuestionnaire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       $quiz = Quiz::where('slug', 'student-questionnaire')->firstOrFail();
       $type = QuestionType::where('code', 'checkbox')->firstOrFail();

       DB::table('questions')->insert([
           'uuid' => Str::uuid(),
           'content' => 'Укажите 3-5 главенствующих ценностей в семье',
           'type_id' => $type->id,
           'quiz_id' => $quiz->id,
           'with_an_arbitrary_answer' => true,
           'min_answers' => 3,
           'max_answers' => 5,
           'required' => false,
           'created_at' => now(),
           'updated_at' => now(),
       ]);

        $question = Question::where('content', 'Укажите 3-5 главенствующих ценностей в семье')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Семья, династия, принадлежность роду',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Любовь',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Труд',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Уважение к старшим',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Честность',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Самореализация',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Саморазвитие',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Гибкость, забота, принятие, прощение',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Личность и мнение каждого весомо',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Путешествия',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Совместный досуг',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Щедрость',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Целесообразность',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Любопытство',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Традиции',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Ответственность',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Другое',
            'type' => 'text',
            'is_arbitrary' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $question = Question::where('content', 'Укажите 3-5 главенствующих ценностей в семье')->firstOrFail();
        $question->delete();
    }
}
