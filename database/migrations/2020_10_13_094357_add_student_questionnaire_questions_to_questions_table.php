<?php

use Domain\Quiz\Models\QuestionType;
use Domain\Quiz\Models\Quiz;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AddStudentQuestionnaireQuestionsToQuestionsTable extends Migration
{

    protected ?QuestionType $typeRadio;
    protected ?QuestionType $typeCheckbox;
    protected ?QuestionType $typeText;
    protected ?QuestionType $typeSelectCity;
    protected Quiz $quiz;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->typeRadio = QuestionType::where('code', 'radio')->firstOrFail();
        $this->typeCheckbox = QuestionType::where('code', 'checkbox')->firstOrFail();
        $this->typeText = QuestionType::where('code', 'text')->firstOrFail();
        $this->typeSelectCity = QuestionType::where('code', 'select_city')->firstOrFail();
        $this->quiz = Quiz::where('slug', 'student-questionnaire')->firstOrFail();

        // о тебе
        $this->initQuestionsAboutYou();

        // увлечения и успех
        $this->initQuestionsHobbyAndSuccess();

        // образ будущего
        $this->initQuestionsImageOnTheFuture();

        // мотивы выбора
        $this->initQuestionsMotivesOfChoice();

        // готовность к выбору
        $this->initQuestionsWillingnessToChoose();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        $this->quiz = Quiz::where('slug', 'student-questionnaire')->firstOrFail();
        DB::table('questions')->where('quiz_id', $this->quiz->id)->delete();
    }

    private function initQuestionsAboutYou()
    {
        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeSelectCity->id,
                'quiz_id' => $this->quiz->id,
                'section_title' => '1. О тебе',
                'section_caption' => 'Общие сведения',
                'content' => 'Город',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeText->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Вставь ссылку на свой профиль любимой соц. сети, будем там дружить:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeText->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Дата твоего рождения?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeText->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Если есть, укажи адрес электронной почты',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    private function initQuestionsHobbyAndSuccess()
    {
        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeCheckbox->id,
                'quiz_id' => $this->quiz->id,
                'section_title' => '2. Увлечения и успех',
                'content' => 'Чем увлекаешься?',
                'with_an_arbitrary_answer' => true,
                'min_answers' => 1,
                'max_answers' => 24,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Как давно?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Эта секция - твой выбор?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeCheckbox->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Занимаешься чем-то еще, дополнительно или с репетитором?',
                'with_an_arbitrary_answer' => true,
                'required' => false,
                'min_answers' => 0,
                'max_answers' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeCheckbox->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Твои любимые предметы в школе...',
                'with_an_arbitrary_answer' => true,
                'min_answers' => 1,
                'max_answers' => 16,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Какой у тебя средний балл?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'У тебя есть опыт трудовой деятельность?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeCheckbox->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Расскажи, в какой сфере, какой именно опыт имеешь?',
                'with_an_arbitrary_answer' => true,
                'min_answers' => 1,
                'max_answers' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    private function initQuestionsImageOnTheFuture()
    {
        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'section_title' => '3. Ораз будущего',
                'content' => 'Определился с экзаменами для ЕГЭ?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeCheckbox->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Какие будешь сдавать экзамены?',
                'min_answers' => 1,
                'max_answers' => 16,
                'with_an_arbitrary_answer' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeCheckbox->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Какое будущее видишь для себя идеальным? Выбери 2 варианта:',
                'min_answers' => 2,
                'max_answers' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Что тебе больше подходит?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Какова вероятность, что ты останешься строить карьеру (любую) в родном городе',
                'description' => '1: точно уеду, 5: пока не решил, 10: точно останусь',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeCheckbox->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'У тебя есть особенности здоровья, ограничивающие поступление на желаемые специальности? Укажи, в каких сферах',
                'required' => false,
                'min_answers' => 1,
                'max_answers' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeCheckbox->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Какими качествами себя охарактеризуешь? Выбери 7 основных',
                'min_answers' => 7,
                'max_answers' => 24,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeCheckbox->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Какие из этих утверждений про тебя?',
                'min_answers' => 1,
                'max_answers' => 6,
                'with_an_arbitrary_answer' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        //
        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeCheckbox->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Выберите четыре главных характеристики современного человека, он должен быть:',
                'min_answers' => 4,
                'max_answers' => 4,
                'with_an_arbitrary_answer' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        //
        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Какой 1 из предложенных девизов ярче отражает твой жизненный подход, настрой:',
                'with_an_arbitrary_answer' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeText->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Если бы тебе предложили вести блог в интернете, на какую тему подготовишь материал для своих подписчиков?',
                'required' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeText->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Если бы у тебя был миллион, как им распорядишься?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeText->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Кем ты хочешь работать? (Если уже знаешь, если нет - не пиши).',
                'required' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeText->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Кем ты точно не станешь работать?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeText->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Почему?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    private function initQuestionsMotivesOfChoice()
    {
        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeCheckbox->id,
                'quiz_id' => $this->quiz->id,
                'section_title' => '4. Мотивы выбора',
                'content' => 'Что тебе важно иметь в будущей деятельности? Выбери 7 главных ценностей, что направят твой выбор:',
                'min_answers' => 7,
                'max_answers' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeCheckbox->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'На что ты обратишь внимание при выборе работы? Выбери 5 факторов:',
                'min_answers' => 5,
                'max_answers' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeCheckbox->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Выдели определяющие факторы в выборе специальности?',
                'min_answers' => 1,
                'max_answers' => 13,
                'with_an_arbitrary_answer' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Как ты относишься к идее заключения договора целевого обучения с работодателем - этот вариант подходит для тех, кто хочет получать гарантированную стипендию и после окончания обучения готов отработать 3 года по полученной специальности?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Тебе интересно получать предложения от работодателей об экскурсиях, подготовительных курсах, целевом обучении, стажировках?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    private function initQuestionsWillingnessToChoose()
    {
        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'section_title' => '5. Готовность к выбору',
                'section_caption' => 'Инструкция: Прочитай утверждения, отметь «да», если согласен (согласна), «нет», если не согласен (не согласна)',
                'content' => 'Ты уже выбрал(а) будущую профессию',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Ты изучаешь информацию в интернете, связанную с будущей профессией',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Тебе известны противопоказания для избранной профессии',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Ты развиваешь профессионально значимые качества для выбранной деятельности',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Ты знаешь о проблемах в будущей профессии',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'У тебя есть опыт деятельности, близкой к будущей профессии',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Ты знаешь об условиях поступления в образовательную организацию',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Тебе известно о возможностях трудоустройства по избираемой профессии',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Ты знаешь о возможностях заработка в избираемой профессии',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $this->typeRadio->id,
                'quiz_id' => $this->quiz->id,
                'content' => 'Если не поступишь в желаемую образовательную организацию, то попытаешься еще раз',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
