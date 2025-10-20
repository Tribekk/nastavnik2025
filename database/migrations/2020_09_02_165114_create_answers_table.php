<?php

use Carbon\Carbon;
use Domain\Quiz\Models\CharacterTrait;
use Domain\Quiz\Models\Question;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('question_id');
            $table->string('title');
            $table->integer('value')->nullable();
            $table->boolean('right')->nullable();
            $table->string('color')->nullable();
            $table->unsignedBigInteger('answerable_id')->nullable();
            $table->string('answerable_type')->nullable();
            $table->timestamps();

            $table->index('answerable_id');

            $table->foreign('question_id')
                ->references('id')
                ->on('questions');
        });

        $questions = Question::whereHasMorph('questionable', [CharacterTrait::class])->get();

        foreach ($questions as $q) {
            $q->answers()->createMany([
                ['uuid' => Str::uuid(), 'title' => 'Да', 'value' => 2, 'color' => 'blue'],
                ['uuid' => Str::uuid(), 'title' => 'Иногда', 'value' => 1, 'color' => 'orange'],
                ['uuid' => Str::uuid(), 'title' => 'Нет', 'value' => 0, 'color' => 'alla']
            ]);
        }

        $question = Question::where('content', 'Мне интересны')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'факты из области астрономии, новых технологий, искусственного интеллекта, могу сделать сложные расчеты',
                'value' => 1,
                'answerable_id' => '1',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'направления археология, экология, сельское хозяйство, туризм, люблю находиться на природе',
                'value' => 1,
                'answerable_id' => '9',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'причины поведения людей или строение человеческого организма, могу выслушать и помочь с решением / советом',
                'value' => 1,
                'answerable_id' => '6',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'технические объекты, оборудование, машины, технологии  – разбираюсь, изучаю  ',
                'value' => 1,
                'answerable_id' => '10',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'дизайнерские продукты, искусство, кинематограф, музыка, декор – все, что связано с творчеством',
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
                'title' => 'в литературе, люблю читать,  напишу текст, отредактирую статью, принял бы участие в разработке журнала',
                'value' => 1,
                'answerable_id' => '5',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'в понятиях BigData, машинное обучение, кибербезопасность – связал бы с подобным жизнь',
                'value' => 1,
                'answerable_id' => '8',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'в географии,  геологии, страноведении, агрономии – естественных науках',
                'value' => 1,
                'answerable_id' => '9',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'в чертежах, принципах работы различных устройств и механизмов',
                'value' => 1,
                'answerable_id' => '10',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'в биологии, люблю животных,  с удовольствием беру на себя ответственность за питомцев',
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
                'title' => 'информатикой,  пытаюсь создавать редакторы и полезные утилиты, участвую в интернет-проектах',
                'value' => 1,
                'answerable_id' => '8',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'изучением медицинских направлений, психологией, с интересом наблюдаю за работой врачей / учителей ',
                'value' => 1,
                'answerable_id' => '6',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'обсуждением и анализом событий в стране и за рубежом, слежу за политической обстановкой  ',
                'value' => 1,
                'answerable_id' => '4',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'уходом и разведением новых сортов растений / животных, мне интересно умное фермерство, ландшафтоведение и подобное',
                'value' => 1,
                'answerable_id' => '9',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'разными видами физической культуры: плаванием, самбо, хореографией / другими видами спорта – профессионально тренируюсь',
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
                'title' => 'принимать участие в создании  концерта, постановке спектакля, могу придумать сюжет, историю и воплотить это в музыке,  рисунке, видео, кино, игре  или мероприятии',
                'value' => 1,
                'answerable_id' => '7',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'узнавать все о машинах, конструкциях из разных материалов, могу самостоятельно что-то создать, построить',
                'value' => 1,
                'answerable_id' => '10',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'выстроить структуру, упорядочить – так легче управлять, я человек-система, открыл бы свой ресторан или другой бизнес',
                'value' => 1,
                'answerable_id' => '3',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'соблюдать режим дня, веду здоровый образ жизни, участвую в спортивных играх, походах, давно занимаюсь спортом',
                'value' => 1,
                'answerable_id' => '11',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'узнавать особенности разных стран, было бы здорово отправиться на раскопки или изучение строения вулкана ',
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
                'title' => 'создавать компьютерные / мобильные приложения, игры, сервисы, сайты',
                'value' => 1,
                'answerable_id' => '8',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Читать и строить чертежи, схемы, графики, могу сделать расчеты',
                'value' => 1,
                'answerable_id' => '10',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'создавать свои блюда или технологии приготовления, хорошо готовлю по рецепту',
                'value' => 1,
                'answerable_id' => '2',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'придумывать сюжет, рассказывать истории, иногда сочиняю стихи',
                'value' => 1,
                'answerable_id' => '5',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'находить общий язык с разными людьми, понимаю их настроение, намерения',
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
                'title' => 'направление подготовки: «безопасность», «МЧС», «силовые структуры», «спорт / фитнес»',
                'value' => 1,
                'answerable_id' => '11',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'факультет «юриспруденция», «международные отношения», или «политология»',
                'value' => 1,
                'answerable_id' => '4',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'факультет: «экология», «ветеринария», «биотехнологии», «пищевая промышленность», «медицина», хочу влиять на флору и фауну ',
                'value' => 1,
                'answerable_id' => '2',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'факультет: «нанотехнологии», «новые материалы», «металлургия»,  «астрономия», «космос», «авиация», «физико-математический» ',
                'value' => 1,
                'answerable_id' => '1',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'направление подготовки: «журналистика», «издательское дело», «реклама и PR», «режиссура», «филология», «лингвистика»',
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
                'title' => 'решать задачи на логику, по математике, ставить опыты по физике  ',
                'value' => 1,
                'answerable_id' => '1',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'историю, политологию, обществознание, философию – тематические фильмы, легко ориентируюсь в исторических  фактах',
                'value' => 1,
                'answerable_id' => '4',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'посещать  выставки, концерты, театр, ценю красоту и уют, я неординарная личность, у меня хороший вкус ',
                'value' => 1,
                'answerable_id' => '7',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'лабораторные работы по биологии или химии, интересуюсь медициной, фармакологией, генетикой ',
                'value' => 1,
                'answerable_id' => '2',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'генерировать предпринимательские идеи, имею опыт самостоятельного заработка или стремлюсь его получить',
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
                'title' => 'соблюдать порядок и дисциплину, сила воли и характер – секреты моих достижений, ради победы могу долго и скрупулезно тренироваться',
                'value' => 1,
                'answerable_id' => '11',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'заниматься творчеством: музыкальным, художественным, декоративным, литературным, монтирую видео  /шью / танцую',
                'value' => 1,
                'answerable_id' => '7',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'помогать  другим: оказать первую помощь,  объяснить, поиграть, организовать досуг ',
                'value' => 1,
                'answerable_id' => '6',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'уметь владеть словом, веду дневник / записи / блог / группу, хочу, чтобы мои материалы читали подписчики',
                'value' => 1,
                'answerable_id' => '5',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'уделять внимание деталям, изучать инструкции, схемы, проверять, экспериментировать, испытывать, анализировать',
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
                'title' => 'информация о глобальным потеплении, климатических изменениях, как состав почты влияет на урожай',
                'value' => 1,
                'answerable_id' => '9',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'информация  по управлению коллективом, составлению  бюджета, разработка и реализация проекта',
                'value' => 1,
                'answerable_id' => '3',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'возможность отстаивать  свои принципы, которые не нарушаю, защищать чужие интересы – мне важна справедливость, я сильный волевой человек',
                'value' => 1,
                'answerable_id' => '11',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'работа с  различными гаджетами, могу запрограммировать робота или написать код ',
                'value' => 1,
                'answerable_id' => '8',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'история, события прошлого, судьбы выдающихся людей, государств',
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
                'title' => 'способы заработка денег, во всем вижу возможности, интересно узнать истории успеха крупных бизнесменов, лидер по натуре',
                'value' => 1,
                'answerable_id' => '3',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'углубленно физику, математику, черчение – и это неплохо у меня получается ',
                'value' => 1,
                'answerable_id' => '1',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'жизнь растений или животных, ухаживаю за ними, неравнодушен к биологии, изучению строения клетки, генома',
                'value' => 1,
                'answerable_id' => '2',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'языки программирования хожу на курсы 3d-моделирования, робототехники или подобные',
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
                'title' => 'свободно говорить на иностранном языке, грамотно пишу и владею устной и письменной коммуникацией',
                'value' => 1,
                'answerable_id' => '5',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'выступать на публике, люблю вести переговоры, умею договариваться, могу отстоять свою позицию',
                'value' => 1,
                'answerable_id' => '4',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'составить бюджет, интересуюсь финансами, инвестициями,  наблюдаю за рекламой, как инструментом управления вниманием потребителя ',
                'value' => 1,
                'answerable_id' => '3',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'структурировать материал и объяснить его одноклассникам или младшим, люблю придумывать игры, чтобы увлечь или чему-то обучить ',
                'value' => 1,
                'answerable_id' => '6',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'быстрее решить задачу по алгоритму/плану, мне легче даются практические действия с предметами и инструментами, чем образное изложение текста',
                'value' => 1,
                'answerable_id' => '1',
                'answerable_type' => 'Domain\Quiz\Models\ProfessionalType',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
