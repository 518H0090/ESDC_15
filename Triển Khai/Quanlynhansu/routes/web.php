<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RegencyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentJoinController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\BonusDiscipController;
use App\Http\Controllers\StatistController;
use App\Http\Controllers\LoginController;

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
// 
Route::view('/home', 'home')->name('home')->middleware('LoginMiddle');

Route::prefix('/dangnhap')->group(function () {
    Route::get('/',[LoginController::class,'index'])->name('dangnhap.dangnhap');

    Route::post('/check',[LoginController::class,'check'])->name('dangnhap.check');

    Route::get('/logout',[LoginController::class,'logout'])->name('dangnhap.logout');
});

Route::prefix('/admin')->group(function () {
    Route::prefix('/department')->group(function () {
        //index
        Route::get('/',[DepartmentController::class,'index'])->name('department.index')->middleware('AdminMiddle');

        //add
        Route::get('/add',[DepartmentController::class,'add'])->name('department.add')->middleware('AdminMiddle');

        //store
        Route::post('/store',[DepartmentController::class,'store'])->name('department.store')->middleware('AdminMiddle');

        //edit
        Route::get('/edit/{id}',[DepartmentController::class,'edit'])->name('department.edit')->middleware('AdminMiddle');

        //update
        route::post('/update/{id}',[DepartmentController::class,'update'])->name('department.update')->middleware('AdminMiddle');

        //delete
        Route::get('/delete/{id}',[DepartmentController::class,'delete'])->name('department.delete')->middleware('AdminMiddle');

    });

    Route::prefix('/regency')->group(function () {
        //index
        Route::get('/',[RegencyController::class,'index'])->name('regency.index')->middleware('AdminMiddle');

        //add
        Route::get('/add',[RegencyController::class,'add'])->name('regency.add')->middleware('AdminMiddle');

        //store
        Route::post('/store',[RegencyController::class,'store'])->name('regency.store')->middleware('AdminMiddle');

        //edit
        Route::get('/edit/{id}',[RegencyController::class,'edit'])->name('regency.edit')->middleware('AdminMiddle');

        //update
        route::post('/update/{id}',[RegencyController::class,'update'])->name('regency.update')->middleware('AdminMiddle');

        //delete
        Route::get('/delete/{id}',[RegencyController::class,'delete'])->name('regency.delete')->middleware('AdminMiddle');

    });

    Route::prefix('/employee')->group(function () {
        Route::get('/',[EmployeeController::class,'index'])->name('employee.index')->middleware('AdminMiddle');

        Route::get('/add',[EmployeeController::class,'add'])->name('employee.add')->middleware('AdminMiddle');

        Route::post('/store',[EmployeeController::class,'store'])->name('employee.store')->middleware('AdminMiddle');

        Route::get('/delete/{id}',[EmployeeController::class,'delete'])->name('employee.delete')->middleware('AdminMiddle');

        Route::get('/edit/{id}',[EmployeeController::class,'edit'])->name('employee.edit')->middleware('AdminMiddle');

        Route::post('/update/{id}',[EmployeeController::class,'update'])->name('employee.update')->middleware('AdminMiddle');
    });

    Route::prefix('/departmentjoin')->group(function () {
        Route::get('/',[DepartmentJoinController::class,'index'])->name('departmentjoin.index')->middleware('AdminMiddle');

        Route::get('/add',[DepartmentJoinController::class,'add'])->name('departmentjoin.add')->middleware('AdminMiddle');

        Route::post('/store',[DepartmentJoinController::class,'store'])->name('departmentjoin.store')->middleware('AdminMiddle');

        Route::get('/delete/{id}',[DepartmentJoinController::class,'delete'])->name('departmentjoin.delete')->middleware('AdminMiddle');

        Route::get('/edit/{id}',[DepartmentJoinController::class,'edit'])->name('departmentjoin.edit')->middleware('AdminMiddle');

        Route::post('/update/{id}',[DepartmentJoinController::class,'update'])->name('departmentjoin.update')->middleware('AdminMiddle');
    });

    Route::prefix('/calendar')->group(function () {
        Route::get('/',[CalendarController::class,'index'])->name('calendar.index')->middleware('AdminMiddle');

        Route::get('/add',[CalendarController::class,'add'])->name('calendar.add')->middleware('AdminMiddle');

        Route::post('/store',[CalendarController::class,'store'])->name('calendar.store')->middleware('AdminMiddle');

        Route::get('/delete/{id}',[CalendarController::class,'delete'])->name('calendar.delete')->middleware('AdminMiddle');

        Route::get('/edit/{id}',[CalendarController::class,'edit'])->name('calendar.edit')->middleware('AdminMiddle');

        Route::post('/update/{id}',[CalendarController::class,'update'])->name('calendar.update')->middleware('AdminMiddle');
    });

    Route::prefix('/bonus_discip')->group(function () {
        Route::get('/',[BonusDiscipController::class,'index'])->name('bonusdiscip.index')->middleware('AdminMiddle');

        Route::get('/add',[BonusDiscipController::class,'add'])->name('bonusdiscip.add')->middleware('AdminMiddle');

        Route::post('/store',[BonusDiscipController::class,'store'])->name('bonusdiscip.store')->middleware('AdminMiddle');

        Route::get('/delete/{id}',[BonusDiscipController::class,'delete'])->name('bonusdiscip.delete')->middleware('AdminMiddle');

        Route::get('/edit/{id}',[BonusDiscipController::class,'edit'])->name('bonusdiscip.edit')->middleware('AdminMiddle');

        Route::post('/update/{id}',[BonusDiscipController::class,'update'])->name('bonusdiscip.update')->middleware('AdminMiddle');
    });

    Route::prefix('/statists')->group(function () {
        Route::get('/',[StatistController::class,'index'])->name('statists.index')->middleware('AdminMiddle');

        Route::get('/add',[StatistController::class,'add'])->name('statists.add')->middleware('AdminMiddle');

        Route::post('/store',[StatistController::class,'store'])->name('statists.store')->middleware('AdminMiddle');

        Route::get('/delete/{id}',[StatistController::class,'delete'])->name('statists.delete')->middleware('AdminMiddle');

        Route::get('/statist/{id}/{employee_id}/{year}/{month}',[StatistController::class,'statist'])->name('statists.statist')->middleware('AdminMiddle');

        Route::post('/resultstatist/{id}',[StatistController::class,'resultstatist'])->name('statists.resultstatist')->middleware('AdminMiddle');
    });

    Route::prefix('/user')->group(function () {
        
    });
});

