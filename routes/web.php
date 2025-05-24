<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);





// Route::post('/users', [UserController::class, 'store']);




Route::middleware(['auth.custom'])->group(function () {
    Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('/add-employee', EmployeeController::class);
    Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');

Route::get('/users-list', [UserController::class, 'index']);
    
Route::get('/operator-list', [EmployeeController::class, 'OperatorList'])->name('operator.list');
Route::get('/admin-list', [EmployeeController::class, 'AdminList'])->name('admin.list');
Route::post('/employee/toggle-status/{id}', [EmployeeController::class, 'toggleStatus'])->name('employee.toggleStatus');


Route::post('/employee/activate/{id}', [EmployeeController::class, 'activate'])->name('employee.activate');
Route::post('/employee/deactivate/{id}', [EmployeeController::class, 'deactivate'])->name('employee.deactivate');
    Route::get('/employee/{id}', [EmployeeController::class, 'show'])->name('add-employee.show'); // View single employee
    Route::get('/employee/{id}/edit', [EmployeeController::class, 'editEmployee'])->name('add-employee.edit'); // Edit form
    // Route::get('/employee/{id}/edit', [EmployeeController::class, 'editEmployee'])->name('add-admin.edit'); // Edit form
    Route::put('/employee/{id}', [EmployeeController::class, 'update'])->name('add-employee.update'); // Update employee
    Route::delete('/admin/{id}', [EmployeeController::class, 'adminDestroy'])->name('add-admin.destroy'); // Delete admin
    Route::delete('/operator/{id}', [EmployeeController::class, 'operatorDestroy'])->name('add-operator.destroy'); // Delete operator

Route::get('/services1', [ServiceController::class, 'index'])->name('services.index');

// Show form to add service
Route::get('/services', [ServiceController::class, 'create'])->name('services.create');
// routes/web.php
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users-lists', [UserController::class, 'index1'])->name('users.lists');
 Route::get('/add-user', [UserController::class, 'create'])->name('users.create'); 
Route::get('/user-edit/{id}', [UserController::class, 'edit'])->name('users.edit');

// Store new service
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::patch('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
Route::post('/users/{id}/verification-toggle', [UserController::class, 'toggleVerification'])->name('users.verification.toggle');

Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');



Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
// routes/web.php
Route::get('/services/names', [ServiceController::class, 'getServiceNames'])->name('services.names');

});
