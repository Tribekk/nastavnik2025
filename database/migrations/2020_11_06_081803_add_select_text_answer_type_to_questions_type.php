<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AddSelectTextAnswerTypeToQuestionsType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('question_types')->insert([
            'uuid' => Str::uuid(),
            'code' => 'select_text_answer',
            'title' => 'Выбор текстового ответа',
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
        DB::table('question_types')
            ->where('code', 'select_text_answer')
            ->delete();
    }
}
