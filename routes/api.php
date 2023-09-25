<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrokersController;
use App\Http\Controllers\PropertiesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// public
Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);

Route::get('/broker', [BrokersController::class, 'index']);

Route::get('/broker/{broker}', [BrokersController::class, 'show']);

Route::get('/properties', [PropertiesController::class, 'index']);

Route::get('/properties/{property}', [PropertiesController::class, 'show']);


// Private  
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::apiResource('/brokers', BrokersController::class)->only([
        'store',
        'update',
        'destroy'
    ]);

    Route::apiResource('/properties', PropertiesController::class)->only([
        'store',
        'update',
        'destroy'
    ]);

    Route::post('/logout', [AuthController::class, 'logout']);

});