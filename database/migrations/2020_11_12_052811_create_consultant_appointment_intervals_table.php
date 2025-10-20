<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultantAppointmentIntervalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultant_appointment_intervals', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('consultant_id');
            $table->unsignedBigInteger('time_interval_id');
            $table->string('date_at', 20);
            $table->timestamps();

            $table->foreign('consultant_id')
                ->references('id')
                ->on('users');

            $table->foreign('time_interval_id')
                ->references('id')
                ->on('consultants_appointment_time_intervals');

            $table->index('date_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultant_appointment_intervals');
    }
}
