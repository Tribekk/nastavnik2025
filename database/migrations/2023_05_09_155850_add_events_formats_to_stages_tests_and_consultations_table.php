<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEventsFormatsToStagesTestsAndConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stages_tests_and_consultations', function (Blueprint $table) {
            $table->string('events_formats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stages_tests_and_consultations', function (Blueprint $table) {
            $table->dropColumn('events_formats');
        });
    }
}
