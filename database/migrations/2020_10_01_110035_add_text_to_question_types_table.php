<?php

use Illuminate\Database\Migrations\Migration;

class AddTextToQuestionTypesTable extends Migration
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
            'code' => 'text',
            'title' => 'Произвольный текст',
            'updated_at' => now(),
            'created_at' => now(),
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
            ->where('code', 'text')
            ->delete();
    }
}
