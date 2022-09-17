<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentDetailController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your applicationd. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('payments', PaymentController::class)->middleware('clientMiddleware', 'roleMiddleware');

    Route::prefix('payments')->middleware('roleMiddleware', 'clientMiddleware')->group(function () {
        Route::get('{payment}/details', [PaymentDetailController::class, 'index']);
        Route::get('{payment}/details/{paymentDetail}', [PaymentDetailController::class, 'show']);
        Route::post('{payment}', [PaymentDetailController::class, 'store']);
        Route::put('{payment}/details/{paymentDetail}', [PaymentDetailController::class, 'update']);
        Route::delete('{payment}/details/{paymentDetail}', [PaymentDetailController::class, 'destroy']);
    });

    Route::apiResource('schedules', ScheduleController::class)->middleware('clientMiddleware');


    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
