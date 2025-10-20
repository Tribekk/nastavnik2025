<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAreaToProfessionalTypesTable extends Migration
{

    public function up()
    {
        Schema::table('professional_types', function (Blueprint $table) {
            $table->string('area')->after('title')->default('');
        });

        DB::table('professional_types')
            ->where('title', 'Физико–математический тип')
            ->update(['area' => 'Физика, математика, инноватика']);

        DB::table('professional_types')
            ->where('title', 'Химико-биологический тип')
            ->update(['area' => 'Химия и биология']);

        DB::table('professional_types')
            ->where('title', 'Социально-экономический тип')
            ->update(['area' => 'Предпринимательство и управление']);

        DB::table('professional_types')
            ->where('title', 'Политический тип')
            ->update(['area' => 'История и политика']);

        DB::table('professional_types')
            ->where('title', 'Филологический тип')
            ->update(['area' => 'Языки и медиа']);

        DB::table('professional_types')
            ->where('title', 'Гуманитарный тип')
            ->update(['area' => 'Гуманитарные науки и медицина']);

        DB::table('professional_types')
            ->where('title', 'Художественно-эстетический тип')
            ->update(['area' => 'Творчество и искусство']);

        DB::table('professional_types')
            ->where('title', 'Цифровой тип')
            ->update(['area' => 'Цифровые и информационные технологии']);

        DB::table('professional_types')
            ->where('title', 'Естественнонаучный тип')
            ->update(['area' => 'Естественные науки и география']);

        DB::table('professional_types')
            ->where('title', 'Технологический тип')
            ->update(['area' => 'Техника, механизмы и конструирование']);

        DB::table('professional_types')
            ->where('title', 'Оборонно-спортивный тип')
            ->update(['area' => 'Спорт и военное дело']);
    }

    public function down()
    {
        Schema::table('professional_types', function (Blueprint $table) {
            $table->dropColumn('area');
        });
    }
}
