<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterTraitResultValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_trait_result_values', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->uuid('uuid');
            $table->unsignedBigInteger('trait_result_id');
            $table->unsignedBigInteger('trait_id');
            $table->string('title');
            $table->boolean('is_higher');
            $table->integer('percentage');
            $table->integer('chart_percentage');
            $table->text('description');

            $table->foreign('trait_result_id')
                ->references('id')
                ->on('character_trait_results')
                ->onDelete('cascade');

            $table->foreign('trait_id')
                ->references('id')
                ->on('character_traits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_trait_result_values');
    }
}
