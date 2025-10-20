<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntelligenceLevelResultValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intelligence_level_result_values', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('result_id');
            $table->unsignedBigInteger('type_id');
            $table->integer('value');
            $table->integer('percentage');
            $table->timestamps();

            $table->foreign('result_id')
                ->references('id')
                ->on('intelligence_level_results')
                ->onDelete('cascade');

            $table->foreign('type_id')
                ->references('id')
                ->on('intelligence_level_types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intelligence_level_result_values');
    }
}
