<?php

use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\SituationInterpretation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddAnswersSolutionOfCasesQuizToAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $question = Question::where('content', 'Ты уже год участвуешь в проектной деятельности и не видишь перспектив дальнейшего нахождения в группе.
                Начинаешь поиск более выгодных для себя проектов, «по душе». Слухи об этом дошли до руководителя проекта, который крайне
                недоволен происходящим. <b>Что делать в такой ситуации?</b>')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '1. Заявлю группе, что ухожу, чтобы руководитель предложил выгодные условия',
                'answerable_id' => 1,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '2. Скажу руководителю, что меня не устраивает, продолжу работать как раньше',
                'answerable_id' => 2,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '3. Перестану уделять внимание настоящему проекту, сосредоточусь на переговорах о новых возможностях',
                'answerable_id' => 3,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '4. Буду игнорировать слухи, сообщу об уходе, только когда это будет решено',
                'answerable_id' => 4,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        $question = Question::where('content', 'Представь, что ты пришел на тренинг. За пять минут до начала все сели на стулья в ряд до ковра, как просил тренер.
                    И тут входит опоздавший участник, но так как ему не хватает места у ковра, ему придется поставить свой стул на ковер. Оценив ситуацию,
                    он так и сделал, взял стул и в обуви направился к ковру, чтобы сесть рядом со всеми. Но тренер не разрешил разместиться на светлом ковре
                    и  отвлекся на подготовку к тренингу. Участник задумался, что ему делать? <b>Выбери решение:</b>')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '1. Уйти с тренинга',
                'answerable_id' => 5,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '2. Разуться и сесть рядом со всеми',
                'answerable_id' => 6,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '3. Сесть за спинами участников там, где нет ковра',
                'answerable_id' => 7,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Скоро выпускной, тебе предложили выступить на сцене с номером или поздравительной речью. Одноклассники разошлись во мнении,
                    где будет проходить праздник после официальной части: <b>Какой вариант выберешь?</b>')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '1. Одни считают, что нужно отметить в дорогом ресторане или отправиться в путешествие по путевке',
                'answerable_id' => 8,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '2. Другие согласны на скромный праздник в театре, на природе или кафе, главное аттестат, а не праздник',
                'answerable_id' => 9,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '3. Третьи считают, что можно ограничиться школой и уменьшить затраты на выпускной вечер',
                'answerable_id' => 10,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '4. Мне всё равно, пусть другие решают (или как скажут родители)',
                'answerable_id' => 11,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', '<b>Твоё отношение к предложению о выступлении на выпускном:</b>')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '1. С удовольствием соглашусь и продемонстрирую умение (петь, танцевать, режиссерское мастерство или другое)',
                'answerable_id' => 12,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '2. Соглашусь, но нужно время подумать и подготовиться',
                'answerable_id' => 13,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '3. Сомневаюсь, что справлюсь, но при определенных условиях (привлечение команды помощников, подготовлю видеоролик без выхода на сцену, «останусь за кадром») можно согласиться',
                'answerable_id' => 14,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '4. Откажусь сразу, зачем мне лишние заботы',
                'answerable_id' => 15,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Ты знаешь, что твой одноклассник говорит о тебе плохо за глаза и это влияет на твою репутацию в коллективе. <b>Твои действия?</b>')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '1. Не обращаю внимание на глупости',
                'answerable_id' => 16,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '2. Буду разбираться с одноклассником в личной беседе',
                'answerable_id' => 17,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '3. Не позволю кому-то портить мою репутацию, разберусь с обидчиком немедленно',
                'answerable_id' => 18,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '4. Проанализирую ситуацию, где я поступил (а) не правильно',
                'answerable_id' => 19,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '5. Спрошу, в чем дело и постараюсь мирно решить конфликтную ситуацию',
                'answerable_id' => 20,
                'answerable_type' => SituationInterpretation::class,
                'created_at' => now(),
                'updated_at' => now(),
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
        $questions = DB::table('questions')->where('quiz_id', $quiz->id)->get()->pluck('id');
        DB::table('answers')->whereIn('question_id', $questions)->delete();
    }
}
