<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventAudienceMessageTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_audience_message_templates', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('audience_id');
            $table->string('title')->nullable();
            $table->text('message');
            $table->timestamps();

            $table->foreign('event_id')
                ->references('id')
                ->on('events');

            $table->foreign('audience_id')
                ->references('id')
                ->on('event_audience');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_audience_message_templates');
    }
}
