<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStreetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('street', function (Blueprint $table) {
            $table->string('name');
            $table->string('socr');
            $table->string('code');
            $table->string('index')->nullable();
            $table->string('gnimb')->nullable();
            $table->string('uno')->nullable();
            $table->string('ocatd')->nullable();

            $table->index('name');
            $table->index('socr');
            $table->index('ocatd');
            $table->index('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('street');
    }
}
