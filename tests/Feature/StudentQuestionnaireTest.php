<?php

namespace Tests\Feature;

use Domain\Kladr\Models\Kladr;
use Domain\Quiz\Actions\FillAnswerQuizQuestions;
use Domain\Quiz\Actions\StoreFactorMotiveOfChoiceResult;
use Domain\Quiz\Actions\StoreStudentQuestionnaireResult;
use Domain\Quiz\Models\Quiz;
use Domain\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentQuestionnaireTest extends TestCase
{
    use RefreshDatabase;

    protected FillAnswerQuizQuestions $fillAnswerQuizQuestions;
    protected StoreStudentQuestionnaireResult $storeStudentQuestionnaireResult;
    protected StoreFactorMotiveOfChoiceResult $storeFactorMotiveOfChoiceResult;

    public function setUp(): void
    {
        parent::setUp();
        $this->fillAnswerQuizQuestions = $this->app->make(FillAnswerQuizQuestions::class);
        $this->storeStudentQuestionnaireResult = $this->app->make(StoreStudentQuestionnaireResult::class);
        $this->storeFactorMotiveOfChoiceResult = $this->app->make(StoreFactorMotiveOfChoiceResult::class);
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
        $quiz = Quiz::where('slug', 'student-questionnaire')->first();
        $this->assertNotNull($quiz);

        $user = factory(User::class)->create(['email_verified_at' => now()]);

        $this->fillAnswerQuizQuestions->run($user, $quiz);

        $factors = $this->storeFactorMotiveOfChoiceResult->run($user);

        $result = $this->storeStudentQuestionnaireResult->run($user);
        $this->assertDatabaseHas('student_questionnaire_results', ['uuid' => $result->uuid]);

        $this->assertDatabaseHas('factor_motive_of_choice_results', ['uuid' => $factors->random()->uuid]);

        $resultValue = $result->values->random();
        $this->assertDatabaseHas('student_questionnaire_result_values', ['uuid' => $resultValue->uuid]);


        $availableQuizId = $user->availableQuizzes->where('quiz_id', $quiz->id)->first()->id;

        // проверка входа на страницу результатов
        $this->actingAs($user)
            ->get("/quiz/{$availableQuizId}/result")
            ->assertSuccessful();
    }
}
