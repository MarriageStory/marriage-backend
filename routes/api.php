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
    Route::apiResource('events', EventController::class);
    Route::apiResource('schedules', ScheduleController::class);

    Route::prefix('payments')->group(function () {
        Route::get('{payment}/details', [PaymentDetailController::class, 'index']);
        Route::get('{payment}/details/{paymentDetail}', [PaymentDetailController::class, 'show']);
        Route::post('{payment}', [PaymentDetailController::class, 'store']);
        Route::put('{payment}/details/{paymentDetail}', [PaymentDetailController::class, 'update']);
        Route::delete('{payment}/details/{paymentDetail}', [PaymentDetailController::class, 'destroy']);
    });

    Route::prefix('events')->group(function () {
        Route::get('{event}/schedule', [ScheduleController::class, 'index']);
        Route::get('{event}/schedule/{schedule}', [ScheduleController::class, 'show']);
        Route::post('{event}/schedule', [ScheduleController::class, 'store']);
        Route::put('{event}/schedule/{schedule}', [ScheduleController::class, 'update']);
        Route::delete('{event}/schedule/{schedule}', [ScheduleController::class, 'destroy']);
        Route::get('{event}/details-payment', [PaymentDetailController::class, 'index']);
        Route::get('{event}/details-payment/{paymentDetail}', [PaymentDetailController::class, 'show']);
        Route::post('{event}/details-payment', [PaymentDetailController::class, 'store']);
        Route::put('{event}/details-payment/{paymentDetail}', [PaymentDetailController::class, 'update']);
        Route::delete('{event}/details-payment/{paymentDetail}', [PaymentDetailController::class, 'destroy']);
    });

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
