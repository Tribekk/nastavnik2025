<?php

use Domain\Quiz\Models\ProfessionalType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateProfessionalTypeImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_type_images', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('type_id');
            $table->string('filename');
            $table->boolean('active')->nullable()->default(false);
            $table->timestamps();

            $table->foreign('type_id')
                ->references('id')
                ->on('professional_types')
                ->onDelete('cascade');
        });

        $type = ProfessionalType::where('title', 'Физико–математический тип')->firstOrFail();
        DB::table('professional_type_images')
            ->insert([
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '2prof.svg', 'active' => false],
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '2-1prof.svg', 'active' => true],
            ]);

        $type = ProfessionalType::where('title', 'Химико-биологический тип')->firstOrFail();
        DB::table('professional_type_images')
            ->insert([
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '6prof.svg', 'active' => false],
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '6-1prof.svg', 'active' => true],
            ]);

        $type = ProfessionalType::where('title', 'Социально-экономический тип')->firstOrFail();
        DB::table('professional_type_images')
            ->insert([
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '10prof.svg', 'active' => false],
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '10-1prof.svg', 'active' => true],
            ]);

        $type = ProfessionalType::where('title', 'Политический тип')->firstOrFail();
        DB::table('professional_type_images')
            ->insert([
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '11prof.svg', 'active' => false],
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '11-1prof.svg', 'active' => true],
            ]);

        $type = ProfessionalType::where('title', 'Филологический тип')->firstOrFail();
        DB::table('professional_type_images')
            ->insert([
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '4prof.svg', 'active' => false],
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '4-1prof.svg', 'active' => true],
            ]);

        $type = ProfessionalType::where('title', 'Гуманитарный тип')->firstOrFail();
        DB::table('professional_type_images')
            ->insert([
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '1prof.svg', 'active' => false],
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '1-1prof.svg', 'active' => true],
            ]);

        $type = ProfessionalType::where('title', 'Художественно-эстетический тип')->firstOrFail();
        DB::table('professional_type_images')
            ->insert([
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '8prof.svg', 'active' => false],
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '8-1prof.svg', 'active' => true],
            ]);

        $type = ProfessionalType::where('title', 'Цифровой тип')->firstOrFail();
        DB::table('professional_type_images')
            ->insert([
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '5prof.svg', 'active' => false],
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '5-1prof.svg', 'active' => true],
            ]);

        $type = ProfessionalType::where('title', 'Естественнонаучный тип')->firstOrFail();
        DB::table('professional_type_images')
            ->insert([
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '3prof.svg', 'active' => false],
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '3-1prof.svg', 'active' => true],
            ]);

        $type = ProfessionalType::where('title', 'Технологический тип')->firstOrFail();
        DB::table('professional_type_images')
            ->insert([
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '7prof.svg', 'active' => false],
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '7-1prof.svg', 'active' => true],
            ]);

        $type = ProfessionalType::where('title', 'Оборонно-спортивный тип')->firstOrFail();
        DB::table('professional_type_images')
            ->insert([
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '9prof.svg', 'active' => false],
                ['uuid' => Str::uuid(), 'type_id' => $type->id, 'filename' => '9-1prof.svg', 'active' => true],
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professional_type_images');
    }
}
