<?php

use Illuminate\Database\Migrations\Migration;

class AddSelectCityToQuestionTypesTable extends Migration
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
            'code' => 'select_city',
            'title' => 'Выбор города',
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
            ->where('code', 'select_city')
            ->delete();
    }
}
