<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeesController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/positions',[EmployeesController::class, 'getAllPositions']);
Route::get('/employees',[EmployeesController::class, 'getAllEmployees']);
Route::post('/employees',[EmployeesController::class, 'createEmployees']);
Route::get('/employees/{id}',[EmployeesController::class, 'getEmployee']);
Route::put('/employees/{id}',[EmployeesController::class, 'updateEmployees']);
Route::put('/employees/delete/{id}',[EmployeesController::class, 'deleteEmployees']);

