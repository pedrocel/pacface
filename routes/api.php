<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FacialImageController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FaceEventController;

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login'])->name('login'); // Nome da rota adicionado aqui
    Route::post('register', [AuthController::class, 'register']);
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
});

Route::group(['middleware' => ['auth:jwt']], function () {
    Route::prefix('v1')->group(function () {
        Route::post('/send-facial', [FacialImageController::class, 'updateFacialImage']);
        Route::post('/send-facial-adm/{id}', [FacialImageController::class, 'updateFacialImageAdm']);
        Route::post('/facial/approve/{id}', [UserController::class, 'approveFacial']);
        Route::post('/facial/reprove/{id}', [UserController::class, 'reproveFacial']);

        Route::prefix('products')->group(function () {
            Route::get('/', 'App\Http\Controllers\Products\ProductController@index');
            Route::post('/', 'App\Http\Controllers\Products\ProductController@store');
            Route::get('/{id}', 'App\Http\Controllers\Products\ProductController@show');
            Route::put('/{id}', 'App\Http\Controllers\Products\ProductController@update');
            Route::delete('/{id}', 'App\Http\Controllers\Products\ProductController@destroy');
        });

        Route::get('/institutions', [InstitutionController::class, 'index']);
        Route::post('/institutions', [InstitutionController::class, 'store']);
        Route::put('/institutions/{institution}', [InstitutionController::class, 'update']);

        Route::prefix('profiles')->group(function () {
            Route::post('/', [ProfileController::class, 'store']);
            Route::get('/', [ProfileController::class, 'index']);
            Route::get('/{id}', [ProfileController::class, 'show']);
            Route::put('/{id}', [ProfileController::class, 'update']);
            Route::delete('/{id}', [ProfileController::class, 'destroy']);
        });
        
        Route::prefix('student/responsible')->group(function () {
            require base_path('routes/api_student.php'); // Incluindo as rotas de student
        });

        Route::post('student/documents/{id_type}', [DocumentController::class, 'store']);
        Route::get('student/documents-to-send', [DocumentController::class, 'listDocuments']);

        Route::apiResource('document-types', DocumentTypeController::class);

        Route::get('/users', [UserController::class, 'index']); // Listar todos os usuários
        Route::put('/users/{id}', [UserController::class, 'update']); // Atualizar um usuário específico
        Route::get('/user/{id}', [UserController::class, 'show']);
    });
});

Route::post('/webhook/face-event', [FaceEventController::class, 'handleWebhook']);
