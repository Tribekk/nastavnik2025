<?php

use Domain\Consultant\Models\ConsultantsAppointmentTimeInterval;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateConsultantsAppointmentTimeIntervalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultants_appointment_time_intervals', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('title');
            $table->timestamps();

            $table->index(['title']);
        });

        DB::table('consultants_appointment_time_intervals')->insert([
            ['uuid' => Str::uuid(), 'title' => '08.00 – 09.30', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '08.30 – 10.00', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '09.00 – 10.30', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '09.30 – 11.00', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '10.00 – 11.30', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '10.30 – 12.00', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '11.00 – 12.30', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '11.30 – 13.00', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '12.00 – 13.30', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '12.30 – 14.00', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '13.00 – 14.30', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '13.30 – 15.00', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '14.00 – 15.30', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '14.30 – 16.00', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '15.00 – 16.30', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '15.30 – 17.00', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '16.00 – 17.30', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '16.30 – 18.00', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '17.00 – 18.30', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '17.30 – 19.00', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '18.00 – 19.30', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '18.30 – 20.00', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '19.00 – 20.30', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '19.30 – 21.00', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '20.00 – 21.30', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '20.30 – 22.00', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '21.00 – 22.30', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'title' => '21.30 – 23.00', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultants_appointment_time_intervals');
    }
}
