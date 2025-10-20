<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeepTestItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deep_test_items', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->default('');
            $table->integer('user_profile_id');
            $table->integer('is_completed')->default(0);
            $table->integer('quiz_id');
            $table->text('control_values')->default('');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deep_test_items');
    }
}
