<?php

use App\Http\Controllers\ControllerController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\PerfilController;
use App\Http\Middleware\RedirectByProfile;

Route::get('/', function () {
    return redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Rotas Admin
Route::middleware(['auth', RedirectByProfile::class])->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/', function () {
        return view('welcome');
    });
    // Listar Perfis
    Route::get('/perfis', [PerfilController::class, 'index'])->name('admin.perfis.index');
    Route::get('/perfis/create', [PerfilController::class, 'create'])->name('admin.perfis.create');
    Route::post('/perfis', [PerfilController::class, 'store'])->name('admin.perfis.store');
    Route::get('/perfis/{perfil}/edit', [PerfilController::class, 'edit'])->name('admin.perfis.edit');
    Route::put('/perfis/{perfil}', [PerfilController::class, 'update'])->name('admin.perfis.update');
    Route::delete('/perfis/{perfil}', [PerfilController::class, 'destroy'])->name('admin.perfis.destroy');

    Route::get('/organizacoes', [OrganizationController::class, 'index'])->name('admin.organizacoes.index');
    Route::get('/organizacoes/create', [OrganizationController::class, 'create'])->name('admin.organizacoes.create');
    Route::post('/organizacoes', [OrganizationController::class, 'store'])->name('admin.organizacoes.store');
    Route::get('/organizacoes/{organizacao}/edit', [OrganizationController::class, 'edit'])->name('admin.organizacoes.edit');
    Route::put('/organizacoes/{organizacao}', [OrganizationController::class, 'update'])->name('admin.organizacoes.update');
    Route::delete('/organizacoes/{organizacao}', [OrganizationController::class, 'destroy'])->name('admin.organizacoes.destroy');

    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
