<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AddStudentQuestionnaireToQuizzesTable extends Migration
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
            'slug' => 'student-questionnaire',
            'title' => 'Анкета студента',
            'type' => 'form',
            'description' => '<p class="text-dark">Привет, в этом блоке нам важно познакомиться, чтобы лучше понимать друг друга </p>
                <h3 class="font-weight-bold text-dark mb-5">Этот сервис поможет тебе разобраться в себе и получить подходящие предложения по обучению и
                будущей карьере</h3><p class="text-dark mt-4">Но сначала заполни свой профиль и пройди увлекательные тесты</p>
                <p class="text-dark mt-4">Ты в игре?</p>',
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
        DB::table('quizzes')->where('slug', 'student-questionnaire')->delete();
    }
}
