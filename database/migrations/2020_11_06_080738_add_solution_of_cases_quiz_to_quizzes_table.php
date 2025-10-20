<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddSolutionOfCasesQuizToQuizzesTable extends Migration
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
            'slug' => 'solution_of_cases',
            'group' => 1,
            'title' => 'Решение кейсов',
            'description' => '<div class="font-size-h4">Прочитай ситуацию, представь, как поступишь в подобном случае</div>
                <div class="font-size-h4 font-weight-bold">Выбери соответствующий вариант ответа</div>',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('quizzes')
            ->where('slug', 'solution_of_cases')
            ->delete();
    }
}
