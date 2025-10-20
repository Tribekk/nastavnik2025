<?php

use Domain\Quiz\Models\QuestionType;
use Domain\Quiz\Models\Quiz;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddInclinationsQuestionsToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $quiz = Quiz::where('slug', 'inclinations')->firstOrFail();
        $questionType = QuestionType::where('code', 'abv')->firstOrFail();
        DB::table('questions')->insert([
            [
               'uuid' => Str::uuid(),
               'type_id' => $questionType->id,
               'quiz_id' => $quiz->id,
               'content' => 'В своей профессиональной деятельности мне бы хотелось:',
               'created_at' => now(),
               'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'В книге или кинофильме меня больше всего привлекает:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Меня обрадует Нобелевская премия:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Я скорее соглашусь стать:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Будущее людей определяет:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Если я стану руководителем, то в первую очередь займусь:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'На технической выставке меня больше всего привлечет:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'В людях прежде всего я ценю:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'В свободное от работы время я буду:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'В заграничных поездках меня больше всего привлечет:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Мне интереснее беседовать:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Если бы в моей школе было всего три кружка, я выберу:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'В школе больше внимания следует уделять:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'С интересом изучаю информацию:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Мне было бы интереснее работать:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Школа в первую очередь должна:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Каждый человек должен:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Для благополучия общества в первую очередь необходима:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Мне больше всего нравятся уроки:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Мне интереснее было бы:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Я предпочитаю читать:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Свободное время я охотнее провожу:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Больший интерес у меня вызовет сообщение:',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'type_id' => $questionType->id,
                'quiz_id' => $quiz->id,
                'content' => 'Я предпочту работать:',
                'created_at' => now(),
                'updated_at' => now(),
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
        $quiz = Quiz::where('slug', 'inclinations')->firstOrFail();
        DB::table('questions')->where('quiz_id', $quiz->id)->delete();
    }
}
