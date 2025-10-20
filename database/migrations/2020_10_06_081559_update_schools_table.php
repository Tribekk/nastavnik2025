<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function(Blueprint $table) {
            $table->unsignedBigInteger('type_of_educational_organization_id')->after('address');
            $table->unsignedBigInteger('loyalty_level_id')->after('type_of_educational_organization_id')->nullable();
            $table->integer('number')->after('loyalty_level_id');
            $table->string('director')->after('number')->nullable();
            $table->string('phone')->after('director')->nullable();
            $table->string('email')->after('phone')->nullable();

            $table->foreign('type_of_educational_organization_id')
                ->references('id')
                ->on('types_of_educational_organization');

            $table->foreign('loyalty_level_id')
                ->references('id')
                ->on('loyalty_levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('schools', function(Blueprint $table) {
            $table->dropForeign(['type_of_educational_organization_id', 'loyalty_level_id']);

            $table->dropColumn([
                'type_of_educational_organization_id',
                'loyalty_level_id',
                'number',
                'director',
                'phone',
                'email',
            ]);
        });
    }
}
