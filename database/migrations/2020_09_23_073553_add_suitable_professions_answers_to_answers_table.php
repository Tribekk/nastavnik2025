<?php

use Carbon\Carbon;
use Domain\Quiz\Models\ActivityKind;
use Domain\Quiz\Models\ActivityObject;
use Domain\Quiz\Models\Question;
use Illuminate\Database\Migrations\Migration;

class AddSuitableProfessionsAnswersToAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $question = Question::where('content', 'Какой объект деятельности тебя привлекает?')->firstOrFail();

        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Человек',
                'answerable_id' => 1,
                'answerable_type' => ActivityObject::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Информация',
                'answerable_id' => 2,
                'answerable_type' => ActivityObject::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Финансы',
                'answerable_id' => 3,
                'answerable_type' => ActivityObject::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Техника',
                'answerable_id' => 4,
                'answerable_type' => ActivityObject::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Искусство',
                'answerable_id' => 5,
                'answerable_type' => ActivityObject::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Животные',
                'answerable_id' => 6,
                'answerable_type' => ActivityObject::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Растения',
                'answerable_id' => 7,
                'answerable_type' => ActivityObject::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Еда и лекарства',
                'answerable_id' => 8,
                'answerable_type' => ActivityObject::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Изделия',
                'answerable_id' => 9,
                'answerable_type' => ActivityObject::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Природные ресурсы',
                'answerable_id' => 10,
                'answerable_type' => ActivityObject::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        $question = Question::where('content', 'Какой вид деятельности тебя привлекает?')->firstOrFail();

        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Управление',
                'answerable_id' => 1,
                'answerable_type' => ActivityKind::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Обслуживание',
                'answerable_id' => 2,
                'answerable_type' => ActivityKind::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Образование',
                'answerable_id' => 3,
                'answerable_type' => ActivityKind::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Оздоровление',
                'answerable_id' => 4,
                'answerable_type' => ActivityKind::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Творчество',
                'answerable_id' => 5,
                'answerable_type' => ActivityKind::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Производство',
                'answerable_id' => 6,
                'answerable_type' => ActivityKind::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Конструирование',
                'answerable_id' => 7,
                'answerable_type' => ActivityKind::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Исследование',
                'answerable_id' => 8,
                'answerable_type' => ActivityKind::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Защита',
                'answerable_id' => 9,
                'answerable_type' => ActivityKind::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Контроль',
                'answerable_id' => 10,
                'answerable_type' => ActivityKind::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $question = Question::where('content', 'Какой объект деятельности тебя привлекает?')->firstOrFail();
        DB::table('answers')->where('question_id', $question->id)->delete();

        $question = Question::where('content', 'Какой вид деятельности тебя привлекает?')->firstOrFail();
        DB::table('answers')->where('question_id', $question->id)->delete();
    }
}
