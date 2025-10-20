<?php

use Illuminate\Database\Migrations\Migration;

class AddParentQuestionnaireQuizToQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('quizzes')->insert([
            'uuid' => Str::uuid(),
            'slug' => 'parent-questionnaire',
            'title' => 'Анкета родителя',
            'description' => '<div class="font-weight-bold h1">Общая информация о вас и видение будущего ребенка</div>
                <div>Добрый день, спасибо за доверие и регистрацию на платформе!</div><br>
                <div>Этот сервис поможет в самоопределении ребенка, а в личном кабинете можно изучать его профиль и
                получать подходящие предложения по обучению и будущей карьере</div>
                <div>Чтобы дать Вашему ребенку подходящие рекомендации, важно учесть Ваше мнение</div><br>
                <div class="font-weight-bold">Заполните короткую форму с базовыми характеристиками и мы будем отправлять актуальные предложения
                по обучению и стажировкам для Вашего ребенка</div>',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('quizzes')->where('slug', 'parent_questionnaire')->delete();
    }
}
