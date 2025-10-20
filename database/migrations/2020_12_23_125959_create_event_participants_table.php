<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_participants', function (Blueprint $table) {
            $table->id();

            $table->uuid('uuid');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('confirmed')->nullable()->default(false);
            $table->boolean('visited')->nullable()->default(false);
            $table->timestamps();

            $table->foreign('event_id')
                ->references('id')
                ->on('events');

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
        Schema::dropIfExists('event_participants');
    }
}
