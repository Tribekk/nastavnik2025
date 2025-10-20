<?php

use Domain\Quiz\Models\QuestionType;
use Domain\Quiz\Models\Quiz;
use Illuminate\Database\Migrations\Migration;

class AddParentQuizQuestionsToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $typeRadio = QuestionType::where('code', 'radio')->firstOrFail();
        $typeCheckbox = QuestionType::where('code', 'checkbox')->firstOrFail();
        $typeText = QuestionType::where('code', 'text')->firstOrFail();
        $typeSelectCiy = QuestionType::where('code', 'select_city')->firstOrFail();
        $quiz = Quiz::where('slug', 'parent-questionnaire')->firstOrFail();

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeText->id,
                'quiz_id' => $quiz->id,
                'content' => 'Ваше Фамилия Имя (Отчество по желанию)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeSelectCiy->id,
                'quiz_id' => $quiz->id,
                'content' => 'Город проживания',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeText->id,
                'quiz_id' => $quiz->id,
                'content' => 'Телефон',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeText->id,
                'quiz_id' => $quiz->id,
                'content' => 'Электронная почта',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeCheckbox->id,
                'quiz_id' => $quiz->id,
                'content' => 'Укажите сферу Вашей деятельности',
                'with_an_arbitrary_answer' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'max_answers' => 25,
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeCheckbox->id,
                'quiz_id' => $quiz->id,
                'content' => 'Позиция, статус',
                'with_an_arbitrary_answer' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'max_answers' => 10,
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeRadio->id,
                'quiz_id' => $quiz->id,
                'content' => 'Ваш общий трудовой стаж?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeRadio->id,
                'quiz_id' => $quiz->id,
                'content' => 'Вы работаете по полученной специальности?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeCheckbox->id,
                'quiz_id' => $quiz->id,
                'content' => 'У вас есть общий с ребенком досуг, какой?',
                'with_an_arbitrary_answer' => true,
                'max_answers' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeCheckbox->id,
                'quiz_id' => $quiz->id,
                'content' => 'Укажите 3-5 главенствующих ценностей в Вашей семье',
                'min_answers' => 3,
                'max_answers' => 5,
                'with_an_arbitrary_answer' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeRadio->id,
                'quiz_id' => $quiz->id,
                'content' => 'Ребенок растет в полной семье?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeRadio->id,
                'quiz_id' => $quiz->id,
                'content' => 'Оцените общий уровень благополучия Вашей семьи',
                'description' => '1: низкий, 3: средний, 6: высокий',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeRadio->id,
                'quiz_id' => $quiz->id,
                'content' => 'У вас есть потребность в получении дополнительных пособий или льгот, например, на обучение ребенка?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeCheckbox->id,
                'quiz_id' => $quiz->id,
                'content' => 'У вашего ребенка есть особенности здоровья, ограничивающие поступление на какие-то специальности? Укажите эти качества',
                'with_an_arbitrary_answer' => true,
                'max_answers' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeCheckbox->id,
                'quiz_id' => $quiz->id,
                'content' => 'Какое будущее Вы видите идеальным для ребенка?',
                'max_answers' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeRadio->id,
                'quiz_id' => $quiz->id,
                'content' => 'Какова вероятность, что Ваш ребенок останется строить карьеру (любую) в родном городе',
                'description' => '1: точно уеду, 5: пока не решил, 10: точно останусь',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeRadio->id,
                'quiz_id' => $quiz->id,
                'content' => 'Как Вы считаете, ребенок прислушивается к Вашему мнению?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeRadio->id,
                'quiz_id' => $quiz->id,
                'content' => 'Как Вы относитесь к идее заключения договора целевого обучения с работодателем - этот вариант подходит для тех, кто хочет получать гарантированную стипендию и после окончания обучения готов отработать 3 года по полученной специальности?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeCheckbox->id,
                'quiz_id' => $quiz->id,
                'content' => 'Выделите не более 3-х определяющих факторов в выборе специальности?',
                'max_answers' => 3,
                'with_an_arbitrary_answer' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $typeRadio->id,
                'quiz_id' => $quiz->id,
                'content' => 'Вам интересно получать предложения от работодателей об экскурсиях, подготовительных курсах, целевом обучении, страховках?',
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
        $newQuestions = [
            "Ваше Фамилия Имя (Отчество по желанию)",
            "Телефон",
            "Электронная почта",
            "Укажите сферу Вашей деятельности",
            "Позиция, статус",
            "Ваш общий трудовой стаж?",
            "Вы работаете по полученной специальности?",
            "У вас есть общий с ребенком досуг, какой?",
            "Укажите 3-5 главенствующих ценностей в Вашей семье",
            "Ребенок растет в полной семье?",
            "Оцените общий уровень благополучия Вашей семьи",
            "У вас есть потребность в получении дополнительных пособий или льгот, например, на обучение ребенка?",
            "У вашего ребенка есть особенности здоровья, ограничивающие поступление на какие-то специальности? Укажите эти качества",
            "Какое будущее Вы видите идеальным для ребенка?",
            "Какова вероятность, что Ваш ребенок останется строить карьеру (любую) в родном городе",
            "Как Вы считаете, ребенок прислушивается к Вашему мнению?",
            "Как Вы относитесь к идее заключения договора целевого обучения с работодателем - этот вариант подходит для тех, кто хочет получать гарантированную стипендию и после окончания обучения готов отработать 3 года по полученной специальности?",
            "Выделите не более 3-х определяющих факторов в выборе специальности?",
            "Вам интересно получать предложения от работодателей об экскурсиях, подготовительных курсах, целевом обучении, страховках?"
        ];

        DB::table('questions')->whereIn('content', $newQuestions)->delete();
    }
}
