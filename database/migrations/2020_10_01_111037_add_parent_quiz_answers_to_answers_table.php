<?php

use Domain\Quiz\Models\Question;
use Illuminate\Database\Migrations\Migration;

class AddParentQuizAnswersToAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $question = Question::where('content', 'Ваше Фамилия Имя (Отчество по желанию)')->firstOrFail();
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Ответ',
            'type' => 'text',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question = Question::where('content', 'Город проживания')->firstOrFail();
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Город',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question = Question::where('content', 'Телефон')->firstOrFail();
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Ответ',
            'type' => 'tel',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question = Question::where('content', 'Электронная почта')->firstOrFail();
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Ответ',
            'type' => 'email',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question = Question::where('content', 'Укажите сферу Вашей деятельности')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Здравоохранение',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Безопасность, силовые структуры, воинская служба',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Государственная служба',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Искусство',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'IT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Культура',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Логистика',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Медиа, издательство',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Наука',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Образование',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Производство',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Реклама, PR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Сельское хозяйство',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Социальное обеспечение',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Строительство',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Связь',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Технологии',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Торговля',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Экономика, финансы',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Управление (бизнес-процессами, людьми)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Спорт и фитнес',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Энергетика',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Юриспруденция',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Не работаю',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Другое',
            'type' => 'text',
            'is_arbitrary' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        $question = Question::where('content', 'Позиция, статус')->firstOrFail();

        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Рабочий',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Мастер',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Начальник участка',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Специалист',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'ИТР',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Руководитель среднего звена',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'ТОП',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Предприниматель (собственник)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'В декрете',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Другое',
            'type' => 'text',
            'is_arbitrary' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question = Question::where('content', 'Ваш общий трудовой стаж?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '1 год',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '2 года',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '3 года',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '4 года',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '5 лет',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '6 лет',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '7 лет',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '8 лет',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '9 лет',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '10 лет',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Больше 10 лет',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Вы работаете по полученной специальности?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Да',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Работал от 1 до 3 лет',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Нет, никогда не работал(а) по профильному образованию',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'У вас есть общий с ребенком досуг, какой?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Ведение домашнего хозяйства',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Дача',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Искусство',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Чтение',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Театр, кино',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Поход по магазинам',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Путешествия',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Туризм',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Фитнес, спорт',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Другое',
            'type' => 'text',
            'is_arbitrary' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question = Question::where('content', 'Укажите 3-5 главенствующих ценностей в Вашей семье')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Семья, династия, принадлежность роду',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Любовь',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Труд',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Уважение к старшим',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Честность',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Самореализация',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Саморазвитие',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Гибкость, забота, принятие, прощение',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Личность и мнение каждого весомо',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Путешествия',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Совместный досуг',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Щедрость',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Целесообразность',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Любопытство',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Традиции',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Ответственность',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Другое',
            'type' => 'text',
            'is_arbitrary' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question = Question::where('content', 'Ребенок растет в полной семье?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Живем отдельно, но ребенок получает внимание обоих родителей',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Воспитывает один родитель',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Полная',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Оцените общий уровень благополучия Вашей семьи')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'У вас есть потребность в получении дополнительных пособий или льгот, например, на обучение ребенка?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Да',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Нет',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'У вашего ребенка есть особенности здоровья, ограничивающие поступление на какие-то специальности? Укажите эти качества')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Зрение',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Иммунитет',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Координация',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Нервная система',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Аллергия, астма',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Сердечно-сосудистая система',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Слух',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Четкая речь',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Физическая сила, выносливость',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Другое',
            'type' => 'text',
            'is_arbitrary' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question = Question::where('content', 'Какое будущее Вы видите идеальным для ребенка?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Будет рядом, станет востребованным специалистом в родном городе',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Уедет в мегаполис / столицу и сделает там карьеру',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Станет предпринимателем, создаст что-то свое / новое',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Продолжит наш семейный бизнес',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Продолжит семейную династию в нашем городе',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Я не могу судить, он сам решает',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Какова вероятность, что Ваш ребенок останется строить карьеру (любую) в родном городе')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '8',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Как Вы считаете, ребенок прислушивается к Вашему мнению?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Да, всегда',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Иногда',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Чаще делает по-своему',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Мое мнение его не интересует',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Как Вы относитесь к идее заключения договора целевого обучения с работодателем - этот вариант подходит для тех, кто хочет получать гарантированную стипендию и после окончания обучения готов отработать 3 года по полученной специальности?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Это идеальный вариант для нас!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Я плохо представляю плюсы и минусы этого',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Не рассматриваем',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Пока не нашли подходящий вариант, но нам интересно',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Выделите не более 3-х определяющих факторов в выборе специальности?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Обучение на бюджетной основе',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Продолжение семейной династии',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Невысокий проходной балл',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Востребованная специальность',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Популярная на сегодня специальность',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Специальность, гарантирующая высокий доход',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Гарантия трудоустройства',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Стипендия во время обучения',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Прохождение качественной практики во время обучения',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Соответствие моим способностям и интересам',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Высокий рейтинг учебного заведения',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Рекомендации друзей, экспертов',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Другое',
            'type' => 'text',
            'is_arbitrary' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question = Question::where('content', 'Вам интересно получать предложения от работодателей об экскурсиях, подготовительных курсах, целевом обучении, страховках?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Да',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Нет',
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
        $questions = [
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

        $questionIds = Question::whereIn('content', $questions)->get()->pluck('id');

        DB::table('answers')->whereIn('question_id', $questionIds)->delete();
    }
}
