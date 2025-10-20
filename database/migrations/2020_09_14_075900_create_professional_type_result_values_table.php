<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalTypeResultValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_type_result_values', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('result_id');
            $table->unsignedBigInteger('type_id');
            $table->integer('value');
            $table->timestamps();

            $table->foreign('result_id')
                ->references('id')
                ->on('professional_type_results')
                ->onDelete('cascade');

            $table->foreign('type_id')
                ->references('id')
                ->on('professional_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professional_type_result_values');
    }
}
