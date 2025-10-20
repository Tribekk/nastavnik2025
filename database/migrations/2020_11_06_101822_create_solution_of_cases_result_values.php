<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionOfCasesResultValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solution_of_cases_result_values', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('result_id');
            $table->unsignedBigInteger('interpretation_id');
            $table->unsignedBigInteger('situation_id');
            $table->string('description')->nullable();
            $table->integer('situation_answer')->nullable()->default(1);
            $table->timestamps();

            $table->foreign('result_id')
                ->references('id')
                ->on('solution_of_cases_results')
                ->onDelete('cascade');

            $table->foreign('interpretation_id')
                ->references('id')
                ->on('situation_interpretations')
                ->onDelete('cascade');

            $table->foreign('situation_id')
                ->references('id')
                ->on('situations')
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
        Schema::dropIfExists('solution_of_cases_result_values');
    }
}
