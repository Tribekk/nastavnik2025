<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('user_id');
            $table->string('events_attached_earlier')->nullable();
            $table->integer('effective')->nullable();
            $table->integer('intelligibility')->nullable()->default(5);
            $table->integer('interesting')->nullable()->default(5);
            $table->integer('elaboration')->nullable()->default(5);
            $table->integer('utility')->nullable()->default(5);
            $table->string('project_definition')->nullable();
            $table->integer('mark');
            $table->enum('emotion', ['smile', 'meh', 'frown']);
            $table->timestamps();

            $table->foreign('user_id')
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
        Schema::dropIfExists('feedback');
    }
}
