<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientSourceController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\EmployeeSalaryChangeController;
use App\Http\Controllers\EmployeeProjectController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CurrencyExchangeController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\OutcomeController;
use App\Http\Controllers\OutcomeTypeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectCredentialController;
use App\Http\Controllers\ProjectCredentialTypeController;
use App\Http\Controllers\ProjectRateChangeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\ClientController@index');

Route::resource('client',ClientController::class);
Route::resource('client-source', ClientSourceController::class);
Route::resource('currency', CurrencyController::class);
Route::resource('currency-exchange', CurrencyExchangeController::class);
Route::resource('employee', EmployeeController::class);
Route::resource('employee-project', EmployeeProjectController::class);
Route::resource('employee-salary-change', EmployeeSalaryChangeController::class);
Route::resource('income', IncomeController::class);
Route::resource('outcome', OutcomeController::class);
Route::resource('outcome-type', OutcomeTypeController::class);
Route::resource('position', PositionController::class);
Route::resource('project', ProjectController::class);
Route::resource('project-credential', ProjectCredentialController::class);
Route::resource('project-credential-type', ProjectCredentialTypeController::class);
Route::resource('project-rate-change', ProjectRateChangeController::class);
