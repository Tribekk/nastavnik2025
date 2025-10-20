<?php

use App\Admin\Controllers\ExternalOrgunitActivityKindController;
use App\Admin\Controllers\ExternalOrgunitController;
use App\Admin\Controllers\LegalFormController;
use App\Admin\Controllers\LoyaltyLevelController;
use App\Admin\Controllers\PermissionController;
use App\Admin\Controllers\ReportController;
use App\Admin\Controllers\RoleController;
use App\Admin\Controllers\SchoolController;
use App\Admin\Controllers\TypeEducationalOrganizationController;
use App\Admin\Controllers\UserController;
use App\Admin\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', AdminMiddleware::class])->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('authorization')->group(function () {
            Route::name('permissions.')->group(function () {
                Route::get('permissions', \App\Livewire\Authorization\Permissions\Index::class)->name('view');
                Route::get('permissions/json', [PermissionController::class, 'index'])->name('list');
            });

            Route::name('roles.')->group(function () {
                Route::get('roles', [RoleController::class, 'index'])->name('view');
                Route::get('roles/create', [RoleController::class, 'create'])->name('create');
                Route::post('roles', [RoleController::class, 'store'])->name('store');
                Route::get('roles/{role}/permissions', \App\Livewire\Authorization\Roles\Permissions::class)->name('permissions');
                Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('edit');
                Route::patch('roles/{role}', [RoleController::class, 'update'])->name('update');
                Route::get('roles/{role}', [RoleController::class, 'show'])->name('show');
            });
        });

        Route::name('users.')->group(function () {
            Route::get('users', [UserController::class, 'index'])->name('view');
            Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('edit');
            Route::get('users/login-as/{user}', [UserController::class, 'loginAsUser'])->name('login');
            Route::get('users/create', [UserController::class, 'create'])->name('create');
            Route::post('users', [UserController::class, 'store'])->name('store');
            Route::get('users/teachers', [UserController::class, 'teachers'])->withoutMiddleware(AdminMiddleware::class)->name('teachers');
        });

        Route::prefix('schools')->name('schools.')->group(function () {
            Route::get('/', [SchoolController::class, 'index'])->withoutMiddleware(AdminMiddleware::class)->name('view');
            Route::get('/create', [SchoolController::class, 'create'])->name('create');
            Route::post('/', [SchoolController::class, 'store'])->name('store');
            Route::get('/{school}/edit', [SchoolController::class, 'edit'])->name('edit');
            Route::patch('/{school}', [SchoolController::class, 'update'])->name('update');
            Route::put('/{school}/generate_token', [SchoolController::class, 'generateToken'])->name('generate_token');
            Route::delete('/{school}', [SchoolController::class, 'destroy'])->name('destroy');
            Route::get('{school}', [SchoolController::class, 'show'])->name('show');
        });

        Route::prefix('types_of_educational_organization')->name('types_of_educational_organization.')->group(function () {
            Route::get('/', [TypeEducationalOrganizationController::class, 'index'])->name('view');
            Route::get('/{type}', [TypeEducationalOrganizationController::class, 'show'])->name('show');
        });

        Route::prefix('loyalty_levels')->name('loyalty_levels.')->group(function () {
            Route::get('/', [LoyaltyLevelController::class, 'index'])->name('view');
            Route::get('/{level}', [LoyaltyLevelController::class, 'show'])->name('show');
        });

        Route::prefix('reports')->name('reports.')->group(function () {
            Route::get('/students_tests', [ReportController::class, "studentsTests"])->name('students_tests');
            Route::post('/export/students_base_tests', [ReportController::class, "exportStudentsBaseTests"])->name('export.students_base_tests');
            Route::get('/registrations', [ReportController::class, "registrations"])->name('registrations');
            Route::get('/student_questionnaires', [ReportController::class, "studentQuestionnaires"])->name('student_questionnaires');
            Route::get('/attached_parents', [ReportController::class, "attachedParents"])->name('attached_parents');
            Route::get('/tests', [ReportController::class, "tests"])->name('tests');
            Route::get('/students', [ReportController::class, 'students'])->name('students');
        });


        Route::prefix('orgunits')->name('orgunits.')->group(function () {
            Route::prefix('legal_forms')->name('legal_forms.')->group(function () {
                Route::get('/', [LegalFormController::class, 'index'])->name('view');
                Route::get('/create', [LegalFormController::class, 'create'])->name('create');
                Route::post('/create', [LegalFormController::class, 'store'])->name('store');
                Route::get('/{legalForm}/edit', [LegalFormController::class, 'edit'])->name('edit');
                Route::get('/{legalForm}', [LegalFormController::class, 'show'])->name('show');
                Route::patch('/{legalForm}', [LegalFormController::class, 'update'])->name('update');
                Route::delete('/{legalForm}', [LegalFormController::class, 'destroy'])->name('destroy');
            });

            Route::prefix('activity_kinds')->name('activity_kinds.')->group(function () {
                Route::get('/', [ExternalOrgunitActivityKindController::class, 'index'])->name('view');
                Route::get('/create', [ExternalOrgunitActivityKindController::class, 'create'])->name('create');
                Route::post('/create', [ExternalOrgunitActivityKindController::class, 'store'])->name('store');
                Route::get('/{activityKind}/edit', [ExternalOrgunitActivityKindController::class, 'edit'])->name('edit');
                Route::get('/{activityKind}', [ExternalOrgunitActivityKindController::class, 'show'])->name('show');
                Route::patch('/{activityKind}', [ExternalOrgunitActivityKindController::class, 'update'])->name('update');
                Route::delete('/{activityKind}', [ExternalOrgunitActivityKindController::class, 'destroy'])->name('destroy');
            });

            Route::get('/', [ExternalOrgunitController::class, 'index'])->name('view');
            Route::get('/create', [ExternalOrgunitController::class, 'create'])->name('create');
            Route::post('/create', [ExternalOrgunitController::class, 'store'])->name('store');
            Route::get('/{orgunit}', [ExternalOrgunitController::class, 'show'])->name('show');
            Route::get('/{orgunit}/edit', [ExternalOrgunitController::class, 'edit'])->name('edit');
            Route::patch('/{orgunit}', [ExternalOrgunitController::class, 'update'])->name('update');
            Route::delete('/{orgunit}', [ExternalOrgunitController::class, 'destroy'])->name('destroy');
            Route::delete('/{orgunit}/logo', [ExternalOrgunitController::class, 'logoDestroy'])->name('logo.destroy');
        });
    });
});

