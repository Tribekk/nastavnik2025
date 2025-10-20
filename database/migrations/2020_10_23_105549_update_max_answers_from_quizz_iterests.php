<?php

use Domain\Quiz\Models\Quiz;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateMaxAnswersFromQuizzIterests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $quiz = Quiz::where('slug', 'interests')->firstOrFail();
        DB::table('questions')->where('quiz_id', $quiz->id)->update([
            'required' => 0,
            'min_answers' => 0,
            'max_answers' => 5,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
