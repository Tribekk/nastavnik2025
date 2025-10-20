<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionsColumnsToExternalOrgunitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('external_orgunits', function (Blueprint $table) {
            $table->longText('career_program')->nullable();
            $table->longText('about_orgunit')->nullable();
            $table->longText('contacts')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('external_orgunits', function (Blueprint $table) {
            $table->dropColumn(['career_program', 'about_orgunit', 'contacts']);
        });
    }
}
