<?php

use Domain\Admin\Models\TypeEducationalOrganization;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesOfEducationalOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types_of_educational_organization', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('code')->nullable();
            $table->string('title');
            $table->string('short_title')->nullable();
            $table->timestamps();
        });

        DB::table('types_of_educational_organization')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'Лицей',
                'short_title' => 'Л',
                'code' => 'lyceum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Школа',
                'short_title' => 'Ш',
                'code' => 'school',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Гимназия',
                'short_title' => 'Г',
                'code' => 'gymnasium',
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
        Schema::dropIfExists('types_of_educational_organization');
    }
}
