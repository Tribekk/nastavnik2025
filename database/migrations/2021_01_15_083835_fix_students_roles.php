<?php

use Domain\User\Models\Student;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FixStudentsRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $count = DB::table('roles')->where('name', 'student')->count();
        if(!$count) {
            DB::table('roles')->insert([
                'guard_name' => 'web',
                'name' => 'student',
                'title' => 'Учащийся',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Student::chunk(100, function ($students) {
                foreach ($students as $student) {
                    $student->user->assignRole('student');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
