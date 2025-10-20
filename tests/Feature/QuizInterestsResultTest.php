<?php

namespace Tests\Feature;

use Domain\Quiz\Actions\CalculateProfessionalTypeAnswersReliability;
use Domain\Quiz\Actions\CalculateProfessionalTypeValues;
use Domain\Quiz\Models\Answer;
use Domain\Quiz\Models\ProfessionalType;
use Domain\Quiz\Models\ProfessionalTypeResult;
use Domain\Quiz\Models\ProfessionalTypeResultValue;
use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Str;
use Tests\TestCase;

class QuizInterestsResultTest extends TestCase
{
    use RefreshDatabase;

    protected CalculateProfessionalTypeValues $professionalTypeCalculator;

    protected CalculateProfessionalTypeAnswersReliability $unreliabilityCalculator;

    public function setUp(): void
    {
        parent::setUp();

        $this->professionalTypeCalculator = $this->app->make(CalculateProfessionalTypeValues::class);

        $this->unreliabilityCalculator = $this->app->make(CalculateProfessionalTypeAnswersReliability::class);
    }

    /** @test */
    public function canCreateInterestsQuizResultsAndValues()
    {
        $result = factory(ProfessionalTypeResult::class)->create();

        $this->assertDatabaseHas('professional_type_results', ['uuid' => $result->uuid]);

        $values = factory(ProfessionalTypeResultValue::class, 55)->create();

        $this->assertDatabaseHas('professional_type_result_values', ['uuid' => $values->random()->uuid]);
    }

    /** @test */
    public function canCalculateResults()
    {
        // Сделать ответы для пользователя
        $quiz = Quiz::where('slug', 'interests')->first();

        $this->assertNotNull($quiz);

        $questions = Question::where('quiz_id', $quiz->id)->get();

        $this->assertTrue($questions->count() > 0);

        $user = factory(User::class)->create();

        foreach ($questions as $question) {
            $uuid = Str::uuid();

            $answer = Answer::where('question_id', $question->id)->get()->random();

            $this->assertNotNull($answer);

            UserAnswer::create([
                'uuid' => $uuid,
                'user_id' => $user->id,
                'quiz_id' => $quiz->id,
                'question_id' => $question->id,
                'answer_id' => $answer->id
            ]);

            $this->assertDatabaseHas('user_answers', ['uuid' => $uuid]);
        }

        // Подсчитать результаты
        $values = $this->professionalTypeCalculator->run($user);

        $uuid = Str::uuid();

        $result = ProfessionalTypeResult::create([
            'uuid' => $uuid,
            'user_id' => $user->id,
            'reliability' => $this->unreliabilityCalculator->run($user)
        ]);

        $this->assertDatabaseHas('professional_type_results', ['uuid' => $uuid]);

        foreach($values as $key => $value) {
            $uuid = Str::uuid();

            $type = ProfessionalType::where('uuid', $key)->first();

            $this->assertNotNull($type);

            $typeValue = ProfessionalTypeResultValue::create([
                'uuid' => $uuid,
                'result_id' => $result->id,
                'type_id' => $type->id,
                'value' => $value
            ]);

            $this->assertDatabaseHas('professional_type_result_values', ['uuid' => $uuid]);
        }
    }
}
