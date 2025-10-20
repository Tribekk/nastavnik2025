<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKladrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kladr', function (Blueprint $table) {
            $table->string('name', 40);
            $table->string('socr', 10);
            $table->char('code', 13)->primary();
            $table->char('index', 6);
            $table->string('gninmb', 4);
            $table->string('uno', 4);
            $table->string('okatd', 11);
            $table->integer('status', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kladr');
    }
}
