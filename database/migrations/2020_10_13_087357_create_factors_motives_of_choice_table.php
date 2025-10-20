<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateFactorsMotivesOfChoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factors_motives_of_choice', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });

        DB::table('factors_motives_of_choice')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'Самореализация',
                'description' => 'Стремление человека реализовать свои способности, таланты, потенциал через определенную деятельность.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Заработок',
                'description' => 'Данный мотив указывает на стремление добиться финансовой независимости так называемое движение по "служебной лестнице".',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Карьера',
                'description' => 'Мотив выбирают люди, для которых в приоритете комфорт и удобство труда, уверенность в завтрашнем днем.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Альтруизм',
                'description' => 'Присущ человеку, склонному бескорыстно помогать другим людям и получающий от этого моральное удовлетворение.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Условия труда',
                'description' => 'Мотив выбирают люди, для которых в приоритете комфорт и удобство труда, уверенность в завтрашнем дне.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Самостоятельность',
                'description' => 'Мотив выбирают инициативные, критично мыслящие, с чувством личной ответственности за свою деятельность и поведение люди.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Общение',
                'description' => 'Такой человек ориентируется на достижение общего, а не личного результата, принимает активное участие в командных процессах, открыт к сотрудничеству и взаимопомощи.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Стабильность',
                'description' => 'Постоянство, выбирают люди, которые склонны прогнозировать события, риски, корректирует действия в соответствии с ними.',
                'created_at' => now(),
                'updated_at' => now(),
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('factors_motives_of_choice');
    }
}
