<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('slug');
            $table->string('title');
            $table->text('description');
            $table->integer('minutes')->nullable();
            $table->timestamps();
        });

        DB::table('quizzes')->insert([
            array(
                'uuid' => Str::uuid(),
                'slug' => 'traits',
                'title' => 'Особенности характера',
                'description' => '<div class="font-weight-bold">Прочитай утверждения,</div>
                                    <div class="font-weight-bold">оцени их по отношению к себе и ответь, соответственно:</div>
                                    <ul class="list-unstyled">
                                        <li><span class="font-weight-bold">Да,</span> если это точно про тебя</li>
                                        <li><span class="font-weight-bold">Нет,</span> если вообще не про тебя</li>
                                        <li><span class="font-weight-bold">Иногда,</span> если сомневаешься, или проявляется не всегда</li>
                                    </ul>',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'uuid' => Str::uuid(),
                'slug' => 'interests',
                'title' => 'Интересы',
                'description' => '<div class="font-weight-bold">Эти вопросы о твоём отношении к различной деятельности</div>
                                    <div>Кликай на все те круги, с которыми ты согласен и где указаны близкие тебе направления</div>',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
}
