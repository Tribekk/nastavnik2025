<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Domain\User\Actions\AddAvailableQuizzesAction;
use Domain\User\Catalogs\BaseUserRole\StudentRoleCatalogItem;
use Domain\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuizWorkFlowTest extends TestCase
{
    use RefreshDatabase;

    protected AddAvailableQuizzesAction $addAvailableQuizzesAction;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->addAvailableQuizzesAction = app()->make(AddAvailableQuizzesAction::class);
    }

    /** @test */
    public function userCanStartQuiz()
    {
        // Создать пользователя
        $user = factory(User::class)->create([
            'email_verified_at' => Carbon::now(),
        ]);

        // Назначить ему тесты
        $this->addAvailableQuizzesAction->run($user, new StudentRoleCatalogItem);

        $this->assertDatabaseHas('available_quizzes', [
            'quiz_id' => '1', 'user_id' => $user->id
        ]);

        // Проверить, что тесты доступны
        $response = $this->actingAs($user)
            ->get(route('quiz.view'));

        $response
            ->assertSee('Особенности характера')
            ->assertSee('Интересы')
            ->assertSee('Подходящие профессии');
    }
}
