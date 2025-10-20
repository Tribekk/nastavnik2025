<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetNullableCodesColumnsFromEventsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_audience', function (Blueprint $table) {
            $table->string('code')->nullable()->change();
        });

        Schema::table('event_directions', function (Blueprint $table) {
            $table->string('code')->nullable()->change();
        });

        Schema::table('event_formats', function (Blueprint $table) {
            $table->string('code')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_audience', function (Blueprint $table) {
            $table->string('code')->change();
        });

        Schema::table('event_directions', function (Blueprint $table) {
            $table->string('code')->change();
        });

        Schema::table('event_formats', function (Blueprint $table) {
            $table->string('code')->change();
        });
    }
}
