<?php

use Domain\Consultation\States\NotVerifiedConsultationState;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddColumnsToConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->string('state')->after('link_zoom');
            $table->dropColumn(['confirmed']);
        });

        DB::table('consultations')->update([
            'state' => NotVerifiedConsultationState::class,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->dropColumn(['state']);
            $table->boolean('confirmed')->after('link_zoom')->nullable()->default(false);
        });
    }
}
