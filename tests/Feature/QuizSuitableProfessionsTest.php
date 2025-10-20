<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Domain\Quiz\Actions\SwitchSuitableProfessionAnswers;
use Domain\Quiz\Models\ActivityKind;
use Domain\Quiz\Models\ActivityObject;
use Domain\Quiz\Models\Answer;
use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuizSuitableProfessionsTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    private SwitchSuitableProfessionAnswers $switcher;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create([
            'email_verified_at' => Carbon::now(),
        ]);

        $this->switcher = $this->app->make(SwitchSuitableProfessionAnswers::class);
    }

    public function testHasSuitableProfessionsQuiz()
    {
        $quiz = Quiz::where('slug', 'suitable-professions')->first();

        $this->assertNotNull($quiz);
    }

    public function testSwitchAnswerToActivityObjectQuestion()
    {
        $quiz = Quiz::where('slug', 'suitable-professions')->first();

        $question = Question::query()
            ->where('questionable_type', ActivityObject::class)
            ->first();

        $answer = Answer::query()
            ->where('answerable_type', ActivityObject::class)
            ->first();

        $this->switcher->run($this->user, $quiz, $question->id, $answer->id);

        $userAnswer = UserAnswer::query()
            ->where('user_id', $this->user->id)
            ->where('quiz_id', $quiz->id)
            ->where('question_id', $question->id)
            ->where('answer_id', $answer->id)
            ->first();

        $this->assertDatabaseHas('user_answers', ['uuid' => $userAnswer->uuid]);
    }

    public function testSwitchAnswerToActivityKindQuestion()
    {
        $quiz = Quiz::where('slug', 'suitable-professions')->first();

        $question = Question::query()
            ->where('questionable_type', ActivityKind::class)
            ->first();

        $answer = Answer::query()
            ->where('answerable_type', ActivityKind::class)
            ->first();

        $this->switcher->run($this->user, $quiz, $question->id, $answer->id);

        $userAnswer = UserAnswer::query()
            ->where('user_id', $this->user->id)
            ->where('quiz_id', $quiz->id)
            ->where('question_id', $question->id)
            ->where('answer_id', $answer->id)
            ->first();

        $this->assertDatabaseHas('user_answers', ['uuid' => $userAnswer->uuid]);
    }
}
