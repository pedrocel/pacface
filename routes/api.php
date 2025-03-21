<?php

use App\Http\Controllers\Api\NotificationTestController;
use App\Http\Controllers\FaceEventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/webhook/face-event', action: [FaceEventController::class, 'handleWebhook']);
Route::post('/face-event/create-faltas', action: [FaceEventController::class, 'createFaltas']);

Route::get('/crawler/user-face', action: [FaceEventController::class, 'getUsers']);
Route::get('/crawler/user-face/{id}', action: [FaceEventController::class, 'getUsersFromId']);


Route::post('/test-notification', [NotificationTestController::class, 'sendTestNotification']);

Route::post('/facial/frequency', [FaceEventController::class, 'createFrequency']);

Route::post('/{id_org}/student/update/{id_user}', [FaceEventController::class, 'studentUpdate']);


