<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexedToResultsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('character_trait_results', function (Blueprint $table) {
            $table->index(['created_at']);
        });

        Schema::table('professional_type_results', function (Blueprint $table) {
            $table->index(['created_at']);
        });

        Schema::table('suitable_profession_results', function (Blueprint $table) {
            $table->index(['created_at']);
        });

        Schema::table('available_quizzes', function (Blueprint $table) {
            $table->index(['finished_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('results_tables', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
        });

        Schema::table('professional_type_results', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
        });

        Schema::table('suitable_profession_results', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
        });

        Schema::table('available_quizzes', function (Blueprint $table) {
            $table->dropIndex(['finished_at']);
        });
    }
}
