<?php

use Domain\Event\Models\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateEventHasDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_has_directions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('direction_id');
            $table->timestamps();

            $table->foreign('event_id')
                ->references('id')
                ->on('events');

            $table->foreign('direction_id')
                ->references('id')
                ->on('event_directions');
        });

        Event::query()->chunk(100, function ($events) {
            foreach ($events as $event) {
                $event->directions()->create([
                    'uuid' => Str::uuid(),
                    'direction_id' => $event->direction_id,
                ]);
            }
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['direction_id']);
            $table->dropColumn(['direction_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedBigInteger('direction_id');
        });

        Event::query()->chunk(100, function ($events) {
            foreach ($events as $event) {
                $direction =  $event->directions()->first();
                $event->update([
                    'direction_id' => $direction->direction_id,
                ]);
            }
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('direction_id')
                ->references('id')
                ->on('event_directions');
        });

        Schema::dropIfExists('event_has_directions');
    }
}
