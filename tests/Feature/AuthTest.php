<?php

namespace Tests\Feature;

use Domain\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function canLoginByEmail()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->post(route('login'), [
                'username' => $user->email,
                'password' => 'password'
            ])->assertRedirect(route('dashboard'));
    }

    /** @test */
    public function canLoginByPhone()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->post(route('login'), [
                'username' => $user->phone,
                'password' => 'password'
            ])->assertRedirect(route('dashboard'));
    }

    /** @test */
    public function redirectToRegisterIfDontHasRegisterUser()
    {
        $this->get(route('register.verify'))
            ->assertRedirect(route('register'));
    }

    /** @test */
    public function canRegister()
    {
        $user = factory(User::class)->make([
            'phone' => '+79112434673',
            'password_confirmation' => 'password',
            'pd_agree' => true,
        ])->toArray();
        $user['password'] = 'password';

        $response = $this->post(route('register'), $user);
        $response->assertSessionHas('registerUser');

        $registerUser = session()->get('registerUser');
        $response = $this->post(route('register.verify'), ['code' => 'KML2']);
        $response->assertSessionHasErrors('code');

        $response = $this->post(route('register.verify'), ['code' => $registerUser->getCode()]);
        $response->assertRedirect(route('dashboard'));
        $this->assertDatabaseHas('users', ['phone' => $user['phone']]);
    }

    /** @test */
    public function canResetPassword()
    {
        $user = factory(User::class)->create([
            'phone' => '+79214177940',
        ]);

        $response = $this->post(route('password.phone'), [
            'phone' => $user->phone,
        ]);

        $response->assertSessionHas('resetPasswordUser');

        $resetPasswordUser = session()->get('resetPasswordUser');
        $data = [
            'code' => '890D',
            'password' => 'pass123321',
            'password_confirmation' => 'pass123321',
        ];

        $response = $this->post(route('password.reset'), $data);
        $response->assertSessionHasErrors('code');

        $data['code'] = $resetPasswordUser->getCode();
        $response = $this->post(route('password.reset'), $data);
        $response->assertRedirect(route('dashboard'));
        $this->assertDatabaseHas('users', ['phone' => $user['phone']]);
    }
}
