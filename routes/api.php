<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\WagesController;
use App\Http\Controllers\Api\EmployeeController;


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

Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);


Route::post('employee', [EmployeeController::class, 'index']);
Route::put('employee/update/{id}', [EmployeeController::class, 'update']);
Route::delete('employee/destroy/{id}', [EmployeeController::class, 'destroy']);

Route::post('wages', [WagesController::class, 'store']);