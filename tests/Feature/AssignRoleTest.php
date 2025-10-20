<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Domain\Admin\Models\School;
use Domain\Admin\Models\SchoolClass;
use Domain\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class AssignRoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function canAssignTeacherRole()
    {
        $user = factory(User::class)->create();
        $school = factory(School::class)->create();

        $data = [
            'token' => '0000',
            'role' => 'teacher',
            'school_id' => $school->id,
            'position' => 'Зав.',
        ];

        $this->actingAs($user)
            ->post(route('attach.teacher'), $data)
            ->assertSessionHasErrors('token');

        $data['token'] = $school->token;

        $this->actingAs($user)
            ->post(route('attach.teacher'), $data)
            ->assertRedirect(route('dashboard'));

        $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertSee('Мои структурные подразделения');
    }

    /** @test */
    public function canAssignParentRole()
    {
        $user = factory(User::class)->create();

        $data = [
            'role' => 'dad',
        ];

        $this->actingAs($user)
            ->post(route('attach.parent'), $data)
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('users', ['id' => $user->id, 'sex' => 1]);

        $this->actingAs($user)
            ->get(route('dashboard'));
    }


    /** @test */
    public function canAssignStudentRole()
    {
        $user = factory(User::class)->create();

        $school = factory(School::class)->create();
        $schoolClass = factory(SchoolClass::class)->create(['school_id' => $school->id]);
        $birthDate = now()->subDays(rand(8,19));

        $data = [
            'sex' => rand(1,2),
            'birth_date' => $birthDate,
            'school_id' => $school->id,
            'class_id' => $schoolClass->id,
        ];

        $this->actingAs($user)
            ->post(route('attach.student'), $data)
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'birth_date' => $birthDate,
            'school_id' => $school->id,
            'class_id' => $schoolClass->id,
        ]);

        $this->actingAs($user)
            ->get(route('dashboard'));
    }

    /** @test */
    public function canAssignConsultantRole()
    {
        $user = factory(User::class)->create();
        $data = [
            'regalia_and_experience' => Str::random(),
            'experience' => rand(1,30),
            'token' => env('PARENT_ATTACH_CODE', ''),
        ];

        $this->actingAs($user)
            ->post(route('attach.consultant'), $data)
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('consultants', [
            'user_id' => $user->id,
        ]);

        $this->actingAs($user)
            ->get(route('dashboard'));
    }
}
