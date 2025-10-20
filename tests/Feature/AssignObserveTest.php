<?php

namespace Tests\Feature;

use Domain\Admin\Models\School;
use Domain\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AssignObserveTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function canObserveChild()
    {
        $child = factory(User::class)->create();
        $parent = factory(User::class)->create();

        $data = [
            'first_name' => $child->first_name,
            'middle_name' => $child->middle_name,
            'last_name' => '....',
            'birth_date' => $child->birth_date,
            'code' => env('PARENT_ATTACH_CODE', ''),
        ];

        $this->actingAs($parent)
            ->post(route('observe.user'), $data)
            ->assertSessionHas('error');

        $data['last_name'] = $child->last_name;

        $this->actingAs($parent)
            ->post(route('observe.user'), $data)
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('observed_people', [
            'user_id' => $parent->id,
            'observed_user_id' => $child->id,
        ]);

        $this->actingAs($parent)
            ->get(route('dashboard'))
            ->assertSee($child->fullName);
    }
}
