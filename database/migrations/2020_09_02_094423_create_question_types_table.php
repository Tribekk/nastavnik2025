<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTypesTable extends Migration
{
    public function up()
    {
        Schema::create('question_types', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('code');
            $table->string('title');
            $table->timestamps();
        });

        DB::table('question_types')->insert([
            array(
                'uuid' => Str::uuid(),
                'code' => 'yns',
                'title' => 'Да/Нет/Иногда',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'uuid' => Str::uuid(),
                'code' => 'circle',
                'title' => 'Выбираемая опция (круг)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('question_types');
    }
}
