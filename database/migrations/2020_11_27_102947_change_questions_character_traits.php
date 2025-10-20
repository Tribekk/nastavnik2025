<?php

use Domain\Quiz\Models\Question;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeQuestionsCharacterTraits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 25
        $question = Question::where('content', 'Думаю, что окружающие не считают меня эгоистом.')->firstOrFail();
        $question->update(['content' => 'Думаю, что окружающие считают меня внимательным к другим и бескорыстным.']);

        // 27
        $question = Question::where('content', 'Считаю, что характеристика «спокойный» - ко мне не подходит.')->firstOrFail();
        $question->update(['content' => 'Считаю, что мне подходит характеристика активный, энергичный.']);

        // 29
        $question = Question::where('content', 'Полагаю, что назвать ленивым меня нельзя.')->firstOrFail();
        $question->update(['content' => 'Меня можно назвать трудолюбивый, усердный.']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
