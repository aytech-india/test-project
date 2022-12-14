<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


// employee crud routes
Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
Route::match(['get', 'post'], '/add-employee', [EmployeeController::class, 'addEmployee'])->name('add-employee');
Route::match(['get', 'post'], '/update-employee/{id}', [EmployeeController::class, 'updateEmployee'])->name('update-employee');
Route::get('/delete-employee/{id}', [EmployeeController::class, 'deleteEmployee'])->name('delete-employee');


// roles crud routes
Route::get('/role', [RoleController::class, 'index'])->name('role');
Route::match(['get', 'post'], '/add-role', [RoleController::class, 'addRole'])->name('add-role');
Route::match(['get', 'post'], '/update-role/{id}', [RoleController::class, 'updateRole'])->name('update-role');
Route::get('/delete-role/{id}', [RoleController::class, 'deleteRole'])->name('delete-role');
