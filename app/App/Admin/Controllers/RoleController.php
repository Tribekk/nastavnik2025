<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\GetRolesAction;
use App\Admin\ViewModels\RoleViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Support\Controller;

class RoleController extends Controller
{
    public function index(Request $request, GetRolesAction $action)
    {
        if ($request->expectsJson()) {
            return $action->run($request->q, true);
        }

        return view('admin.authorization.roles.index');
    }

    public function create()
    {
        $viewModel = new RoleViewModel();

        return view('admin.authorization.roles.create', $viewModel);
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $role = Role::create([
            'name' => $request->name,
            'title' => $request->title,
            'guard_name' => $request->guard,
            'description' => $request->description
        ]);

        if ($request->expectsJson()) {
            return response()->json($role, 201);
        }

        return redirect(route('admin.roles.view'));
    }

    public function edit(Role $role)
    {
        $viewModel = new RoleViewModel();

        return view('admin.authorization.roles.edit', $viewModel)
            ->withRole($role);
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->all());

        if ($request->expectsJson()) {
            return response()->json($role, 200);
        }

        return redirect(route('admin.roles.view'));
    }

    public function show(Request $request, Role $role)
    {
        if ($request->expectsJson()) {
            return Role::find($role->id);
        }

        return abort(403);
    }

    protected function validator(array $data)
    {
        $rules = [
            'name' => ['required', 'string', 'min:3', 'max:255', 'unique:roles'],
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'guard_name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255']
        ];

        return Validator::make($data, $rules, [
            'title.required' => __('Название является обязательным'),
            'name.required' => __('Код является обязательным'),
            'name.unique' => __('Роль с указанным кодом уже существует'),
            'guard_name.required' => __('Контекст является обязательным')
        ]);
    }
}
