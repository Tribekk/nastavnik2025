<?php

use Domain\Quiz\Models\Inclination;
use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\Quiz;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddInclinationsAnswersToAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $communicator = Inclination::where('title', 'Коммуникатор')->firstOrFail();
        $researcher = Inclination::where('title', 'Исследователь')->firstOrFail();
        $logician = Inclination::where('title', 'Логик')->firstOrFail();
        $esthetics = Inclination::where('title', 'Эстетик')->firstOrFail();
        $extreme = Inclination::where('title', 'Экстремал')->firstOrFail();
        $analyst = Inclination::where('title', 'Аналитик')->firstOrFail();

        //1
        $question = Question::where('content', 'В своей профессиональной деятельности мне бы хотелось:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) общаться с самыми разными людьми',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $communicator->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) снимать фильмы, писать книги, рисовать, выступать на сцене и т.д.',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $esthetics->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) заниматься расчетами, вести документацию',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $analyst->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //2
        $question = Question::where('content', 'В книге или кинофильме меня больше всего привлекает:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) информация, которая может пригодиться в жизни',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $researcher->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) художественная форма, мастерство писателя или режиссера',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $esthetics->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) сюжет, действия героев',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $extreme->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //3
        $question = Question::where('content', 'Меня обрадует Нобелевская премия:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) за общественную деятельность',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $communicator->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) в области науки',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $researcher->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) в области искусства и творчества',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $esthetics->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //4
        $question = Question::where('content', 'Я скорее соглашусь стать:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) главным инженером',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $logician->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) руководителем экспедиции',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $extreme->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) финансовым аналитиком',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $analyst->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //5
        $question = Question::where('content', 'Будущее людей определяет:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) взаимопонимание среди людей',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $communicator->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) достижения науки',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $researcher->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) развитие производства',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $logician->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //6
        $question = Question::where('content', 'Если я стану руководителем, то в первую очередь займусь:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) созданием дружного, сплоченного коллектива',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $communicator->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) разработкой новых технологий обучения',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $researcher->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) работой с документами',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $analyst->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //7
        $question = Question::where('content', 'На технической выставке меня больше всего привлечет:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) внутреннее устройство экспонатов (механизм)',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $researcher->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) практическое применение экспонатов',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $logician->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) внешний вид экспонатов (цвет, форма, дизайн)',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $esthetics->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //8
        $question = Question::where('content', 'В людях прежде всего я ценю:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) дружелюбие, чуткость, отзывчивость',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $communicator->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) мужество, смелость, выносливость',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $extreme->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) ответственность, аккуратность',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $analyst->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //9
        $question = Question::where('content', 'В свободное от работы время я буду:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) исследовать, экспериментировать',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $researcher->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) заниматься творчеством',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $esthetics->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) тренироваться',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $extreme->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //10
        $question = Question::where('content', 'В заграничных поездках меня больше всего привлечет:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) возможность знакомства с историей и культурой другой страны',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $esthetics->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) экстремальный туризм (альпинизм, виндсерфинг, горные лыжи)',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $extreme->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) деловое общение',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $analyst->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //11
        $question = Question::where('content', 'Мне интереснее беседовать:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) о человеческих взаимоотношениях',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $communicator->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) о новом открытии, изобретении',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $researcher->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) о машинах, устройствах, механизмах',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $logician->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //12
        $question = Question::where('content', 'Если бы в моей школе было всего три кружка, я выберу:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) технический',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $logician->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) творческий',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $esthetics->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) спортивный',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $extreme->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //13
        $question = Question::where('content', 'В школе больше внимания следует уделять:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) улучшению взаимопониманий между учителями и учениками',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $communicator->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) поддержанию здоровья учащихся, занятиям спортом',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $extreme->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) укреплению дисциплины',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $analyst->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //14
        $question = Question::where('content', 'С интересом изучаю информацию:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) о фактах различных предметных областей',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $researcher->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) об искусстве',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $esthetics->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) о спорте',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $extreme->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //15
        $question = Question::where('content', 'Мне было бы интереснее работать:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) с детьми, сверстниками или взрослыми',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $communicator->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) с машинами, устройствами',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $logician->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) с объектами природы',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $extreme->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //16
        $question = Question::where('content', 'Школа в первую очередь должна:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) учить общению с другими людьми',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $communicator->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) давать знания и инструменты исследования',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $logician->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) обучать навыкам для будущей деятельности',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $analyst->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //17
        $question = Question::where('content', 'Каждый человек должен:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) иметь возможность заниматься творчеством',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $esthetics->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) вести здоровый образ жизни',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $extreme->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) уметь планировать свои дела',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $analyst->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //18
        $question = Question::where('content', 'Для благополучия общества в первую очередь необходима:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) защита интересов и прав граждан',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $communicator->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) наука и технический прогресс',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $researcher->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) забота о материальном благополучии людей',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $logician->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //19
        $question = Question::where('content', 'Мне больше всего нравятся уроки:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) технологии',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $logician->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) физкультуры',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $extreme->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) математики',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $analyst->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //20
        $question = Question::where('content', 'Мне интереснее было бы:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) заниматься сбытом продукции',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $communicator->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) изготавливать изделия',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $logician->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) планировать производство продукции',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $analyst->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //21
        $question = Question::where('content', 'Я предпочитаю читать:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) о выдающихся людях и их достижениях',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $researcher->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) об интересных изобретениях',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $logician->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) о творчестве',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $esthetics->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //22
        $question = Question::where('content', 'Свободное время я охотнее провожу:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) с книгой',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $researcher->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) делая что-то по хозяйству',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $logician->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) на выставках, концертах и прочее',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $esthetics->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //23
        $question = Question::where('content', 'Больший интерес у меня вызовет сообщение:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) о научном открытии',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $researcher->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) о выставке или мероприятии',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $esthetics->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) о ситуации на фондовой бирже',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $analyst->id,
                'answerable_type' => Inclination::class,
            ],
        ]);

        //24
        $question = Question::where('content', 'Я предпочту работать:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'А) в помещении, где много людей',
                'value' => 0,
                'question_id' => $question->id,
                'answerable_id' => $communicator->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Б) в необычных условиях',
                'value' => 1,
                'question_id' => $question->id,
                'answerable_id' => $extreme->id,
                'answerable_type' => Inclination::class,
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'В) в обычном кабинете',
                'value' => 2,
                'question_id' => $question->id,
                'answerable_id' => $analyst->id,
                'answerable_type' => Inclination::class,
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
        $quiz = Quiz::where('slug', 'inclinations')->firstOrFail();
        DB::table('answers')->where('quiz_id', $quiz->id)->delete();
    }
}
