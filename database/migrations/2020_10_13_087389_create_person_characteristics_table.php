<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreatePersonCharacteristicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_characteristics', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });

        DB::table('person_characteristics')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'Уровень культуры и образования',
                'description' => 'Стремление к самосовершенствованию, образованию, познанию, открытость получению нового опыта, стремление к непрерывному саморазвитию.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Добросовестность, дисциплинированность',
                'description' => 'Четкое следование инструкции, пунктуальность, исполнительность.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Владение цифровыми технологиями',
                'description' => 'Понимание и владение новыми технологиями, следование трендам.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Стремление создать крепкую семью',
                'description' => 'Предпочтение семейным ценностям.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Достижение нужного результата',
                'description' => 'Целеустремленность, умение достигать цели с максимально качественным результатом.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Творчество, квалификация',
                'description' => 'Умение находить разные варианты решений, выбирать из них наиболее оптимальное, рациональное.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Принципиальность',
                'description' => 'Уверенность в себе, умение отстоять свою позицию.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Критическое мышление, ответственность',
                'description' => 'Умение провести анализ, брать ответственность за последствия принятого решения.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Стремление обеспечить свое благосостояние',
                'description' => 'Предприимчивость, трудолюбие, умение использовать возможности.',
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
        Schema::dropIfExists('person_characteristics');
    }
}
