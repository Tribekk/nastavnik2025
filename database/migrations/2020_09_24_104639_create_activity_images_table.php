<?php

use Domain\Quiz\Models\ActivityKind;
use Domain\Quiz\Models\ActivityObject;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_images', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->boolean('selected');
            $table->morphs('activable');
        });

        // Добавить иконки для объектов деятельности
        DB::table('activity_images')->insert([
            [
                'filename' => '1icon.svg',
                'selected' => false,
                'activable_id' => 1,
                'activable_type' => ActivityObject::class,
            ],
            [
                'filename' => '1-1icon.svg',
                'selected' => true,
                'activable_id' => 1,
                'activable_type' => ActivityObject::class,
            ],
            [
                'filename' => '2icon.svg',
                'selected' => false,
                'activable_id' => 2,
                'activable_type' => ActivityObject::class,
            ],
            [
                'filename' => '2-1icon.svg',
                'selected' => true,
                'activable_id' => 2,
                'activable_type' => ActivityObject::class,
            ],
            [
                'filename' => '3icon.svg',
                'selected' => false,
                'activable_id' => 3,
                'activable_type' => ActivityObject::class,
            ],
            [
                'filename' => '3-1icon.svg',
                'selected' => true,
                'activable_id' => 3,
                'activable_type' => ActivityObject::class,
            ],
            [
                'filename' => '6icon.svg',
                'selected' => false,
                'activable_id' => 4,
                'activable_type' => ActivityObject::class,
            ],
            [
                'filename' => '6-1icon.svg',
                'selected' => true,
                'activable_id' => 4,
                'activable_type' => ActivityObject::class,
            ],
            [
                'filename' => '7icon.svg',
                'selected' => false,
                'activable_id' => 5,
                'activable_type' => ActivityObject::class,
            ],
            [
                'filename' => '7-1icon.svg',
                'selected' => true,
                'activable_id' => 5,
                'activable_type' => ActivityObject::class,
            ],
            [
                'filename' => '10icon.svg',
                'selected' => false,
                'activable_id' => 6,
                'activable_type' => ActivityObject::class,
            ],
            [
                'filename' => '10-1icon.svg',
                'selected' => true,
                'activable_id' => 6,
                'activable_type' => ActivityObject::class,
            ],
            [
                'filename' => '8icon.svg',
                'selected' => false,
                'activable_id' => 7,
                'activable_type' => ActivityObject::class,
            ],
            [
                'filename' => '8-1icon.svg',
                'selected' => true,
                'activable_id' => 7,
                'activable_type' => ActivityObject::class,
            ],
            [
                'filename' => '9icon.svg',
                'selected' => false,
                'activable_id' => 8,
                'activable_type' => ActivityObject::class,
            ],
            [
                'filename' => '9-1icon.svg',
                'selected' => true,
                'activable_id' => 8,
                'activable_type' => ActivityObject::class,
            ],
            [
                'filename' => '5icon.svg',
                'selected' => false,
                'activable_id' => 9,
                'activable_type' => ActivityObject::class,
            ],
            [
                'filename' => '5-1icon.svg',
                'selected' => true,
                'activable_id' => 9,
                'activable_type' => ActivityObject::class,
            ],
            [
                'filename' => '4icon.svg',
                'selected' => false,
                'activable_id' => 10,
                'activable_type' => ActivityObject::class,
            ],
            [
                'filename' => '4-1icon.svg',
                'selected' => true,
                'activable_id' => 10,
                'activable_type' => ActivityObject::class,
            ],
        ]);

        // Добавить иконки для видов деятельности
        DB::table('activity_images')->insert([
            [
                'filename' => '14icon.svg',
                'selected' => false,
                'activable_id' => 1,
                'activable_type' => ActivityKind::class,
            ],
            [
                'filename' => '14-1icon.svg',
                'selected' => true,
                'activable_id' => 1,
                'activable_type' => ActivityKind::class,
            ],
            [
                'filename' => '12icon.svg',
                'selected' => false,
                'activable_id' => 2,
                'activable_type' => ActivityKind::class,
            ],
            [
                'filename' => '12-1icon.svg',
                'selected' => true,
                'activable_id' => 2,
                'activable_type' => ActivityKind::class,
            ],
            [
                'filename' => '',
                'selected' => false,
                'activable_id' => 3,
                'activable_type' => ActivityKind::class,
            ],
            [
                'filename' => '',
                'selected' => true,
                'activable_id' => 3,
                'activable_type' => ActivityKind::class,
            ],
            [
                'filename' => '11icon.svg',
                'selected' => false,
                'activable_id' => 4,
                'activable_type' => ActivityKind::class,
            ],
            [
                'filename' => '11-1icon.svg',
                'selected' => true,
                'activable_id' => 4,
                'activable_type' => ActivityKind::class,
            ],
            [
                'filename' => '13icon.svg',
                'selected' => false,
                'activable_id' => 5,
                'activable_type' => ActivityKind::class,
            ],
            [
                'filename' => '13-1icon.svg',
                'selected' => true,
                'activable_id' => 5,
                'activable_type' => ActivityKind::class,
            ],
            [
                'filename' => '19icon.svg',
                'selected' => false,
                'activable_id' => 6,
                'activable_type' => ActivityKind::class,
            ],
            [
                'filename' => '19-1icon.svg',
                'selected' => true,
                'activable_id' => 6,
                'activable_type' => ActivityKind::class,
            ],
            [
                'filename' => '17icon.svg',
                'selected' => false,
                'activable_id' => 7,
                'activable_type' => ActivityKind::class,
            ],
            [
                'filename' => '17-1icon.svg',
                'selected' => true,
                'activable_id' => 7,
                'activable_type' => ActivityKind::class,
            ],
            [
                'filename' => '18icon.svg',
                'selected' => false,
                'activable_id' => 8,
                'activable_type' => ActivityKind::class,
            ],
            [
                'filename' => '18-1icon.svg',
                'selected' => true,
                'activable_id' => 8,
                'activable_type' => ActivityKind::class,
            ],
            [
                'filename' => '15icon.svg',
                'selected' => false,
                'activable_id' => 9,
                'activable_type' => ActivityKind::class,
            ],
            [
                'filename' => '15-1icon.svg',
                'selected' => true,
                'activable_id' => 9,
                'activable_type' => ActivityKind::class,
            ],
            [
                'filename' => '16icon.svg',
                'selected' => false,
                'activable_id' => 10,
                'activable_type' => ActivityKind::class,
            ],
            [
                'filename' => '16-1icon.svg',
                'selected' => true,
                'activable_id' => 10,
                'activable_type' => ActivityKind::class,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_images');
    }
}
