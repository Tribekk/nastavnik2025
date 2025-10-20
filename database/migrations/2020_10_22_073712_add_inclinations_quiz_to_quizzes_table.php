<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AddInclinationsQuizToQuizzesTable extends Migration
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
            'slug' => 'inclinations',
            'title' => 'Склонности',
            'description' => '<div class="font-size-h4">Тебе будут предложены высказывания из разных сфер, отнесись к ним,</div>
                <div class="font-size-h4 font-weight-bold">закончи предложение с точки зрения твоих ценностей и увлечений,
                выбери наиболее подходящий вариант: <span class="font-weight-normal">&laquo;а&raquo;,&nbsp;&laquo;б&raquo; или &laquo;в&raquo;</span></div>',
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
        DB::table('quizzes')->where('slug', 'inclinations')->delete();
    }
}
