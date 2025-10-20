<?php

namespace App\User\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Domain\User\Models\User;
use Illuminate\Support\Str;

class ResetAllUsersToPasswordTest extends Controller
{
    public function reset() {
        $users = User::get();



        foreach($users as $user) {
            //dd($user);
            $user->update([
                'password' => \Hash::make("12345"),
                'reset_password_code' => null,
                'remember_token' => Str::random(60),
            ]);
        }
    }
}
