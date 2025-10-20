<?php

namespace Tests\Feature;

use Domain\Quiz\Models\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function canCreateQuestion()
    {
        $question = factory(Question::class)->create();

        $this->assertDatabaseHas('questions', ['uuid' => $question->uuid]);
    }
}
