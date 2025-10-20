<?php

declare(strict_types=1);

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;

class AddSuitableProfessionsQuizToQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('quizzes')->insert([
            [
                'uuid' => Str::uuid(),
                'slug' => 'suitable-professions',
                'title' => 'Подходящие профессии',
                'description' => '<div class="font-weight-bold">Эта методика для уточнения твоего выбора сферы и вида деятельности</div>
                                    <div>Выбери по одному объекту из каждого блока</div>',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
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
        DB::table('quizzes')->where('slug', 'suitable-professions')->delete();
    }
}
