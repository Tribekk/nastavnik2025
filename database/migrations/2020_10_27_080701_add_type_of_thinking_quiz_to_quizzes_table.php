<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddTypeOfThinkingQuizToQuizzesTable extends Migration
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
            'group' => 1,
            'slug' => 'type-of-thinking',
            'title' => 'Тип мышления',
            'description' => '<div class="font-size-h4 font-weight-bold">Прочитай высказывания</div>
                <div class="font-size-h4">Отметь да, если это утверждение про тебя, нет – если точно не о тебе</div>',
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
        DB::table('quizzes')->where('slug', 'type-of-thinking')->delete();
    }
}
