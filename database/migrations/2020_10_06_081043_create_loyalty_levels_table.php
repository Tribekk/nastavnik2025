<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoyaltyLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loyalty_levels', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('title');
            $table->string('short_title')->nullable();
            $table->string('code')->nullable();
            $table->timestamps();
        });

        DB::table('loyalty_levels')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'Подшефная',
                'short_title' => 'пш',
                'code' => 'sponsored',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Обычная',
                'short_title' => 'о',
                'code' => 'regular',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Неактивная',
                'short_title' => 'н/а',
                'code' => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
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
        Schema::dropIfExists('loyalty_levels');
    }
}
