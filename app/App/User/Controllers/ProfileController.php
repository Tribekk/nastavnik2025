<?php

namespace App\User\Controllers;

use Illuminate\Support\Facades\Auth;
use Support\Controller;

class ProfileController extends Controller
{
    public function edit()
    {
//        dd(serialize(request()->query('tmp_sms')));

        return view('user.profile.profile')->withUser(Auth::user());
    }
}
