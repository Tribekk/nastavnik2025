<?php

use Domain\Event\Models\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateEventHasAudienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_has_audience', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('audience_id');
            $table->timestamps();

            $table->foreign('event_id')
                ->references('id')
                ->on('events');

            $table->foreign('audience_id')
                ->references('id')
                ->on('event_audience');
        });

        Event::query()->chunk(100, function ($events) {
            foreach ($events as $event) {
                $event->directions()->create([
                    'uuid' => Str::uuid(),
                    'direction_id' => $event->direction_id,
                ]);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_has_audience');
    }
}
