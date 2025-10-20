<?php

use Domain\Orgunit\Models\ExternalOrgunit;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateOrgunitHasActivityKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orgunit_has_activity_kinds', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('orgunit_id');
            $table->unsignedBigInteger('activity_kind_id');
            $table->timestamps();

            $table->foreign('orgunit_id')
                ->references('id')
                ->on('external_orgunits');

            $table->foreign('activity_kind_id')
                ->references('id')
                ->on('external_orgunit_activity_kinds');
        });

        ExternalOrgunit::query()->chunk(100, function ($orgunits) {
            foreach ($orgunits as $orgunit) {
                $orgunit->activityKinds()->create([
                    'uuid' => Str::uuid(),
                    'activity_kind_id' => $orgunit->activity_kind_id,
                ]);
            }
        });

        Schema::table('external_orgunits', function (Blueprint $table) {
            $table->dropForeign(['activity_kind_id']);
            $table->dropColumn(['activity_kind_id']);
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
            $table->unsignedBigInteger('activity_kind_id');
        });

        ExternalOrgunit::query()->chunk(100, function ($orgunits) {
            foreach ($orgunits as $orgunit) {
                $kind =  $orgunit->activityKinds()->first();
                $orgunit->update([
                    'activity_kind_id' => $kind->activity_kind_id,
                ]);
            }
        });

        Schema::table('external_orgunits', function (Blueprint $table) {
            $table->foreign('activity_kind_id')
                ->references('id')
                ->on('external_orgunit_activity_kinds');
        });

        Schema::dropIfExists('orgunit_has_activity_kinds');
    }
}
