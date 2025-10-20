<?php

namespace Tests\Feature;

use Domain\Admin\Models\School;
use Domain\User\Actions\CreateUser;
use Domain\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected CreateUser $createUserAction;

    public function setUp(): void
    {
        parent::setUp();

        $this->createUserAction = $this->app->make(CreateUser::class);
    }

    /** @test */
    public function canCreateUser()
    {
        $user = factory(User::class)->create();

        $this->assertDatabaseHas('users', ['uuid' => $user->uuid]);
    }

    /** @test */
    public function canCreateUserByAction()
    {
        $userFields = factory(User::class)->make()->toArray();
        $userFields['password'] = 'password';

        $user = $this->createUserAction->run($userFields);
        $this->assertDatabaseHas('users', ['uuid' => $user->uuid]);
    }

    /** @test */
    public function canSetSchoolIdUser()
    {
        $school = factory(School::class)->create();
        $this->assertDatabaseHas('schools', ['uuid' => $school->uuid]);

        $userFields = factory(User::class)->make([
                'school_id' => $school->id,
            ])->toArray();
        $userFields['password'] = 'password';

        $user = $this->createUserAction->run($userFields);
        $this->assertDatabaseHas('users', ['uuid' => $user->uuid, 'school_id' => $school->id]);
    }

    /** @test */
    public function canSeeCreateUserPage()
    {
        $user = factory(User::class)->create(['email_verified_at' => now()]);
        $this->assertDatabaseHas('users', ['uuid' => $user->uuid]);
        $user->admin()->create();
        $this->assertDatabaseHas('admins', ['id' => $user->id]);

        $response = $this->actingAs($user)
            ->get(route('admin.users.view'))
            ->assertSeeText('Новый пользователь');

        $response = $this->actingAs($user)
            ->get(route('admin.users.create'))
            ->assertSuccessful();
    }
}
