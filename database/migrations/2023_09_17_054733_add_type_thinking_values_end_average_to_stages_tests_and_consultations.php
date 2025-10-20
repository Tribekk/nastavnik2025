<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeThinkingValuesEndAverageToStagesTestsAndConsultations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stages_tests_and_consultations', function (Blueprint $table) {
            $table->decimal('type_thinking_values_end_average', 8, 2)->nullable();
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
            $table->dropColumn('type_thinking_values_end_average');
        });
    }
}
