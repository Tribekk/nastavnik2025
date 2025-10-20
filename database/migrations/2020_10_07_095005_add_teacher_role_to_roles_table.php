<?php

use Illuminate\Database\Migrations\Migration;

class AddTeacherRoleToRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('roles')->insert([
            [
                'guard_name' => 'web',
                'name' => 'teacher',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'guard_name' => 'web',
                'name' => 'curator',
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
        DB::table('roles')->whereIn('name', ['teacher', 'curator'])->delete();
    }
}
