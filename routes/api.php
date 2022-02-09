<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\WorkerController;
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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
});


Route::group(['prefix' => 'admin', 'middleware' => 'can:admin'], function () {
    Route::apiResource('company', CompanyController::class);
    Route::get('worker/{worker}', [WorkerController::class, 'show']);
    Route::get('worker', [WorkerController::class, 'index'])->name('worker.index');
});


Route::group(['prefix' => 'company', 'middleware' => 'can:company'], function () {
    Route::apiResource('worker', WorkerController::class);
    Route::put('company/{id}', [CompanyController::class, 'update'])->name('company.update');
});






