<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeOfThinkingResultValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_thinking_result_values', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('result_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('manifestation_id');
            $table->integer('value');
            $table->integer('percentage');
            $table->boolean('is_higher');
            $table->timestamps();

            $table->foreign('result_id')
                ->references('id')
                ->on('type_of_thinking_results')
                ->onDelete('cascade');

            $table->foreign('type_id')
                ->references('id')
                ->on('type_of_thinking')
                ->onDelete('cascade');

            $table->foreign('manifestation_id')
                ->references('id')
                ->on('type_of_thinking_manifestations')
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
        Schema::dropIfExists('type_of_thinking_result_values');
    }
}
