<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolClassCuratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_class_curators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('curator_id');
            $table->timestamps();

            $table->unique(['school_id', 'class_id', 'curator_id']);

            $table->foreign('school_id')
                ->references('id')
                ->on('schools');

            $table->foreign('class_id')
                ->references('id')
                ->on('school_classes');

            $table->foreign('curator_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_class_curators');
    }
}
