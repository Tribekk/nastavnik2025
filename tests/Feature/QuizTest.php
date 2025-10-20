<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Domain\Quiz\Models\Quiz;
use Domain\User\Actions\AddAvailableQuizzesAction;
use Domain\User\Catalogs\BaseUserRole\StudentRoleCatalogItem;
use Domain\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @property string uuid
 */
class QuizTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function canCreateQuiz()
    {
        $quiz = factory(Quiz::class)->create();

        $this->assertDatabaseHas('quizzes', ['uuid' => $quiz->uuid]);
    }

    /** @test */
    public function userMustLoginToSeeQuizzes()
    {
        $response = $this->get('/quiz');

        $response->assertStatus(302);
    }

    /** @test */
    public function canOpenQuizzesPage()
    {
        $user = factory(User::class)->create();

        $action = new AddAvailableQuizzesAction();
        $action->run($user, new StudentRoleCatalogItem);

        $this->actingAs($user)
            ->get('/quiz')
            ->assertStatus(200);
    }
}
