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
Route::resource('company', 'App\Http\Controllers\Api\CompanyController', ['only' => ['index', 'store']]);

/**
 * Department
 */
Route::resource('department', 'App\Http\Controllers\Api\DepartmentController', ['only' => ['index', 'store']]);

/**
 * Employee
 */
Route::resource('employee', 'App\Http\Controllers\Api\EmployeeController', ['only' => ['index', 'store']]);

/**
 * company-department
 */
Route::get('getCompany/{company_id}/Department', 'App\Http\Controllers\CompanyController@getCompanyDepartment'); 

/**
 * employee-department
 */
Route::post('checkEmployeeInDepartment', 'App\Http\Controllers\EmployeeController@checkEmployeeInDepartment'); 
Route::get('getDepartment/{department_id}/Employee', 'App\Http\Controllers\EmployeeController@getDepartmentEmployee'); 


/**
 * employee-company
 */
Route::get('getCompany/{company_id}/Employee', 'App\Http\Controllers\CompanyController@getCompanyEmployee'); 

