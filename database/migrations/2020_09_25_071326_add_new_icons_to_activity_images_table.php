<?php

use Domain\Quiz\Models\ActivityKind;
use Illuminate\Database\Migrations\Migration;

class AddNewIconsToActivityImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('activity_images')
            ->where([
                'activable_type' => ActivityKind::class,
                'activable_id' => 3,
                'selected' => false,
            ])
            ->update([
                'filename' => '20icon.svg',
            ]);

        DB::table('activity_images')
            ->where([
                'activable_type' => ActivityKind::class,
                'activable_id' => 3,
                'selected' => true,
            ])
            ->update([
                'filename' => '20-1icon.svg',
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('activity_images')
            ->where([
                'activable_type' => ActivityKind::class,
                'activable_id' => 3,
                'selected' => false,
            ])
            ->update([
                'filename' => '',
            ]);

        DB::table('activity_images')
            ->where([
                'activable_type' => ActivityKind::class,
                'activable_id' => 3,
                'selected' => true,
            ])
            ->update([
                'filename' => '',
            ]);
    }
}
