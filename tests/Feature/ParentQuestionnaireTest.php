<?php

namespace Tests\Feature;

use Domain\Kladr\Models\Kladr;
use Domain\Quiz\Actions\FillAnswerQuizQuestions;
use Domain\Quiz\Actions\StoreParentQuestionnaireResult;
use Domain\Quiz\Models\AvailableQuiz;
use Domain\Quiz\Models\Quiz;
use Domain\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ParentQuestionnaireTest extends TestCase
{
    use RefreshDatabase;

    protected FillAnswerQuizQuestions $fillAnswerQuizQuestions;
    protected StoreParentQuestionnaireResult $storeParentQuestionnaireResult;

    public function setUp(): void
    {
        parent::setUp();
        $this->fillAnswerQuizQuestions = $this->app->make(FillAnswerQuizQuestions::class);
        $this->storeParentQuestionnaireResult = $this->app->make(StoreParentQuestionnaireResult::class);
    }

    /** @test */
    public function canStoreResult()
    {
        Kladr::create([
           'name' => 'Город',
           'socr' => 'г',
           'code' => '900000',
           'index' => 's',
           'uno' => 's',
           'gninmb' => '2',
           'okatd' => '12',
           'status' => 1,
        ]);

        // Сделать ответы для пользователя
        $quiz = Quiz::where('slug', 'parent-questionnaire')->first();
        $this->assertNotNull($quiz);

        $user = factory(User::class)->create(['email_verified_at' => now()]);

        $this->fillAnswerQuizQuestions->run($user, $quiz);

        $result = $this->storeParentQuestionnaireResult->run($user);
        $this->assertDatabaseHas('parent_questionnaire_results', ['uuid' => $result->uuid]);

        $resultValue = $result->values->random();
        $this->assertDatabaseHas('parent_questionnaire_result_values', ['uuid' => $resultValue->uuid]);


        $availableQuizId = $user->availableQuizzes->where('quiz_id', $quiz->id)->first()->id;

        // проверка входа на страницу результатов
        $this->actingAs($user)
            ->get("/quiz/{$availableQuizId}/result")
            ->assertSuccessful();
    }
}
