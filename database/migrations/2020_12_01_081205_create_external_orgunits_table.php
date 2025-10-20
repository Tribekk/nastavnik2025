<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternalOrgunitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_orgunits', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('short_title')->nullable();
            $table->unsignedBigInteger('logo_id')->nullable();
            $table->unsignedBigInteger('legal_form_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('activity_kind_id')->nullable();
            $table->string('legal_address')->nullable();
            $table->string('fact_address')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();

            $table->index('title');
            $table->index('short_title');
            $table->index('legal_address');
            $table->index('fact_address');

            $table->foreign('logo_id')
                ->references('id')
                ->on('images')
                ->onDelete('set null');

            $table->foreign('legal_form_id')
                ->references('id')
                ->on('legal_forms');

            $table->foreign('parent_id')
                ->references('id')
                ->on('external_orgunits')
                ->onDelete('set null');

            $table->foreign('activity_kind_id')
                ->references('id')
                ->on('external_orgunit_activity_kinds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('external_orgunits');
    }
}
