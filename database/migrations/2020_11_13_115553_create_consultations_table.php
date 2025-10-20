<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('consultant_id');
            $table->unsignedBigInteger('parent_id');
            $table->unsignedBigInteger('child_id');
            $table->unsignedBigInteger('appointment_id');

            $table->boolean('with_child')->nullable()->default(false);
            $table->boolean('personal_communication_parent')->nullable()->default(false);
            $table->boolean('personal_communication_child')->nullable()->default(false);
            $table->boolean('separation_during_consultation')->nullable()->default(false);
            $table->text('wishes_and_questions')->nullable();

            $table->boolean('confirmed')->nullable()->default(false);
            $table->string('link_zoom')->nullable();
            $table->timestamps();

            $table->foreign('consultant_id')
                ->references('id')
                ->on('users');

            $table->foreign('parent_id')
                ->references('id')
                ->on('users');


            $table->foreign('child_id')
                ->references('id')
                ->on('users');

            $table->foreign('appointment_id', 'appointment_id_foreign')
                ->references('id')
                ->on('consultant_appointment_intervals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}
