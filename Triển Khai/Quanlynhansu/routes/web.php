<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RegencyController;
use App\Http\Controllers\BasicSalaryController; 
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentJoinController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\BonusDiscipController;
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

Route::view('/home', 'home')->name('home');

Route::prefix('/admin')->group(function () {
    Route::prefix('/department')->group(function () {
        //index
        Route::get('/',[DepartmentController::class,'index'])->name('department.index');

        //add
        Route::get('/add',[DepartmentController::class,'add'])->name('department.add');

        //store
        Route::post('/store',[DepartmentController::class,'store'])->name('department.store');

        //edit
        Route::get('/edit/{id}',[DepartmentController::class,'edit'])->name('department.edit');

        //update
        route::post('/update/{id}',[DepartmentController::class,'update'])->name('department.update');

        //delete
        Route::get('/delete/{id}',[DepartmentController::class,'delete'])->name('department.delete');

    });

    Route::prefix('/regency')->group(function () {
        //index
        Route::get('/',[RegencyController::class,'index'])->name('regency.index');

        //add
        Route::get('/add',[RegencyController::class,'add'])->name('regency.add');

        //store
        Route::post('/store',[RegencyController::class,'store'])->name('regency.store');

        //edit
        Route::get('/edit/{id}',[RegencyController::class,'edit'])->name('regency.edit');

        //update
        route::post('/update/{id}',[RegencyController::class,'update'])->name('regency.update');

        //delete
        Route::get('/delete/{id}',[RegencyController::class,'delete'])->name('regency.delete');

    });

    Route::prefix('/basicsalary')->group(function () {
        Route::get('/',[BasicSalaryController::class,'index'])->name('basicsalary.index');

         //add
         Route::get('/add',[BasicSalaryController::class,'add'])->name('basicsalary.add');

         //store
         Route::post('/store',[BasicSalaryController::class,'store'])->name('basicsalary.store');

         //delete
         Route::get('/delete/{id}',[BasicSalaryController::class,'delete'])->name('basicsalary.delete');

         //edit
         Route::get('/edit/{id}',[BasicSalaryController::class,'edit'])->name('basicsalary.edit');

         //update
         Route::post('/update/{id}',[BasicSalaryController::class,'update'])->name('basicsalary.update');
    });

    Route::prefix('/employee')->group(function () {
        Route::get('/',[EmployeeController::class,'index'])->name('employee.index');

        Route::get('/add',[EmployeeController::class,'add'])->name('employee.add');

        Route::post('/store',[EmployeeController::class,'store'])->name('employee.store');

        Route::get('/delete/{id}',[EmployeeController::class,'delete'])->name('employee.delete');

        Route::get('/edit/{id}',[EmployeeController::class,'edit'])->name('employee.edit');

        Route::post('/update/{id}',[EmployeeController::class,'update'])->name('employee.update');
    });

    Route::prefix('/departmentjoin')->group(function () {
        Route::get('/',[DepartmentJoinController::class,'index'])->name('departmentjoin.index');

        Route::get('/add',[DepartmentJoinController::class,'add'])->name('departmentjoin.add');

        Route::post('/store',[DepartmentJoinController::class,'store'])->name('departmentjoin.store');

        Route::get('/delete/{id}',[DepartmentJoinController::class,'delete'])->name('departmentjoin.delete');

        Route::get('/edit/{id}',[DepartmentJoinController::class,'edit'])->name('departmentjoin.edit');

        Route::post('/update/{id}',[DepartmentJoinController::class,'update'])->name('departmentjoin.update');
    });

    Route::prefix('/calendar')->group(function () {
        Route::get('/',[CalendarController::class,'index'])->name('calendar.index');

        Route::get('/add',[CalendarController::class,'add'])->name('calendar.add');

        Route::post('/store',[CalendarController::class,'store'])->name('calendar.store');

        Route::get('/delete/{id}',[CalendarController::class,'delete'])->name('calendar.delete');

        Route::get('/edit/{id}',[CalendarController::class,'edit'])->name('calendar.edit');

        Route::post('/update/{id}',[CalendarController::class,'update'])->name('calendar.update');

        Route::get('/details/{id}',[CalendarController::class,'details'])->name('calendar.details');
    });

    Route::prefix('/bonus_discip')->group(function () {
        Route::get('/',[BonusDiscipController::class,'index'])->name('bonusdiscip.index');

        Route::get('/add',[BonusDiscipController::class,'add'])->name('bonusdiscip.add');

        Route::post('/store',[BonusDiscipController::class,'store'])->name('bonusdiscip.store');

        Route::get('/delete/{id}',[BonusDiscipController::class,'delete'])->name('bonusdiscip.delete');

        Route::get('/edit/{id}',[BonusDiscipController::class,'edit'])->name('bonusdiscip.edit');

        Route::post('/update/{id}',[BonusDiscipController::class,'update'])->name('bonusdiscip.update');
    });
});

