<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('employees.index'));

Route::get('/dashboard', function () {
    return view('dashboard', [
        'totalEmployees' => \App\Models\Employee::count(),
        'totalDepartments' => \App\Models\Department::count(),
        'totalSalary' => \App\Models\Employee::sum('salary'),
        'departments' => \App\Models\Department::withCount('employees')->get(),
    ]);
})->name('dashboard');
    Route::resource('departments', DepartmentController::class)->except('show');
    Route::resource('employees', EmployeeController::class)->except('show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';