<?php

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

/**
 * Company
 */
Route::resource('company', 'App\Http\Controllers\Api\CompanyController', ['only' => ['index', 'show']]);

/**
 * Department
 */
Route::resource('department', 'App\Http\Controllers\Api\DepartmentController', ['only' => ['index', 'show']]);

/**
 * Employee
 */
Route::resource('employee', 'App\Http\Controllers\Api\EmployeeController', ['only' => ['index', 'show']]);

