<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->index('state');
        });

        Schema::table('consultation_results', function (Blueprint $table) {
            $table->index('recommend');
            $table->index('agree');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->index('sex');
            $table->index('kladr_code');
            $table->index('birth_date');
        });

        Schema::table('school_classes', function (Blueprint $table) {
            $table->index('year');
            $table->index('students_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->dropIndex(['state']);
        });

        Schema::table('consultation_results', function (Blueprint $table) {
            $table->dropIndex(['recommend']);
            $table->dropIndex(['agree']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['sex']);
            $table->dropIndex(['kladr_code']);
            $table->dropIndex(['birth_date']);
        });

        Schema::table('school_classes', function (Blueprint $table) {
            $table->dropIndex(['year']);
            $table->dropIndex(['students_count']);
        });
    }
}
