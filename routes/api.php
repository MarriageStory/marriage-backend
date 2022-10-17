<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentDetailController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\EventController;
use GuzzleHttp\Middleware;
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
Route::get('admin', [AuthController::class, 'index']);
Route::get('admin/{id}', [AuthController::class, 'show']);
Route::put('admin/{id}/update', [AuthController::class, 'update']);
Route::get('admin/{id}/delete', [AuthController::class, 'destroy']);

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('payments', PaymentController::class);
    Route::prefix('payments')->group(function () {
        Route::get('{payment}/details', [PaymentDetailController::class, 'index']);
        Route::get('{payment}/details/{paymentDetail}', [PaymentDetailController::class, 'show']);
        Route::post('{payment}', [PaymentDetailController::class, 'store']);
        Route::put('{payment}/details/{paymentDetail}', [PaymentDetailController::class, 'update']);
        Route::delete('{payment}/details/{paymentDetail}', [PaymentDetailController::class, 'destroy']);
    });

    Route::prefix('events1')->group(function () {
        Route::get('{event}/details', [ScheduleController::class, 'index']);
        Route::get('{event}/details/{schedule}', [ScheduleController::class, 'show']);
        Route::post('{event}', [ScheduleController::class, 'store']);
        Route::put('{event}/details/{schedule}', [ScheduleController::class, 'update']);
        Route::delete('{event}/details/{schedule}', [ScheduleController::class, 'destroy']);
    });

    Route::prefix('events2')->group(function () {
        Route::get('{event}/details', [PaymentDetailController::class, 'index']);
        Route::get('{event}/details/{paymentDetail}', [PaymentDetailController::class, 'show']);
        Route::post('{event}', [PaymentDetailController::class, 'store']);
        Route::put('{event}/details/{paymentDetail}', [PaymentDetailController::class, 'update']);
        Route::delete('{event}/details/{paymentDetail}', [PaymentDetailController::class, 'destroy']);
    });

    Route::apiResource('events1', EventController::class);
    Route::apiResource('events2', EventController::class);
    Route::apiResource('schedules', ScheduleController::class);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
