<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Error\ErrorTestController;
use App\Http\Controllers\Protected\ProtectedTestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/test', [ProtectedTestController::class, 'testHandler']);

Route::post('/cars', [CarController::class, 'createCarHandler']);

Route::post('/login', [AuthController::class, 'loginHandler']);

Route::post('/registration', [AuthController::class, 'registrationHandler']);

Route::get('/error', [ErrorTestController::class, 'errorHandler'])->name("error");


