<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddYearToSchoolClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('school_classes', function (Blueprint $table) {
            $table->year('year')->nullable();
            $table->unique(['school_id', 'number', 'letter', 'year']);
            $table->dropUnique(['school_id', 'number', 'letter']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('school_classes', function (Blueprint $table) {
            $table->unique(['school_id', 'number', 'letter']);
            $table->dropUnique(['school_id', 'number', 'letter', 'year']);
            $table->dropColumn(['year']);
        });
    }
}
