<?php

namespace Tests\Feature;

use Domain\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function adminCanSeeAdminMenu()
    {
        $user = factory(User::class)->create();

        $user->admin()->create();

        $response = $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertSee('Администрирование')
            ->assertSee('Авторизация')
            ->assertSee('Пользователи');
    }

    /** @test */
    public function nonAdminUserCantSeeAdminMenu()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertDontSee('Администрирование')
            ->assertDontSee('Авторизация')
            ->assertDontSee('Пользователи');
    }

    /** @test */
    public function adminUserCanOpenAdminPages()
    {
        $user = factory(User::class)->create();

        $user->admin()->create();

        $routes = [
            route('admin.permissions.view'),
            route('admin.permissions.list'),
            route('admin.roles.view'),
            route('admin.roles.create'),
            route('admin.users.view'),
        ];

        $response = $this->actingAs($user);

        foreach ($routes as $route) {
            $response
                ->get($route)
                ->assertStatus(200);
        }
    }

    /** @test */
    public function nonAdminUserCantOpenAdminPages()
    {
        $user = factory(User::class)->create();

        $routes = [
            route('admin.permissions.view'),
            route('admin.permissions.list'),
            route('admin.roles.view'),
            route('admin.roles.create'),
            route('admin.users.view'),
        ];

        foreach ($routes as $route) {
            $response = $this->actingAs($user)
                ->get($route)
                ->assertStatus(403);
        }
    }
}
