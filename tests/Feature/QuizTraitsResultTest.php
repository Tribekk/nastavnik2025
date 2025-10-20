<?php

namespace Tests\Feature;

use App\Quiz\Wrappers\CharacterTraitResultWrapper;
use Domain\Quiz\Actions\FillAnswerQuizQuestions;
use Domain\Quiz\Actions\CalculateCharacterTraitAnswersReliability;
use Domain\Quiz\Actions\CalculateCharacterTraitValues;
use Domain\Quiz\Actions\StoreCharacterTraitResult;
use Domain\Quiz\Models\Answer;
use Domain\Quiz\Models\AvailableQuiz;
use Domain\Quiz\Models\CharacterTrait;
use Domain\Quiz\Models\CharacterTraitResult;
use Domain\Quiz\Models\CharacterTraitResultValue;
use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\UserAnswer;
use Domain\Quiz\States\Quiz\FinishedConsultationState;
use Domain\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Str;
use Tests\TestCase;

class QuizTraitsResultTest extends TestCase
{
    use RefreshDatabase;

    protected CalculateCharacterTraitValues $characterTraitValuesCalculator;

    protected CalculateCharacterTraitAnswersReliability $unreliabilityCalculator;

    protected CharacterTraitResultWrapper $characterTraitWrapper;

    protected FillAnswerQuizQuestions $fillAnswerQuizQuestions;

    protected StoreCharacterTraitResult $storeCharacterTraitResult;

    public function setUp(): void
    {
        parent::setUp();

        $this->characterTraitValuesCalculator = $this->app->make(CalculateCharacterTraitValues::class);

        $this->unreliabilityCalculator = $this->app->make(CalculateCharacterTraitAnswersReliability::class);

        $this->characterTraitWrapper = $this->app->make(CharacterTraitResultWrapper::class);

        $this->fillAnswerQuizQuestions = $this->app->make(FillAnswerQuizQuestions::class);

        $this->storeCharacterTraitResult = $this->app->make(StoreCharacterTraitResult::class);
    }

    /** @test */
    public function canCreateTraitsQuizResultsAndValues()
    {
        $result = factory(CharacterTraitResult::class)->create();

        $this->assertDatabaseHas('character_trait_results', ['uuid' => $result->uuid]);

        $values = factory(CharacterTraitResultValue::class, 10)->create();
        $this->assertDatabaseHas('character_trait_result_values', ['id' => $values->random()->id]);
    }

    /** @test */
    public function canCalculateResults()
    {
        // Сделать ответы для пользователя
        $quiz = Quiz::where('slug', 'traits')->first();
        $this->assertNotNull($quiz);

        $user = factory(User::class)->create();

        $this->fillAnswerQuizQuestions->run($user, $quiz);

        $traitResult = $this->storeCharacterTraitResult->run($user);
        $this->assertDatabaseHas('character_trait_results', ['uuid' => $traitResult->uuid]);

        $traitResultValue = $traitResult->values->random();
        $this->assertDatabaseHas('character_trait_result_values', ['uuid' => $traitResultValue->uuid]);
    }

    /** @test */
    public function canSeeResultsPage()
    {
        // Сделать ответы для пользователя
        $quiz = Quiz::where('slug', 'traits')->first();
        $this->assertNotNull($quiz);

        $user = factory(User::class)->create(['email_verified_at' => now()]);

        $this->fillAnswerQuizQuestions->run($user, $quiz);

        $this->storeCharacterTraitResult->run($user);

        $availableQuizId = $user->availableQuizzes->where('quiz_id', $quiz->id)->first()->id;

        // проверка входа на страницу результатов
        $this->actingAs($user)
            ->get("/quiz/{$availableQuizId}/result")
            ->assertSuccessful();

        $trait = CharacterTrait::inRandomOrder()->first();
        $this->assertNotNull($trait);

        // проверка входа на страницу детального результата
        $this->actingAs($user)
            ->get("/quiz/{$availableQuizId}/result/trait-details/{$trait->id}")
            ->assertSuccessful();
    }
}
