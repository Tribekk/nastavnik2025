<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationResultValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultation_result_values', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('result_id');
            $table->unsignedBigInteger('type_id');
            $table->text('comment')->nullable();
            $table->text('comment_for_result')->nullable();
            $table->string('conformity_type')->nullable();
            $table->timestamps();

            $table->foreign('result_id')
                ->references('id')
                ->on('consultation_results')
                ->onDelete('cascade');

            $table->foreign('type_id')
                ->references('id')
                ->on('consultation_result_types')
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
        Schema::dropIfExists('consultation_result_values');
    }
}
