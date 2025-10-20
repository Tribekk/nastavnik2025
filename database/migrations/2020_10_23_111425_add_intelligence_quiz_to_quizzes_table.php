<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddIntelligenceQuizToQuizzesTable extends Migration
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
            'slug' => 'intelligence-level',
            'title' => 'Общий уровень интеллекта',
            'description' => '<div class="font-size-h4">Тебе будут предложены простые задания, пиши или выбирай правильный ответ</div>
                <div class="font-size-h4 font-weight-bold">Выполняй последовательно<br>Желательно не пользоваться калькулятором</div>',
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
        DB::table('quizzes')->where('slug', 'intelligence-level')->delete();
    }
}
