<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommunicationTypeToConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->enum('communication_type', ['zoom', 'skype', 'whatsapp', 'irrelevant'])->after('link_zoom')->nullable()->default('zoom');
            $table->renameColumn('link_zoom', 'communication_type_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->renameColumn('communication_type_value', 'link_zoom');
            $table->dropColumn('communication_type');
        });
    }
}
