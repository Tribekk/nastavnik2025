<?php

use Carbon\Carbon;
use Domain\Quiz\Models\Answer;
use Domain\Quiz\Models\Question;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInterestAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('answers')->where('answerable_type', 'Domain\Quiz\Models\ProfessionalType')->delete();

        $question = Question::where('content', 'Мне интересны')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'факты об  астрономии, новых технологиях, искусственном интеллекте',
                'value' => 1,
                'answerable_id' => '1',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'природные явления, ландшафты, туристические маршруты',
                'value' => 1,
                'answerable_id' => '9',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'cтроение человеческого организма, поведение людей',
                'value' => 1,
                'answerable_id' => '6',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'строения,  оборудование, машины, технологии',
                'value' => 1,
                'answerable_id' => '10',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'дизайн, кинематограф, музыка, творчество',
                'value' => 1,
                'answerable_id' => '7',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        $question = Question::where('content', 'Я разбираюсь')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'в литературе, люблю читать',
                'value' => 1,
                'answerable_id' => '5',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'в понятиях BigData, машинное обучение, кибербезопасность',
                'value' => 1,
                'answerable_id' => '8',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'в географии,  расположении стран и морей',
                'value' => 1,
                'answerable_id' => '9',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'в  чертежах, работе устройств и механизмов',
                'value' => 1,
                'answerable_id' => '10',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'в биологии, люблю животных',
                'value' => 1,
                'answerable_id' => '2',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        $question = Question::where('content', 'Я с удовольствием занимаюсь')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'информатикой,  интернет-проектами',
                'value' => 1,
                'answerable_id' => '8',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'изучением медицины, психологии',
                'value' => 1,
                'answerable_id' => '6',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'обсуждением и анализом политических событий ',
                'value' => 1,
                'answerable_id' => '4',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'уходом за растениями, работой в саду',
                'value' => 1,
                'answerable_id' => '9',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'физической культурой, профессионально тренируюсь',
                'value' => 1,
                'answerable_id' => '11',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        $question = Question::where('content', 'Стремлюсь')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'придумать сюжет, воплотить это в творчестве',
                'value' => 1,
                'answerable_id' => '7',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'самостоятельно что-то создать, построить',
                'value' => 1,
                'answerable_id' => '10',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'открыть свое дело',
                'value' => 1,
                'answerable_id' => '3',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'быть сильным и справедливым',
                'value' => 1,
                'answerable_id' => '11',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'посетить уникальные природные объекты и территории',
                'value' => 1,
                'answerable_id' => '9',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        $question = Question::where('content', 'Я умею')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'создавать приложения, игры, сервисы, сайты',
                'value' => 1,
                'answerable_id' => '8',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'читать и строить чертежи, схемы, графики, могу сделать расчеты',
                'value' => 1,
                'answerable_id' => '10',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'хорошо готовить, придумывать рецепты',
                'value' => 1,
                'answerable_id' => '2',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'писать и рассказывать истории',
                'value' => 1,
                'answerable_id' => '5',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'находить общий язык с разными людьми, стараюсь им помочь',
                'value' => 1,
                'answerable_id' => '6',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        $question = Question::where('content', 'Выберу для поступления')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '«безопасность», «МЧС», «спорт» ',
                'value' => 1,
                'answerable_id' => '11',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '«юриспруденция», «международные отношения»',
                'value' => 1,
                'answerable_id' => '4',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '«ветеринария», «биотехнологии», «пищевая промышленность», «медицина»',
                'value' => 1,
                'answerable_id' => '2',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '«технологии», «металлургия»,  «астрономия»,  «авиация», «физ-мат»',
                'value' => 1,
                'answerable_id' => '1',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '«журналистика», «реклама и PR», «режиссура», «лингвистика»',
                'value' => 1,
                'answerable_id' => '5',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        $question = Question::where('content', 'Я люблю')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'решать задачи на логику, по математике, ставить опыты по физике',
                'value' => 1,
                'answerable_id' => '1',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'историю, обществознание– тематические фильмы',
                'value' => 1,
                'answerable_id' => '4',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'посещать  выставки, концерты, театр',
                'value' => 1,
                'answerable_id' => '7',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'лабораторные работы по биологии, химии',
                'value' => 1,
                'answerable_id' => '2',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'планировать, организовывать проекты',
                'value' => 1,
                'answerable_id' => '3',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        $question = Question::where('content', 'Для меня важно')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'соблюдать дисциплину, тренировать силу воли и характер',
                'value' => 1,
                'answerable_id' => '11',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'заниматься творчеством',
                'value' => 1,
                'answerable_id' => '7',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'оказать помощь,  объяснить, поиграть, организовать досуг',
                'value' => 1,
                'answerable_id' => '6',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'описывать мысли, события, вести блог',
                'value' => 1,
                'answerable_id' => '5',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'уделять внимание деталям, испытывать, экспериментировать',
                'value' => 1,
                'answerable_id' => '10',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        $question = Question::where('content', 'Меня увлекает')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'информация о глобальном потеплении, климатических изменениях',
                'value' => 1,
                'answerable_id' => '9',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'управление коллективом, составление  бюджета',
                'value' => 1,
                'answerable_id' => '3',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'возможность отстаивать и защищать свои принципы',
                'value' => 1,
                'answerable_id' => '11',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'работа с различными гаджетами, программирование роботов',
                'value' => 1,
                'answerable_id' => '8',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'события прошлого, судьбы выдающихся людей, государств',
                'value' => 1,
                'answerable_id' => '4',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        $question = Question::where('content', 'Изучаю')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'дизайн (одежды, интерьера, ландшафта, сайта)',
                'value' => 1,
                'answerable_id' => '7',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'схемы и способы заработка денег',
                'value' => 1,
                'answerable_id' => '3',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'углубленно физику и математику',
                'value' => 1,
                'answerable_id' => '1',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'жизнь растений или животных, ухаживаю за ними',
                'value' => 1,
                'answerable_id' => '2',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'языки программирования, робототехнику, 3d-моделирование',
                'value' => 1,
                'answerable_id' => '8',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        $question = Question::where('content', 'Я могу')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'свободно говорить на иностранном языке',
                'value' => 1,
                'answerable_id' => '5',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => ' выступать на публике,  вести переговоры',
                'value' => 1,
                'answerable_id' => '4',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'составить бюджет, знаю куда вложить деньги',
                'value' => 1,
                'answerable_id' => '3',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'донести информацию одноклассникам или младшим',
                'value' => 1,
                'answerable_id' => '6',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'быстрее других решать задачи',
                'value' => 1,
                'answerable_id' => '1',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
