<?php

use Domain\Quiz\Models\ActivityKind;
use Domain\Quiz\Models\ActivityObject;
use Domain\Quiz\Models\Question;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->text('description')->nullable()->after('content');
        });

        $activityObjectQuestion = Question::query()
            ->where('questionable_type', ActivityObject::class)
            ->first();

        $activityKindQuestion = Question::query()
            ->where('questionable_type', ActivityKind::class)
            ->first();

        $activityObjectQuestion->update([
            'description' => '<div class="font-weight-bold">С кем или с чем хотелось бы работать?</div>
                              <div>Выбери только 1</div>',
        ]);

        $activityKindQuestion->update([
            'description' => '<div class="font-weight-bold">Чем бы хотелось заниматься?</div>
                              <div>Выбери только 1</div>',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
}
