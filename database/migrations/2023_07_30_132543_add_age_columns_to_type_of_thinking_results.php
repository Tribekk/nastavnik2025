<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgeColumnsToTypeOfThinkingResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('type_of_thinking_results', function (Blueprint $table) {
            Schema::table('type_of_thinking_results', function (Blueprint $table) {
                $table->integer('age')->nullable()->after('user_id');
                $table->integer('age_all')->nullable()->after('age');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('type_of_thinking_results', function (Blueprint $table) {
            $table->dropColumn('age');
            $table->dropColumn('age_all');
        });
    }
}
