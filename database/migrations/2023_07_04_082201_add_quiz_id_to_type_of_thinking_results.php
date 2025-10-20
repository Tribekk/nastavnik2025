<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuizIdToTypeOfThinkingResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('type_of_thinking_results', function (Blueprint $table) {
            $table->unsignedBigInteger('quiz_id')->nullable();
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
            $table->dropColumn('quiz_id');
        });
    }
}
