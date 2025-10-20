<?php

use Domain\Quiz\Models\QuestionType;
use Domain\Quiz\Models\Quiz;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddQuestionsSolutionOfCasesQuizToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $quiz = Quiz::where('slug', 'solution_of_cases')->firstOrFail();
        $type = QuestionType::where('code', 'select_text_answer')->firstOrFail();

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'quiz_id' => $quiz->id,
                'type_id' => $type->id,
                'section_title' => 'Ситуация 1',
                'content' => 'Ты уже год участвуешь в проектной деятельности и не видишь перспектив дальнейшего нахождения в группе.
                Начинаешь поиск более выгодных для себя проектов, «по душе». Слухи об этом дошли до руководителя проекта, который крайне
                недоволен происходящим. <b>Что делать в такой ситуации?</b>',
            ],
            [
                'uuid' => Str::uuid(),
                'quiz_id' => $quiz->id,
                'type_id' => $type->id,
                'section_title' => 'Ситуация 2',
                'content' => 'Представь, что ты пришел на тренинг. За пять минут до начала все сели на стулья в ряд до ковра, как просил тренер.
                    И тут входит опоздавший участник, но так как ему не хватает места у ковра, ему придется поставить свой стул на ковер. Оценив ситуацию,
                    он так и сделал, взял стул и в обуви направился к ковру, чтобы сесть рядом со всеми. Но тренер не разрешил разместиться на светлом ковре
                    и  отвлекся на подготовку к тренингу. Участник задумался, что ему делать? <b>Выбери решение:</b>',
            ],
            [
                'uuid' => Str::uuid(),
                'quiz_id' => $quiz->id,
                'type_id' => $type->id,
                'section_title' => 'Ситуация 3',
                'content' => 'Скоро выпускной, тебе предложили выступить на сцене с номером или поздравительной речью. Одноклассники разошлись во мнении,
                    где будет проходить праздник после официальной части: <b>Какой вариант выберешь?</b>',
            ],
            [
                'uuid' => Str::uuid(),
                'quiz_id' => $quiz->id,
                'type_id' => $type->id,
                'section_title' => null,
                'content' => '<b>Твоё отношение к предложению о выступлении на выпускном:</b>',
            ],
            [
                'uuid' => Str::uuid(),
                'quiz_id' => $quiz->id,
                'type_id' => $type->id,
                'section_title' => 'Ситуация 4',
                'content' => 'Ты знаешь, что твой одноклассник говорит о тебе плохо за глаза и это влияет на твою репутацию в коллективе. <b>Твои действия?</b>',
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
        $quiz = Quiz::where('slug', 'solution_of_cases')->firstOrFail();
        DB::table('questions')->where('quiz_id', $quiz->id)->delete();
    }
}
