<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEventColumnsToStagesTestsAndConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stages_tests_and_consultations', function (Blueprint $table) {
            $table->boolean('has_events')->nullable()->default(false);
            $table->boolean('has_visited_events')->nullable()->default(false);
            $table->boolean('count_events')->nullable()->default(0);
            $table->boolean('count_visited_events')->nullable()->default(0);
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
            $table->dropColumn(['has_events', 'has_visited_events', 'count_events', 'count_visited_events']);
        });
    }
}
