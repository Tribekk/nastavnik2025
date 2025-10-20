<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimeColumnsToConsultantsAppointmentTimeIntervalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consultants_appointment_time_intervals', function (Blueprint $table) {
            $table->time('start_at')->after('uuid');
            $table->time('finish_at')->after('start_at');

            $table->index('start_at');
            $table->index('finish_at');
        });

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '08.00 – 09.30')
            ->update([
                'start_at' => Carbon::createFromTime(8, 0)->toTimeString(),
                'finish_at' => Carbon::createFromTime(9, 30)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '08.30 – 10.00')
            ->update([
                'start_at' => Carbon::createFromTime(8, 30)->toTimeString(),
                'finish_at' => Carbon::createFromTime(10, 0)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '09.00 – 10.30')
            ->update([
                'start_at' => Carbon::createFromTime(9, 0)->toTimeString(),
                'finish_at' => Carbon::createFromTime(10, 30)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '09.30 – 11.00')
            ->update([
                'start_at' => Carbon::createFromTime(9, 30)->toTimeString(),
                'finish_at' => Carbon::createFromTime(11, 0)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '10.00 – 11.30')
            ->update([
                'start_at' => Carbon::createFromTime(10, 0)->toTimeString(),
                'finish_at' => Carbon::createFromTime(11, 30)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '10.30 – 12.00')
            ->update([
                'start_at' => Carbon::createFromTime(10, 30)->toTimeString(),
                'finish_at' => Carbon::createFromTime(12, 0)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '11.00 – 12.30')
            ->update([
                'start_at' => Carbon::createFromTime(11, 0)->toTimeString(),
                'finish_at' => Carbon::createFromTime(12, 30)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '11.30 – 13.00')
            ->update([
                'start_at' => Carbon::createFromTime(11, 30)->toTimeString(),
                'finish_at' => Carbon::createFromTime(13, 0)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '12.00 – 13.30')
            ->update([
                'start_at' => Carbon::createFromTime(12, 0)->toTimeString(),
                'finish_at' => Carbon::createFromTime(13, 30)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '12.30 – 14.00')
            ->update([
                'start_at' => Carbon::createFromTime(12, 30)->toTimeString(),
                'finish_at' => Carbon::createFromTime(14, 0)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '13.00 – 14.30')
            ->update([
                'start_at' => Carbon::createFromTime(13, 0)->toTimeString(),
                'finish_at' => Carbon::createFromTime(14, 30)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '13.30 – 15.00')
            ->update([
                'start_at' => Carbon::createFromTime(13, 30)->toTimeString(),
                'finish_at' => Carbon::createFromTime(15, 0)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '14.00 – 15.30')
            ->update([
                'start_at' => Carbon::createFromTime(14, 0)->toTimeString(),
                'finish_at' => Carbon::createFromTime(15, 30)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '14.30 – 16.00')
            ->update([
                'start_at' => Carbon::createFromTime(14, 30)->toTimeString(),
                'finish_at' => Carbon::createFromTime(16, 0)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '15.00 – 16.30')
            ->update([
                'start_at' => Carbon::createFromTime(15, 0)->toTimeString(),
                'finish_at' => Carbon::createFromTime(16, 30)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '15.30 – 17.00')
            ->update([
                'start_at' => Carbon::createFromTime(15, 30)->toTimeString(),
                'finish_at' => Carbon::createFromTime(17, 0)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '16.00 – 17.30')
            ->update([
                'start_at' => Carbon::createFromTime(16, 0)->toTimeString(),
                'finish_at' => Carbon::createFromTime(17, 30)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '16.30 – 18.00')
            ->update([
                'start_at' => Carbon::createFromTime(16, 30)->toTimeString(),
                'finish_at' => Carbon::createFromTime(18, 0)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '17.00 – 18.30')
            ->update([
                'start_at' => Carbon::createFromTime(17, 0)->toTimeString(),
                'finish_at' => Carbon::createFromTime(18, 30)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '17.30 – 19.00')
            ->update([
                'start_at' => Carbon::createFromTime(17, 30)->toTimeString(),
                'finish_at' => Carbon::createFromTime(19, 0)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '18.00 – 19.30')
            ->update([
                'start_at' => Carbon::createFromTime(18, 0)->toTimeString(),
                'finish_at' => Carbon::createFromTime(19, 30)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '18.30 – 20.00')
            ->update([
                'start_at' => Carbon::createFromTime(18, 30)->toTimeString(),
                'finish_at' => Carbon::createFromTime(20, 0)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '19.00 – 20.30')
            ->update([
                'start_at' => Carbon::createFromTime(19, 0)->toTimeString(),
                'finish_at' => Carbon::createFromTime(20, 30)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '19.30 – 21.00')
            ->update([
                'start_at' => Carbon::createFromTime(19, 30)->toTimeString(),
                'finish_at' => Carbon::createFromTime(21, 0)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '20.00 – 21.30')
            ->update([
                'start_at' => Carbon::createFromTime(20, 0)->toTimeString(),
                'finish_at' => Carbon::createFromTime(21, 30)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '20.30 – 22.00')
            ->update([
                'start_at' => Carbon::createFromTime(20, 30)->toTimeString(),
                'finish_at' => Carbon::createFromTime(22, 0)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '21.00 – 22.30')
            ->update([
                'start_at' => Carbon::createFromTime(21, 0)->toTimeString(),
                'finish_at' => Carbon::createFromTime(22, 30)->toTimeString(),
            ]);

        DB::table('consultants_appointment_time_intervals')
            ->where('title', '21.30 – 23.00')
            ->update([
                'start_at' => Carbon::createFromTime(21, 30)->toTimeString(),
                'finish_at' => Carbon::createFromTime(23, 0)->toTimeString(),
            ]);

        Schema::table('consultants_appointment_time_intervals', function (Blueprint $table) {
            $table->dropIndex(['title']);
            $table->dropColumn(['title']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultants_appointment_time_intervals', function (Blueprint $table) {
            $table->dropIndex(['start_at']);
            $table->dropIndex(['finish_at']);
            $table->dropColumn(['start_at', 'finish_at']);

            $table->string('title');
            $table->index('title');
        });
    }
}
