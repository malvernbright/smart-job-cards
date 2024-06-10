<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\JobCard\JobCardController;
use App\Http\Controllers\Admin\JobCardController as AdminJobCardsController;
use App\Http\Controllers\IndexController as HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['auth', 'verified'])
    ->name('dashboard.')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('job_cards.index');
    });



Route::middleware(['auth', 'verified', 'role:admin'])
    ->name('admin.')->prefix('admin')->group(function () {
        Route::get('/', [AdminIndexController::class, 'index'])
            ->name('index');
        Route::resource('/roles', RoleController::class);
        Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])
            ->name('roles.permissions');
        Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])
            ->name('roles.permissions.revoke');
        Route::resource('/permissions', PermissionController::class);
        Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])
            ->name('permission.roles');
        Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])
            ->name('permission.roles.remove');
        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');
        Route::get('/users/{user}', [UserController::class, 'show'])
            ->name('users.show');
        Route::delete('/users/{user}/delete', [UserController::class, 'destroy'])
            ->name('user.destroy');
        Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])
            ->name('users.roles');
        Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])
            ->name('users.roles.remove');

        Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])
            ->name('users.permissions');
        Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])
            ->name('users.permissions.revoke');

        Route::get('/job-cards/create', [AdminJobCardsController::class, 'create'])
            ->name('job_cards.create');
        Route::post('/jobcards/create', [AdminJobCardsController::class, 'store'])->name('job_card.store');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
