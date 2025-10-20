<?php

use Domain\Quiz\Models\TypeOfThinking;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FixTypeThinkingManifestation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $type = TypeOfThinking::where('short_title', 'П-Д')->first();
        DB::table('type_of_thinking_manifestations')
            ->where('type_id', $type->id)
            ->where('value_range', "3-4")
            ->update([
                'description' => 'Указывает на&nbsp;способность легко осваивать незнакомые инструкции, механизмы, знания и&nbsp;
                т.п. Человек дела овладевает технологией процесса&nbsp;&mdash; может качественно выполнить поставленную задачу.'
            ]);
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
