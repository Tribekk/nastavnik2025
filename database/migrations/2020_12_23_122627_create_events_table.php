<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('direction_id');
            $table->unsignedBigInteger('format_id');
            $table->unsignedBigInteger('orgunit_id');
            $table->string('title');
            $table->timestamp('start_at')->nullable();
            $table->timestamp('finish_at')->nullable();
            $table->longText('program')->nullable();
            $table->string('state');
            $table->timestamps();

            $table->foreign('direction_id')
                ->references('id')
                ->on('event_directions');

            $table->foreign('format_id')
                ->references('id')
                ->on('event_formats');

            $table->foreign('orgunit_id')
                ->references('id')
                ->on('external_orgunits');

            $table->index('title');
            $table->index('start_at');
            $table->index('finish_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
