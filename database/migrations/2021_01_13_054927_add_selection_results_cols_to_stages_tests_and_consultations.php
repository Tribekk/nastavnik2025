<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSelectionResultsColsToStagesTestsAndConsultations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stages_tests_and_consultations', function (Blueprint $table) {
            $table->boolean('proposed_admission')->nullable()->default(false);
            $table->boolean('applied_admission')->nullable()->default(false);
            $table->boolean('enrolled_profile_uz')->nullable()->default(false);
            $table->boolean('concluded_target_agreement')->nullable()->default(false);
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
            $table->dropColumn([
                'proposed_admission',
                'applied_admission',
                'enrolled_profile_uz',
                'concluded_target_agreement',
            ]);
        });
    }
}
