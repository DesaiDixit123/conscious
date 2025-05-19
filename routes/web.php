<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);









Route::middleware(['auth.custom'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('/add-employee', EmployeeController::class);
    Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');


    
Route::get('/employees', [EmployeeController::class, 'EmployeeList'])->name('employee.list');



    Route::get('/employee/{id}', [EmployeeController::class, 'show'])->name('add-employee.show'); // View single employee
    Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('add-employee.edit'); // Edit form
    Route::put('/employee/{id}', [EmployeeController::class, 'update'])->name('add-employee.update'); // Update employee
    Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('add-employee.destroy'); // Delete employee
});
