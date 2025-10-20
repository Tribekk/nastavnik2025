<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddCaptionParentQuestionnaire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('quizzes')
            ->where('slug', 'parent-questionnaire')
            ->update(['caption' => 'Общая информация о вас и видение будущего ребенка']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('quizzes')
            ->where('slug', 'parent-questionnaire')
            ->delete();
    }
}
