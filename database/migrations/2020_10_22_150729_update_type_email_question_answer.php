<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateTypeEmailQuestionAnswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $questions = DB::table('questions')
            ->whereIn('content', ['Электронная почта', 'Если есть, укажи адрес электронной почты'])
            ->select(['id'])->get()->pluck('id');

        DB::table('answers')
            ->whereIn('question_id', $questions)
            ->update(['type' => 'email']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
