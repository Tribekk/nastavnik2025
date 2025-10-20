<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClassProfileToSchoolClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('school_classes', function (Blueprint $table) {
            $table->unsignedBigInteger('profile_id')->after('letter')->nullable();
            $table->string('arbitrary_profile_title')->after('profile_id')->nullable();

            $table->foreign('profile_id', 'profile_id_foreign')
                ->references('id')
                ->on('class_profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('school_classes', function (Blueprint $table) {
            $table->dropForeign('profile_id_foreign');
            $table->dropColumn(['profile_id', 'arbitrary_profile_title']);
        });
    }
}
