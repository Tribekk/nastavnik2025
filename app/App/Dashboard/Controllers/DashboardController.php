<?php

namespace App\Dashboard\Controllers;

use App\Employer\Controllers\EmployerDashboardController;
use Domain\Consultant\Controllers\DashboardController as ConsultantDashboardController;
use Domain\Parent\Controllers\ParentDashboardController;
use Domain\School\Controllers\SchoolController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Support\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->hasAnyRole(['teacher', 'curator'])) {
            $controller = new SchoolController();
            return $controller->schoolCard();
        } else if(Auth::user()->hasRole('parent')) {
            $controller = new ParentDashboardController();
            return $controller->index();
        } else if(Auth::user()->hasRole('student')) {
            $controller = new StudentDashboardController();
            return $controller->index();
        } else if(Auth::user()->hasRole('consultant')) {
            $controller = new ConsultantDashboardController();
            return $controller->dashboard();
        } else if(Auth::user()->isEmployer) {
            $controller = new EmployerDashboardController;
            return $controller->index($request);
        }

        return view('home.dashboard');
    }

    public function employersAdmin(Request $request)
    {
        if(Auth::user()->can('admin')) {
            $controller = new EmployerDashboardController;
            return $controller->index($request);
        }

        return view('home.dashboard');
    }

    public function settings(Request $request)
    {
        if(Auth::user()->isEmployer) {
            $controller = new EmployerDashboardController;
            return $controller->settings($request);
        }

        abort(403);
    }
}
