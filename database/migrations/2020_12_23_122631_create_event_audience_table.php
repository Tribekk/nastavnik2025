<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class CreateEventAudienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_audience', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('code');
            $table->string('title');
            $table->timestamps();
        });

        DB::table('event_audience')->insert([
            ['uuid' => Str::uuid(), 'code' => 'student', 'title' => 'Учащиеся', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'code' => 'parent', 'title' => 'Родитель', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'code' => 'teachers', 'title' => 'Учителя', 'created_at' => now(), 'updated_at' => now()],
            ['uuid' => Str::uuid(), 'code' => 'staff', 'title' => 'Сотрудники', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_audience');
    }
}
