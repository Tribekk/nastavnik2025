<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateQuestionableQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('questions', function (Blueprint $table) {
            $table->string('questionable_type')->nullable()->change();
            $table->unsignedBigInteger('questionable_id')->nullable()->change();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('questions', function (Blueprint $table) {
            $table->string('questionable_type')->change();
            $table->unsignedBigInteger('questionable_id')->change();
        });
        Schema::enableForeignKeyConstraints();
    }
}
