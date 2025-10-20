<?php

use Illuminate\Database\Migrations\Migration;

class AddCheckboxToQuestionTypesTable extends Migration
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
            'code' => 'checkbox',
            'title' => 'Чекбокс',
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
            ->where('code', 'checkbox')
            ->delete();
    }
}
