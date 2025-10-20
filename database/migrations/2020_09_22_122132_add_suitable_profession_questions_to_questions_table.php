<?php

declare(strict_types=1);

use Carbon\Carbon;
use Domain\Quiz\Models\ActivityKind;
use Domain\Quiz\Models\ActivityObject;
use Domain\Quiz\Models\QuestionType;
use Domain\Quiz\Models\Quiz;
use Illuminate\Database\Migrations\Migration;

class AddSuitableProfessionQuestionsToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $type = QuestionType::where('code', 'radio')->firstOrFail();
        $quiz = Quiz::where('slug', 'suitable-professions')->firstOrFail();

        DB::table('questions')->insert([
            [
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Какой объект деятельности тебя привлекает?',
                'questionable_id' => 1,
                'questionable_type' => ActivityObject::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $type->id,
                'quiz_id' => $quiz->id,
                'content' => 'Какой вид деятельности тебя привлекает?',
                'questionable_id' => 1,
                'questionable_type' => ActivityKind::class,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $newQuestions = [
            'Какой объект деятельности тебя привлекает?',
            'Какой вид деятельности тебя привлекает?',
        ];

        DB::table('questions')->whereIn('content', $newQuestions)->delete();
    }
}
