<?php

use App\Http\Controllers\ControllerController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Responsible\DashboardController;
use App\Http\Controllers\Responsible\StudentsController;
use App\Http\Controllers\Student\ResponsibleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\PerfilController;
use App\Http\Middleware\RedirectByProfile;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FaceEventController;
use App\Http\Controllers\Responsible\ProfileController as ResponsibleProfileController;
use App\Http\Controllers\Student\ProfileController as StudentProfileController;

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

    Route::get('/organizacoes/detalhes/{id}', [OrganizationController::class, 'show'])->name('admin.organizacoes.show');
    Route::get('/organizacoes', [OrganizationController::class, 'index'])->name('admin.organizacoes.index');
    Route::get('/organizacoes/create', [OrganizationController::class, 'create'])->name('admin.organizacoes.create');
    Route::post('/organizacoes', [OrganizationController::class, 'store'])->name('admin.organizacoes.store');
    Route::get('/organizacoes/{organizacao}/edit', [OrganizationController::class, 'edit'])->name('admin.organizacoes.edit');
    Route::put('/organizacoes/{organizacao}', [OrganizationController::class, 'update'])->name('admin.organizacoes.update');
    Route::delete('/organizacoes/{organizacao}', [OrganizationController::class, 'destroy'])->name('admin.organizacoes.destroy');

    Route::get('users/{user}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('users/create/{organization_id}', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('users/create/{organization_id}', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::post('users/{user}/addResponsible', [UserController::class, 'addResponsible'])->name('admin.users.addResponsible');
    Route::post('users/{user}/addStudent', [UserController::class, 'addStudent'])->name('admin.users.addStudent');
    Route::post('/user/update-facial-image/{userId}', [UserController::class, 'updateFacialImage'])->name('user.updateFacialImage');

    Route::post('/documents/{id_type}/{user}', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/download/{id}', [DocumentController::class, 'download'])->name('documents.download');

});

Route::middleware(['auth', RedirectByProfile::class])->prefix('aluno')->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');

    Route::post('/perfil/update-facial-image', [StudentProfileController::class, 'updateImage'])->name('student.updateImage');

    Route::get('/perfil/detalhes', [StudentProfileController::class, 'index'])->name('student.profile.index');

    Route::get('/responsaveis', [ResponsibleController::class, 'index'])->name('student.responsible.index');
    Route::post('/responsavel/criar', [ResponsibleController::class, 'store'])->name('student.responsible.store');
    Route::put('/responsavel/{id}', [ResponsibleController::class, 'update'])->name('student.responsible.update');
});

Route::middleware(['auth', RedirectByProfile::class])->prefix('responsavel')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('responsible.dashboard');

    Route::post('/perfil/update-facial-image', [ResponsibleProfileController::class, 'updateImage'])->name('responsible.updateImage');

    Route::get('/perfil/detalhes', [ResponsibleProfileController::class, 'index'])->name('responsible.profile.index');

    Route::get('/alunos', [StudentsController::class, 'index'])->name('responsible.students.index');
    Route::post('/aluno/criar', [StudentsController::class, 'store'])->name('responsible.students.store');
    Route::put('/responsavel/{id}', [StudentsController::class, 'update'])->name('responsible.students.update');
});

Route::get('/controllers', [ControllerController::class, 'index'])->name('controllers.index');
Route::get('/controllers/create', [ControllerController::class, 'create'])->name('controllers.create');
Route::post('/controllers', [ControllerController::class, 'store'])->name('controllers.store');
Route::get('/controllers/{controller}/edit', [ControllerController::class, 'edit'])->name('controllers.edit');
Route::put('/controllers/{controller}', [ControllerController::class, 'updateController'])->name('controllers.update');
Route::delete('/controllers/{controllers}', [ControllerController::class, 'destroyController'])->name('controllers.destroy');

Route::get('/groups', [GroupController::class, 'index'])->name('groups');
Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
Route::get('/groups/{group}/edit', [GroupController::class, 'edit'])->name('groups.edit');
Route::post('/groups/{group}', [GroupController::class, 'updates'])->name('groups.update');
Route::delete('/groups/{group}', [GroupController::class, 'destroys'])->name('groups.destroy');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
Route::post('/webhook/face-event', action: [FaceEventController::class, 'handleWebhook']);
