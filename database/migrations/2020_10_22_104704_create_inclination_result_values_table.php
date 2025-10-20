<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInclinationResultValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inclination_result_values', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('result_id');
            $table->unsignedBigInteger('inclination_id');
            $table->unsignedBigInteger('type_id');
            $table->boolean('is_higher');
            $table->integer('value');
            $table->integer('percentage');
            $table->timestamps();

            $table->foreign('result_id')
                ->references('id')
                ->on('inclination_results')
                ->onDelete('cascade');

            $table->foreign('inclination_id')
                ->references('id')
                ->on('inclinations')
                ->onDelete('cascade');

            $table->foreign('type_id')
                ->references('id')
                ->on('inclination_types')
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
        Schema::dropIfExists('inclination_result_values');
    }
}
