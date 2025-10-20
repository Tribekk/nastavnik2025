<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateSituationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('situations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('title');
            $table->string('content');
            $table->timestamps();
        });

        DB::table('situations')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'Ситуация 1',
                'content' => 'Определяет готовность отвечать за свои действия, добросовестно относиться к работе',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Ситуация 2',
                'content' => 'Характеризует готовность действовать в затруднительной ситуации',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Ситуация 3',
                'content' => 'Характеризует  социальную активность, тенденцию к заниженной или завышенной самооценке',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Ситуация 4',
                'content' => 'Характеризует  конфликтность, умение решать сложные ситуации',
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
        Schema::dropIfExists('situations');
    }
}
