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

Route::middleware('jwt.verify')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('jwt.verify')->get('/test', [ProtectedTestController::class, 'testHandler']);

Route::middleware('jwt.verify')->post('/logout', [AuthController::class, 'logoutHandler']);

Route::post('/cars', [CarController::class, 'createCarHandler']);

Route::post('/login', [AuthController::class, 'loginHandler'])->name("login");

Route::post('/registration', [AuthController::class, 'registrationHandler']);

Route::get('/error', [ErrorTestController::class, 'errorHandler'])->name("error");


