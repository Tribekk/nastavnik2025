<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ChangeQuestionContentStudentQuestionnaire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('questions')
            ->where('content', 'Какой 1 из предложенных девизов ярче отражает твой жизненный подход, настрой:')
        ->update(['content' => 'Какой из предложенных девизов ярче отражает твой жизненный подход, настрой:']);


        DB::table('questions')
            ->where('content', 'Выберите четыре главных характеристики современного человека, он должен быть:')
            ->update(['content' => 'Выберите 4 главных характеристики современного человека, он должен быть:']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('questions')
            ->where('content', 'Какой из предложенных девизов ярче отражает твой жизненный подход, настрой:')
            ->update(['content' => 'Какой 1 из предложенных девизов ярче отражает твой жизненный подход, настрой:']);

        DB::table('questions')
            ->where('content', 'Выберите 4 главных характеристики современного человека, он должен быть:')
            ->update(['content' => 'Выберите четыре главных характеристики современного человека, он должен быть:']);
    }
}
