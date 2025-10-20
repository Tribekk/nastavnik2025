<?php

use Domain\Quiz\Models\QuestionType;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\TypeOfThinking;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class QuestionsTypeOfThinkingQuizToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $quiz = Quiz::where('slug', 'type-of-thinking')->firstOrFail();
        $type = QuestionType::where('code', 'yn')->firstOrFail();


        $typePD = TypeOfThinking::where('short_title', 'П-Д')->firstOrFail();
        $typeAS = TypeOfThinking::where('short_title', 'А-С')->firstOrFail();
        $typeSL = TypeOfThinking::where('short_title', 'С-Л')->firstOrFail();
        $typeNO = TypeOfThinking::where('short_title', 'Н-О')->firstOrFail();
        $typeK = TypeOfThinking::where('short_title', 'К')->firstOrFail();

        DB::table('questions')->insert([
            [ // 1
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Мне легче что-либо сделать самому, чем объяснить другому',
                'questionable_id' => $typePD->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 2
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Мне интересно изучать языки программирования / ходить на курсы робототехники',
                'questionable_id' => $typeAS->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 3
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Я люблю читать книги / веду свой блог / развиваю сообщество',
                'questionable_id' => $typeSL->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 4
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Мне нравится живопись, скульптура, архитектура, музыка',
                'questionable_id' => $typeNO->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 5
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Даже в отлаженном деле я стараюсь что-то улучшить',
                'questionable_id' => $typeK->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 6
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Я лучше понимаю, если мне объясняют на предметах и схемах, рисунках',
                'questionable_id' => $typePD->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 7
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Я люблю играть в шахматы',
                'questionable_id' => $typeAS->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 8
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Я легко излагаю свои мысли как в устной, так и в письменной форме',
                'questionable_id' => $typeSL->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 9
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Когда я читаю книгу, я четко вижу ее героев и описываемые события',
                'questionable_id' => $typeNO->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 10
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Мне трудно выполнять работу, требующую жестких ограничений',
                'questionable_id' => $typeK->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 11
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Знакомые мелодии вызывают у меня в голове определенные картины',
                'questionable_id' => $typeNO->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 12
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Мне интересна деятельность журналиста, блогера, ведущего',
                'questionable_id' => $typeSL->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 13
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Мне легко представить предмет или животное, которого нет в природ',
                'questionable_id' => $typeNO->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 14
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Мне больше нравится процесс деятельности, чем сам результат',
                'questionable_id' => $typeK->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 15
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Мне нравилось собирать конструктор в детстве',
                'questionable_id' => $typePD->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 16
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Я предпочитают точные науки (математику, физику)',
                'questionable_id' => $typeAS->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 17
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Я не хотел(а) бы подчинять свою жизнь строгой системе',
                'questionable_id' => $typeK->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 18
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Когда я слышу музыку, мне хочется танцевать',
                'questionable_id' => $typePD->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 19
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Я понимаю красоту математических формул',
                'questionable_id' => $typeAS->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 20
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Мне легко говорить перед любой аудиторией',
                'questionable_id' => $typeSL->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 21
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Я люблю посещать выставки, спектакли, концерты',
                'questionable_id' => $typeNO->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 22
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Я люблю что-то делать своими руками: шить, мастерить, ремонтировать',
                'questionable_id' => $typePD->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 23
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Я легко усваиваю незнакомые фразы и грамматические конструкции языка',
                'questionable_id' => $typeSL->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 24
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Я легко запоминаю формулы, символы, условные обозначения',
                'questionable_id' => $typeAS->id,
                'questionable_type' => TypeOfThinking::class,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ // 25
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Я не могу успокоиться, пока не доведу свою работу до совершенства',
                'questionable_id' => $typeK->id,
                'questionable_type' => TypeOfThinking::class,
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
        $quiz = Quiz::where('slug', 'type-of-thinking')->firstOrFail();
        DB::table('questions')->where('quiz_id', $quiz->id)->delete();
    }
}
