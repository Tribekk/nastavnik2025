<?php

namespace Tests\Feature;

use Domain\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function redirectToLoginIfGuest()
    {
        $response = $this->get('/');

        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function redirectToDashboardIfAuthenticated()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get('/')
            ->assertRedirect(route('dashboard'));
    }

    /** @test */
    public function dashboardMenuIsVisible()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertSee('Рабочий стол');
    }
}
