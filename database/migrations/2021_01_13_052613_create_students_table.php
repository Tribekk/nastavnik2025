<?php

use Domain\User\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('user_id');
            $table->boolean('proposed_admission')->nullable()->default(false);
            $table->boolean('applied_admission')->nullable()->default(false);
            $table->boolean('enrolled_profile_uz')->nullable()->default(false);
            $table->boolean('concluded_target_agreement')->nullable()->default(false);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });

        User::query()->students()->chunk(100, function ($users) {
            foreach ($users as $user) {
                $user->student()->create(['uuid' => Str::uuid()]);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
