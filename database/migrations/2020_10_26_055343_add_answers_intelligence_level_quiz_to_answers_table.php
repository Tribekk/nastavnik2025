<?php

use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\Quiz;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddAnswersIntelligenceLevelQuizToAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $question = Question::where('content', '&laquo;Суровый&raquo; является противоположным по значению слову:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'Резкий',
                'value' => 1,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Строгий',
                'value' => 2,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Мягкий',
                'value' => 3,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Жесткий',
                'value' => 4,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Неподатливый',
                'value' => 5,
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'Какое из следующих слов отлично от других:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'Петь',
                'value' => 1,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Звонить',
                'value' => 2,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Болтать',
                'value' => 3,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Слушать',
                'value' => 4,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Говорить',
                'value' => 5,
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'Какое из приведенных ниже слов относится к слову &laquo;жевать&raquo; как обоняние к слову нос:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'Сладкий',
                'value' => 1,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Язык',
                'value' => 2,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Запах',
                'value' => 3,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Зубы',
                'value' => 4,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Чистый',
                'value' => 5,
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'Предприниматель купил несколько подержанных автомобилей за 3.500$, а продал их за 5.500$, заработав при этом 50$ за автомобиль.<br>Напиши, сколько автомобилей он продал?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'type' => 'number',
                'title' => 'Автомобилей',
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'Сколько из этих 6 пар чисел являются полностью одинаковыми?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => '1',
                'value' => 1,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '2',
                'value' => 2,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '3',
                'value' => 3,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '4',
                'value' => 4,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '5',
                'value' => 5,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '6',
                'value' => 6,
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'Впиши, какое число должно стоять вместо знака &laquo;?&raquo;:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'type' => 'number',
                'title' => 'Число',
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'Напиши, сколько соток составляет участок длиною 70 м и шириной 20 м?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'type' => 'number',
                'title' => 'Число',
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'Отметь, какие эти фразы по значению:<br>&laquo;Хорошие вещи дешевы, плохие дороги&raquo;<br>&laquo;Хорошее качество обеспечивается простотой, плохое - сложностью&raquo;')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'Схожи',
                'value' => 1,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Противоположны',
                'value' => 2,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Ни схожи, ни противоположны',
                'value' => 3,
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'Солдат, стреляя в цель, поразил ее в 12,5% случаев.<br>Посчитай и напиши, сколько раз солдат должен выстрелить, чтобы поразить все 100 раз?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'Число',
                'type' => 'number',
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'Один из членов ряда не подходит к другим.<br>Напиши, какое число нужно поставить на его место:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'Число',
                'type' => 'text',
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'Выбери, какие две из приведенных ниже пословиц имеют схожий смысл:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => '&laquo;Куй железо, пока горячо&raquo;',
                'value' => 1,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '&laquo;Один в поле не воин&raquo;',
                'value' => 2,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '&laquo;Лес рубят, щепки летят&raquo;',
                'value' => 3,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '&laquo;Не все то золото, что блестит&raquo;',
                'value' => 4,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '&laquo;Не по виду суди, а по делам гляди&raquo;',
                'value' => 5,
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'Отметь, какие эти фразы по значению:<br><br>&laquo;Лес рубят, щепки летят&raquo;<br>&laquo;Большое дело не бывает без потерь&raquo;')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'Схожи',
                'value' => 1,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Противоположны',
                'value' => 2,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Ни схожи, ни противоположны',
                'value' => 3,
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'Какая из этих фигур наиболее отлична от других?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => '1',
                'image_path' => '/img/iq_level/question_13/1.png',
                'value' => 1,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '2',
                'image_path' => '/img/iq_level/question_13/2.png',
                'value' => 2,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '3',
                'image_path' => '/img/iq_level/question_13/3.png',
                'value' => 3,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '4',
                'image_path' => '/img/iq_level/question_13/4.png',
                'value' => 4,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '5',
                'image_path' => '/img/iq_level/question_13/5.png',
                'value' => 5,
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'Даны развертки пяти геометрических фигур (кубов). Две из них принадлежат одинаковым кубам. Какие?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => '1',
                'image_path' => '/img/iq_level/question_14/1.png',
                'value' => 1,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '2',
                'image_path' => '/img/iq_level/question_14/2.png',
                'value' => 2,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '3',
                'image_path' => '/img/iq_level/question_14/3.png',
                'value' => 3,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '4',
                'image_path' => '/img/iq_level/question_14/4.png',
                'value' => 4,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '5',
                'image_path' => '/img/iq_level/question_14/5.png',
                'value' => 5,
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'В печатающейся статье 24000 слов. Редактор решил использовать шрифт двух размеров. При использовании шрифта большого размера на странице умещается 900 слов, меньше - 1200. Статья должна занять 21 полную страницу в журнале.<br>Сколько страниц должно быть напечатано меньшим шрифтом?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'Число',
                'type' => 'number',
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'Пирог разделили на 20 кусков, из которых съели 14.<br>Какой процент пирога остался на тарелке?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => '15%',
                'value' => 1,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '20%',
                'value' => 2,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '30%',
                'value' => 3,
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'Какой энергией обладает движущееся тело?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'Потенциальной',
                'value' => 1,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Механической',
                'value' => 2,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Кинетической',
                'value' => 3,
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'Дополните фигурой рисунок, определив закономерность расположения:')
            ->where('image_path', '/img/iq_level/question_18/img.png')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => '1',
                'image_path' => '/img/iq_level/question_18/1.png',
                'value' => 1,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '2',
                'image_path' => '/img/iq_level/question_18/2.png',
                'value' => 2,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '3',
                'image_path' => '/img/iq_level/question_18/3.png',
                'value' => 3,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '4',
                'image_path' => '/img/iq_level/question_18/4.png',
                'value' => 4,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '5',
                'image_path' => '/img/iq_level/question_18/5.png',
                'value' => 5,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '6',
                'image_path' => '/img/iq_level/question_18/6.png',
                'value' => 6,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '7',
                'image_path' => '/img/iq_level/question_18/7.png',
                'value' => 7,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '8',
                'image_path' => '/img/iq_level/question_18/8.png',
                'value' => 8,
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'Дополните фигурой рисунок, определив закономерность расположения:')
            ->where('image_path', '/img/iq_level/question_19/img.png')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => '1',
                'image_path' => '/img/iq_level/question_19/1.png',
                'value' => 1,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '2',
                'image_path' => '/img/iq_level/question_19/2.png',
                'value' => 2,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '3',
                'image_path' => '/img/iq_level/question_19/3.png',
                'value' => 3,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '4',
                'image_path' => '/img/iq_level/question_19/4.png',
                'value' => 4,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '5',
                'image_path' => '/img/iq_level/question_19/5.png',
                'value' => 5,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '6',
                'image_path' => '/img/iq_level/question_19/6.png',
                'value' => 6,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '7',
                'image_path' => '/img/iq_level/question_19/7.png',
                'value' => 7,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '8',
                'image_path' => '/img/iq_level/question_19/8.png',
                'value' => 8,
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'Через все данные точки следует провести прямые линии. Через одну точку можно провести несколько линий. Какое минимальное количество прямых линий потребуется?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'Ответ',
                'type' => 'number',
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'На рисунке показано изменение скорости мотоциклиста. По вертикали отложена скорость мотоциклиста в километрах в час. По горизонтали - время момента старта в минутах. Известно, что первые несколько минут с момента старта мотоциклист ехал за автобусом, после чего обогнал его, и после этого его скорость впервые стала больше 40 километров в час. Определи по рисунку, сколько минут с момента старта мотоциклист ехал за автобусом?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'Минут(ы)',
                'type' => 'number',
                'question_id' => $question->id,
            ],
        ]);

        $question = Question::where('content', 'На рисунке жирными точками показано количество поездок Жени в общественном транспорте в период с 6 до 19 августа. По горизонтали указан день месяца, по вертикали - количество поездок, совершенных Женей в соответствующий день. Для наглядности жирные точки на рисунке соединены линией.<br>Определи по рисунку наименьшее количество поездок, совершенных Женей за день в указанный период.')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => '1',
                'value' => 1,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '2',
                'value' => 2,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '3',
                'value' => 3,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '4',
                'value' => 4,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '5',
                'value' => 5,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '6',
                'value' => 6,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '7',
                'value' => 7,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '8',
                'value' => 8,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '9',
                'value' => 9,
                'question_id' => $question->id,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => '10',
                'value' => 10,
                'question_id' => $question->id,
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
        $questions = Question::where('quiz_id', $quiz->id)->select('id')->get()->pluck('id');
        DB::table('answers')->whereIn('question_id', $questions)->delete();

    }
}
