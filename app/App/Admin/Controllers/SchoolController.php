<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\CreateSchoolAction;
use App\Admin\Actions\GetSchoolsAction;
use App\Admin\Requests\StoreSchoolRequest;
use App\Admin\Requests\UpdateSchoolRequest;
use Domain\Admin\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Support\Controller;
use Domain\Kladr\Models\Kladr;

class SchoolController extends Controller
{
    public function index(Request $request, GetSchoolsAction $action)
    {
        $schools = School::query();
        $city = new Kladr;

        if ($request->filled('title')) {
            $schools->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('short_title')) {
            $schools->where('short_title', 'like', '%' . $request->short_title . '%');
        }

        if ($request->filled('address')) {
            $schools->where('address', 'like', '%' . $request->address . '%');
        }
        if ($request->filled('local')) {
            $schools->where('local', 'like', '%' . $request->local . '%');
        }

        if ($request->expectsJson()) {
            return $action->run($request->q, true);
        }

        if(!Auth::user()->isAdmin) abort(403);

        return view('admin.schools.index',  compact('city'))
            ->withSchools($schools->paginate(10));
    }

    public function create()
    {
        return view('admin.schools.create');
    }

    public function store(StoreSchoolRequest $request, CreateSchoolAction $action)
    {

        ($action->run($request->validated()));


       //dd($request->input('local'));

        return redirect(route('admin.schools.view'))
            ->with('status', 'Компания добавлена');
    }

    public function edit(School $school)
    {
        return view('admin.schools.edit')
            ->withSchool($school);
    }

    public function generateToken(Request $request, School $school)
    {
        $school->update(['token' => School::generateToken()]);
        return redirect(url()->previous(route('admin.schools.view')));
    }

    public function update(UpdateSchoolRequest $request, School $school)
    {
        $school->update($request->validated());


        return redirect(route('admin.schools.view'))
            ->with('status', 'Данные обновлены');
    }

    public function destroy(School $school)
    {
        try {
            $school->delete();
        } catch (\Exception $exception) {
            return redirect(route('admin.schools.edit', ['school' => $school]))
                ->withErrors(['destroy' => __('У компании есть  структурные подразделенияы с руководителями и (или) учениками')]);
        }

        return redirect(route('admin.schools.view'))
            ->with('status', 'Компания удалена');
    }

    public function show(Request $request, School $school)
    {
        if ($request->expectsJson()) {
            return School::find($school->id);
        }

        return abort(403);
    }
}
