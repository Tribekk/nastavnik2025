<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesToStagesTestsAndConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stages_tests_and_consultations', function (Blueprint $table) {
            $table->index('school');
            $table->index('class');
            $table->index('full_name');
            $table->index('parent__full_name');
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
            $table->dropIndex(['school', 'class']);
        });
    }
}
