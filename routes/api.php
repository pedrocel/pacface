<?php

use App\Http\Controllers\FaceEventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/webhook/face-event', action: [FaceEventController::class, 'handleWebhook']);
