<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateIntelligenceLevelTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intelligence_level_types', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('title');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('intelligence_level_types')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'Уровень осведомленности и развития лингвистических способностей, навыки восприятия вербальной информации',
                'description' => 'характеризует качество гуманитарной образованности',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Уровень образованности в области точных наук, навыки восприятия числовой информации',
                'description' => 'отражаются на успешности решения задач на установление логических закономерностей и взаимосвязей между явлениями, объектами, предметами',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Уровень пространственной ориентации и абстрактно-логического мышления, навыки восприятия и работы с графической информацией',
                'description' => 'характеризует поиск и анализ диаграмм, закономерностей в структурных схемах (процессах)',
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
        Schema::dropIfExists('intelligence_level_types');
    }
}
