<?php

use Domain\Quiz\Models\IntelligenceLevelType;
use Domain\Quiz\Models\QuestionType;
use Domain\Quiz\Models\Quiz;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddQuestionsIntelligenceLevelQuizToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $quiz = Quiz::where('slug', 'intelligence-level')->firstOrFail();
        $outlineBtnType = QuestionType::where('code', 'btn-outline')->firstOrFail();
        $textType = QuestionType::where('code', 'text')->firstOrFail();
        $selectType = QuestionType::where('code', 'select')->firstOrFail();
        $imageType = QuestionType::where('code', 'image')->firstOrFail();

        $type1 = IntelligenceLevelType::where('title', 'Уровень осведомленности и развития лингвистических способностей, навыки восприятия вербальной информации')->firstOrFail();
        $type2 = IntelligenceLevelType::where('title', 'Уровень образованности в области точных наук, навыки восприятия числовой информации')->firstOrFail();
        $type3 = IntelligenceLevelType::where('title', 'Уровень пространственной ориентации и абстрактно-логического мышления, навыки восприятия и работы с графической информацией')->firstOrFail();

        DB::table('questions')->insert([
            [
               'uuid' => Str::uuid(),
               'type_id' => $outlineBtnType->id,
               'quiz_id' => $quiz->id,
               'content' => '&laquo;Суровый&raquo; является противоположным по значению слову:',
               'questionable_id' => $type1->id,
               'questionable_type' => IntelligenceLevelType::class,
               'created_at' => now(),
               'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $outlineBtnType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Какое из следующих слов отлично от других:',
                'questionable_id' => $type1->id,
                'questionable_type' => IntelligenceLevelType::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $outlineBtnType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Какое из приведенных ниже слов относится к слову &laquo;жевать&raquo; как обоняние к слову нос:',
                'questionable_id' => $type1->id,
                'questionable_type' => IntelligenceLevelType::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $textType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Предприниматель купил несколько подержанных автомобилей за 3.500$, а продал их за 5.500$, заработав при этом 50$ за автомобиль.<br>Напиши, сколько автомобилей он продал?',
                'questionable_id' => $type2->id,
                'questionable_type' => IntelligenceLevelType::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $selectType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Сколько из этих 6 пар чисел являются полностью одинаковыми?',
                'questionable_id' => $type2->id,
                'questionable_type' => IntelligenceLevelType::class,
                'image_path' => "/img/iq_level/question_5/img.png",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $textType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Впиши, какое число должно стоять вместо знака &laquo;?&raquo;:',
                'questionable_id' => $type2->id,
                'questionable_type' => IntelligenceLevelType::class,
                'image_path' => "/img/iq_level/question_6/img.png",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $textType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Напиши, сколько соток составляет участок длиною 70 м и шириной 20 м?',
                'questionable_id' => $type2->id,
                'questionable_type' => IntelligenceLevelType::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $outlineBtnType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Отметь, какие эти фразы по значению:<br>&laquo;Хорошие вещи дешевы, плохие дороги&raquo;<br>&laquo;Хорошее качество обеспечивается простотой, плохое - сложностью&raquo;',
                'questionable_id' => $type1->id,
                'questionable_type' => IntelligenceLevelType::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $textType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Солдат, стреляя в цель, поразил ее в 12,5% случаев.<br>Посчитай и напиши, сколько раз солдат должен выстрелить, чтобы поразить все 100 раз?',
                'questionable_id' => $type2->id,
                'questionable_type' => IntelligenceLevelType::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $textType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Один из членов ряда не подходит к другим.<br>Напиши, какое число нужно поставить на его место:',
                'questionable_id' => $type2->id,
                'questionable_type' => IntelligenceLevelType::class,
                'image_path' => "/img/iq_level/question_10/img.png",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $outlineBtnType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Выбери, какие две из приведенных ниже пословиц имеют схожий смысл:',
                'questionable_id' => $type1->id,
                'questionable_type' => IntelligenceLevelType::class,
                'min_answers' => 2,
                'max_answers' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $outlineBtnType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Отметь, какие эти фразы по значению:<br><br>&laquo;Лес рубят, щепки летят&raquo;<br>&laquo;Большое дело не бывает без потерь&raquo;',
                'questionable_id' => $type1->id,
                'questionable_type' => IntelligenceLevelType::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $imageType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Какая из этих фигур наиболее отлична от других?',
                'questionable_id' => $type3->id,
                'questionable_type' => IntelligenceLevelType::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $imageType->id,
                'quiz_id' => $quiz->id,
                'min_answers' => 2,
                'max_answers' => 2,
                'content' => 'Даны развертки пяти геометрических фигур (кубов). Две из них принадлежат одинаковым кубам. Какие?',
                'questionable_id' => $type3->id,
                'questionable_type' => IntelligenceLevelType::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $textType->id,
                'quiz_id' => $quiz->id,
                'content' => 'В печатающейся статье 24000 слов. Редактор решил использовать шрифт двух размеров. При использовании шрифта большого размера на странице умещается 900 слов, меньше - 1200. Статья должна занять 21 полную страницу в журнале.<br>Сколько страниц должно быть напечатано меньшим шрифтом?',
                'questionable_id' => $type2->id,
                'questionable_type' => IntelligenceLevelType::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $outlineBtnType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Пирог разделили на 20 кусков, из которых съели 14.<br>Какой процент пирога остался на тарелке?',
                'questionable_id' => $type2->id,
                'questionable_type' => IntelligenceLevelType::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $outlineBtnType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Какой энергией обладает движущееся тело?',
                'image_path' => "/img/iq_level/question_17/img.png",
                'questionable_id' => $type3->id,
                'questionable_type' => IntelligenceLevelType::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $imageType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Дополните фигурой рисунок, определив закономерность расположения:',
                'image_path' => "/img/iq_level/question_18/img.png",
                'questionable_id' => $type3->id,
                'questionable_type' => IntelligenceLevelType::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $imageType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Дополните фигурой рисунок, определив закономерность расположения:',
                'image_path' => "/img/iq_level/question_19/img.png",
                'questionable_id' => $type3->id,
                'questionable_type' => IntelligenceLevelType::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $textType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Через все данные точки следует провести прямые линии. Через одну точку можно провести несколько линий. Какое минимальное количество прямых линий потребуется?',
                'image_path' => "/img/iq_level/question_20/img.png",
                'questionable_id' => $type3->id,
                'questionable_type' => IntelligenceLevelType::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $textType->id,
                'quiz_id' => $quiz->id,
                'content' => 'На рисунке показано изменение скорости мотоциклиста. По вертикали отложена скорость мотоциклиста в километрах в час. По горизонтали - время момента старта в минутах. Известно, что первые несколько минут с момента старта мотоциклист ехал за автобусом, после чего обогнал его, и после этого его скорость впервые стала больше 40 километров в час. Определи по рисунку, сколько минут с момента старта мотоциклист ехал за автобусом?',
                'image_path' => "/img/iq_level/question_21/img.png",
                'questionable_id' => $type3->id,
                'questionable_type' => IntelligenceLevelType::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $selectType->id,
                'quiz_id' => $quiz->id,
                'content' => 'На рисунке жирными точками показано количество поездок Жени в общественном транспорте в период с 6 до 19 августа. По горизонтали указан день месяца, по вертикали - количество поездок, совершенных Женей в соответствующий день. Для наглядности жирные точки на рисунке соединены линией.<br>Определи по рисунку наименьшее количество поездок, совершенных Женей за день в указанный период.',
                'image_path' => "/img/iq_level/question_22/img.png",
                'questionable_id' => $type3->id,
                'questionable_type' => IntelligenceLevelType::class,
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
        $quiz = Quiz::where('slug', 'intelligence-level')->firstOrFail();
        DB::table('questions')->where('quiz_id', $quiz->id)->delete();
    }
}
