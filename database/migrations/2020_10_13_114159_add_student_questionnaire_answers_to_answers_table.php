<?php

use Domain\Quiz\Models\LifeMottoAndInterpretation;
use Domain\Quiz\Models\PersonCharacteristic;
use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\Quiz;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AddStudentQuestionnaireAnswersToAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // о тебе
        $this->initAnswersAboutYou();

        // увлечения и успех
        $this->initAnswersHobbyAndSuccess();

        // образ будущего
        $this->initAnswersImageOnTheFuture();

        // мотивы выбора
        $this->initAnswersMotivesOfChoice();

        // готовность к выбору
        $this->initAnswersWillingnessToChoose();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        $quiz = Quiz::where('slug', 'student-questionnaire')->firstOrFail();
        DB::table('answers')->where('quiz_id', $quiz->id);
    }

    private function initAnswersAboutYou()
    {
        $question = Question::where('content', 'Город')->firstOrFail();
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Город',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question = Question::where('content', 'Вставь ссылку на свой профиль любимой соц. сети, будем там дружить:')->firstOrFail();
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Вк/Инстаграм/Тик-ток',
            'type' => 'text',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question = Question::where('content', 'Дата твоего рождения?')->firstOrFail();
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Ответ',
            'type' => 'date',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question = Question::where('content', 'Если есть, укажи адрес электронной почты')->firstOrFail();
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Ответ',
            'type' => 'email',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function initAnswersHobbyAndSuccess()
    {
        $question = Question::where('content', 'Чем увлекаешься?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Атлетика',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Волейбол / баскетбол',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Видеомонтаж',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Дизайн',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Конструирование',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'КВН',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Конный спорт',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Компьютерные игры',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Курсы развития личности',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Лыжи',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Музыка',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Программирование',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Плавание',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Рисование',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Робототехника',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Театр',
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
                'title' => 'Хэнд-мейд',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Хореография',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Хоккей',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Шахматы',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Фитнес',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Футбол',
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

        $question = Question::where('content', 'Как давно?')->firstOrFail();
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
                'title' => 'больше 10 лет',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        $question = Question::where('content', 'Эта секция - твой выбор?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Да, мой выбор',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Нет, родители заставляют',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Не знаю, нечто среднее',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        $question = Question::where('content', 'Занимаешься чем-то еще, дополнительно или с репетитором?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Иностранный язык',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Русский язык',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Математика',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Физика',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Химия',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Обществознание',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Развитие личности',
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

        $question = Question::where('content', 'Твои любимые предметы в школе...')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Русский язык',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Иностранный язык',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Физика',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Физкультура',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Математика',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Информатика',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Черчение',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Химия',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Биология',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'География',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'История',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Обществознание',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Музыка',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'МХК',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Технология',
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


        $question = Question::where('content', 'Какой у тебя средний балл?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '2,5',
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
                'title' => '3,5',
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
                'title' => '4,5',
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
        ]);

        $question = Question::where('content', 'У тебя есть опыт трудовой деятельность?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Пока нет опыта, но я хочу',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Пока нет опыта, и не стремлюсь получить',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Да, есть опыт работы',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Расскажи, в какой сфере, какой именно опыт имеешь?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Волонтер',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Вожатый',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Ведение соц сетей',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Дизайн',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Уход за животными',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Мероприятия',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Помощь родителям',
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
                'title' => 'Экология',
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
    }

    private function initAnswersImageOnTheFuture()
    {
        $question = Question::where('content', 'Определился с экзаменами для ЕГЭ?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Нет',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Да',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Какие будешь сдавать экзамены?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Русский язык',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Иностранный язык',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Физика',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Физкультура',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Математика',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Информатика',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Черчение',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Химия',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Биология',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'География',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'История',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Обществознание',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Музыка',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'МХК',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Технология',
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


        $question = Question::where('content', 'Какое будущее видишь для себя идеальным? Выбери 2 варианта:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Остаться в родном городе и стать востребованным специалистом',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Уехать в мегаполис / столицу и сделать там карьеру',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Стать предпринимателем, создать что-то свое / новое',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Продолжить семейный бизнес',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Продолжить семейную династию в нашем городе',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Я не знаю, все слишком сложно',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Что тебе больше подходит?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Работать по найму, иметь гарантии, стабильность и четкий график',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Создать свой бизнес, брать риски и нести ответственность',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Какова вероятность, что ты останешься строить карьеру (любую) в родном городе')->firstOrFail();
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


        $question = Question::where('content', 'У тебя есть особенности здоровья, ограничивающие поступление на желаемые специальности? Укажи, в каких сферах')->firstOrFail();
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


        $question = Question::where('content', 'Какими качествами себя охарактеризуешь? Выбери 7 основных')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Активный (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Веселый (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Внимательный (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Дисциплинированный (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Думающий (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Исполнительный (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Конструктивный (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Критичный (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Лидер',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Ленивый (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Надежный (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Не конфликтный (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Ответственный (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Покладистый (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Пассивный (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Самостоятельный (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Смышленый (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Серьезный (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Талантливый (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Трудолюбивый (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Терпеливый (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Упорный (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Целеустремленный (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Хозяйственный (ая)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Какие из этих утверждений про тебя?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Довожу начатое до конца',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Не жду напоминаний',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Разбираюсь в тонкостях',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '«С руками»',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => '«Не боюсь запачкать руки для дела»',
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


        //

        $question = Question::where('content', 'Выберите четыре главных характеристики современного человека, он должен быть:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Культурным, образованным',
                'answerable_type' => PersonCharacteristic::class,
                'answerable_id' => PersonCharacteristic::where('title', 'Уровень культуры и образования')->firstOrFail()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Добросовестным, дисциплинированным специалистом',
                'answerable_type' => PersonCharacteristic::class,
                'answerable_id' => PersonCharacteristic::where('title', 'Добросовестность, дисциплинированность')->firstOrFail()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Владеющим цифровыми технологиями',
                'answerable_type' => PersonCharacteristic::class,
                'answerable_id' => PersonCharacteristic::where('title', 'Владение цифровыми технологиями')->firstOrFail()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Способным создать крепкую семью',
                'answerable_type' => PersonCharacteristic::class,
                'answerable_id' => PersonCharacteristic::where('title', 'Стремление создать крепкую семью')->firstOrFail()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Добивающимся своей цели по жизни',
                'answerable_type' => PersonCharacteristic::class,
                'answerable_id' => PersonCharacteristic::where('title', 'Достижение нужного результата')->firstOrFail()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Творческим, квалифицированным специалистом',
                'answerable_type' => PersonCharacteristic::class,
                'answerable_id' => PersonCharacteristic::where('title', 'Творчество, квалификация')->firstOrFail()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Принципиальным, не идущим на компромиссы',
                'answerable_type' => PersonCharacteristic::class,
                'answerable_id' => PersonCharacteristic::where('title', 'Принципиальность')->firstOrFail()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Критически мыслящим, ответственным',
                'answerable_type' => PersonCharacteristic::class,
                'answerable_id' => PersonCharacteristic::where('title', 'Критическое мышление, ответственность')->firstOrFail()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Способным обеспечить свое благосостояние',
                'answerable_type' => PersonCharacteristic::class,
                'answerable_id' => PersonCharacteristic::where('title', 'Стремление обеспечить свое благосостояние')->firstOrFail()->id,
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

        $question = Question::where('content', 'Какой 1 из предложенных девизов ярче отражает твой жизненный подход, настрой:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Бороться и искать, найти и не сдаваться!',
                'answerable_type' => LifeMottoAndInterpretation::class,
                'answerable_id' => LifeMottoAndInterpretation::where('title', 'Бороться и искать, найти и не сдаваться!')->firstOrFail()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Всегда вперед!',
                'answerable_type' => LifeMottoAndInterpretation::class,
                'answerable_id' => LifeMottoAndInterpretation::where('title', 'Всегда вперед!')->firstOrFail()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Спешу делать добро!',
                'answerable_type' => LifeMottoAndInterpretation::class,
                'answerable_id' => LifeMottoAndInterpretation::where('title', 'Спешу делать добро!')->firstOrFail()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Оставь после себя хорошее!',
                'answerable_type' => LifeMottoAndInterpretation::class,
                'answerable_id' => LifeMottoAndInterpretation::where('title', 'Оставь после себя хорошее!')->firstOrFail()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Век живи, век учись!',
                'answerable_type' => LifeMottoAndInterpretation::class,
                'answerable_id' => LifeMottoAndInterpretation::where('title', 'Век живи, век учись!')->firstOrFail()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Счастье – это дело судьбы, ума и характера!',
                'answerable_type' => LifeMottoAndInterpretation::class,
                'answerable_id' => LifeMottoAndInterpretation::where('title', 'Счастье – это дело судьбы, ума и характера!')->firstOrFail()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Наслаждайся жизнью!',
                'answerable_type' => LifeMottoAndInterpretation::class,
                'answerable_id' => LifeMottoAndInterpretation::where('title', 'Наслаждайся жизнью!')->firstOrFail()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Ищи место под солнцем!',
                'answerable_type' => LifeMottoAndInterpretation::class,
                'answerable_id' => LifeMottoAndInterpretation::where('title', 'Ищи место под солнцем!')->firstOrFail()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Свой вариант',
            'type' => 'text',
            'is_arbitrary' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question = Question::where('content', 'Если бы тебе предложили вести блог в интернете, на какую тему подготовишь материал для своих подписчиков?')->firstOrFail();
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Ответ',
            'type' => 'text',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question = Question::where('content', 'Если бы у тебя был миллион, как им распорядишься?')->firstOrFail();
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Ответ',
            'type' => 'text',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question = Question::where('content', 'Кем ты хочешь работать? (Если уже знаешь, если нет - не пиши).')->firstOrFail();
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Ответ',
            'type' => 'text',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question = Question::where('content', 'Кем ты точно не станешь работать?')->firstOrFail();
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Ответ',
            'type' => 'text',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $question = Question::where('content', 'Почему?')->firstOrFail();
        DB::table('answers')->insert([
            'uuid' => Str::uuid(),
            'question_id' => $question->id,
            'title' => 'Ответ',
            'type' => 'text',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function initAnswersMotivesOfChoice()
    {
        $question = Question::where('content', 'Что тебе важно иметь в будущей деятельности? Выбери 7 главных ценностей, что направят твой выбор:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Создание и обеспечение семьи',
                'value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Рост по карьерной лестнице',
                'value' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Стабильность',
                'value' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Свобода',
                'value' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Найм, гарантии',
                'value' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Развитие своего бизнеса',
                'value' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Самовыражение',
                'value' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Работа по инструкции',
                'value' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Самореализация',
                'value' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Доход',
                'value' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Самостоятельное принятие решений',
                'value' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Взаимодействие с людьми',
                'value' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Творческая деятельность',
                'value' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Полезность моих результатов',
                'value' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Перспективность',
                'value' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Общение с друзьями',
                'value' => 16,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Работа в команде единомышленников',
                'value' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Помощь людям',
                'value' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Признание',
                'value' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Высокий социальный статус',
                'value' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Бескорыстная забота о благополучии других',
                'value' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Свободный график',
                'value' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Уверенность в завтрашнем дне',
                'value' => 23,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'На что ты обратишь внимание при выборе работы? Выбери 5 факторов:')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Престижная организация',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Интересная работа',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Простая и легкая работа',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Работать на новой технике',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Много путешествовать',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Возможность сделать карьеру',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Соответствие содержания работы полученной квалификации',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Комфортные условия труда',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Большая зарплата',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Возможность развивать способности',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Изобретать, исследовать',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Свободный режим работы',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Одобрение родителей',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Возможность общения в коллективе единомышленников',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Принимать руководящие решения',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Создавать вещи своими руками',
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


        $question = Question::where('content', 'Выдели определяющие факторы в выборе специальности?')->firstOrFail();
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
                'title' => 'Соответствие моим способностям и интересам ',
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

        $question = Question::where('content', 'Как ты относишься к идее заключения договора целевого обучения с работодателем - этот вариант подходит для тех, кто хочет получать гарантированную стипендию и после окончания обучения готов отработать 3 года по полученной специальности?')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Это идеальный вариант для меня!',
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
                'title' => 'Не рассматриваю',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Пока не знаю подходящий вариант, но мне интересно',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Тебе интересно получать предложения от работодателей об экскурсиях, подготовительных курсах, целевом обучении, стажировках?')->firstOrFail();
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

    private function initAnswersWillingnessToChoose()
    {
        $question = Question::where('content', 'Ты уже выбрал(а) будущую профессию')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Да',
                'value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Нет',
                'value' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Ты изучаешь информацию в интернете, связанную с будущей профессией')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Да',
                'value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Нет',
                'value' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Тебе известны противопоказания для избранной профессии')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Да',
                'value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Нет',
                'value' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Ты развиваешь профессионально значимые качества для выбранной деятельности')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Да',
                'value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Нет',
                'value' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Ты знаешь о проблемах в будущей профессии')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Да',
                'value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Нет',
                'value' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'У тебя есть опыт деятельности, близкой к будущей профессии')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Да',
                'value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Нет',
                'value' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Ты знаешь об условиях поступления в образовательную организацию')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Да',
                'value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Нет',
                'value' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Тебе известно о возможностях трудоустройства по избираемой профессии')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Да',
                'value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Нет',
                'value' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Ты знаешь о возможностях заработка в избираемой профессии')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Да',
                'value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Нет',
                'value' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $question = Question::where('content', 'Если не поступишь в желаемую образовательную организацию, то попытаешься еще раз')->firstOrFail();
        DB::table('answers')->insert([
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Да',
                'value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'question_id' => $question->id,
                'title' => 'Нет',
                'value' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
