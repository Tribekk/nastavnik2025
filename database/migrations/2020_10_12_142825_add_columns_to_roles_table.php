<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddColumnsToRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->string('title')->after('guard_name')->nullable();
            $table->string('description')->after('title')->nullable();
        });

        DB::table('roles')->where('name', 'curator')->update([
            'title' => 'Куратор',
        ]);

        DB::table('roles')->where('name', 'teacher')->update([
            'title' => 'Учитель',
        ]);

        DB::table('roles')->where('name', 'parent')->update([
            'title' => 'Родитель',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn(['title', 'description']);
        });
    }
}
