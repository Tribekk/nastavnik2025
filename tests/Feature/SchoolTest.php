<?php

namespace Tests\Feature;

use Domain\Admin\Models\School;
use Domain\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SchoolTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function canCreateSchool()
    {
        $school = factory(School::class)->create();

        $this->assertDatabaseHas('schools', ['uuid' => $school->uuid]);
    }

    /** @test */
    public function adminHasSchoolsMenuItem()
    {
        $user = factory(User::class)->create();

        $user->admin()->create();

        $response = $this->actingAs($user);

        $response
            ->get(route('dashboard'))
            ->assertSuccessful()
            ->assertSee('Школы')
            ->assertSee('la la-school');
    }

    /** @test */
    public function nonAdminDoesntHasSchoolsMenuItem()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user);

        $response
            ->get(route('dashboard'))
            ->assertSuccessful()
            ->assertDontSee('Школы')
            ->assertDontSee('la la-school');
    }

    /** @test */
    public function adminCanViewSchoolList()
    {
        $user = factory(User::class)->create();

        $user->admin()->create();

        $response = $this->actingAs($user);

        $response
            ->get(route('admin.schools.view'))
            ->assertSuccessful()
            ->assertSee('Школы')
            ->assertSee('Новая компания');
    }

}
