<?php

namespace Domain\Consultant\Controllers;

use Domain\Consultant\Actions\UpdateConsultantAction;
use Domain\Consultant\Requests\UpdateBusinessCardRequest;
use Illuminate\Support\Facades\Auth;
use Support\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('consultant.dashboard');
    }
}
