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
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SentFormController;

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
// Route::view('/home', 'home')->name('home')->middleware('LoginMiddle');

Route::get('/home',[HomeController::class,'index'])->name('home')->middleware('LoginMiddle');

Route::prefix('/dangnhap')->group(function () {
    Route::get('/',[LoginController::class,'index'])->name('dangnhap.dangnhap');

    Route::post('/check',[LoginController::class,'check'])->name('dangnhap.check');

    Route::get('/logout',[LoginController::class,'logout'])->name('dangnhap.logout');
});

Route::prefix('/All')->group(function () {
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
        Route::get('/',[EmployeeController::class,'index'])->name('employee.index')->middleware('ManageMiddle');

        Route::get('/add',[EmployeeController::class,'add'])->name('employee.add')->middleware('ManageMiddle');

        Route::post('/store',[EmployeeController::class,'store'])->name('employee.store')->middleware('ManageMiddle');

        Route::get('/delete/{id}',[EmployeeController::class,'delete'])->name('employee.delete')->middleware('ManageMiddle');

        Route::get('/edit/{id}',[EmployeeController::class,'edit'])->name('employee.edit')->middleware('ManageMiddle');

        Route::post('/update/{id}',[EmployeeController::class,'update'])->name('employee.update')->middleware('ManageMiddle');
    });

    Route::prefix('/departmentjoin')->group(function () {
        Route::get('/',[DepartmentJoinController::class,'index'])->name('departmentjoin.index')->middleware('LoginMiddle');

        Route::get('/add',[DepartmentJoinController::class,'add'])->name('departmentjoin.add')->middleware('ManageMiddle');

        Route::post('/store',[DepartmentJoinController::class,'store'])->name('departmentjoin.store')->middleware('ManageMiddle');

        Route::get('/delete/{id}',[DepartmentJoinController::class,'delete'])->name('departmentjoin.delete')->middleware('ManageMiddle');

        Route::get('/edit/{id}',[DepartmentJoinController::class,'edit'])->name('departmentjoin.edit')->middleware('ManageMiddle');

        Route::post('/update/{id}',[DepartmentJoinController::class,'update'])->name('departmentjoin.update')->middleware('ManageMiddle');
    });

    Route::prefix('/calendar')->group(function () {
        Route::get('/',[CalendarController::class,'index'])->name('calendar.index')->middleware('LoginMiddle');

        Route::get('/add',[CalendarController::class,'add'])->name('calendar.add')->middleware('ManageMiddle');

        Route::post('/store',[CalendarController::class,'store'])->name('calendar.store')->middleware('ManageMiddle');

        Route::get('/delete/{id}',[CalendarController::class,'delete'])->name('calendar.delete')->middleware('ManageMiddle');

        Route::get('/edit/{id}',[CalendarController::class,'edit'])->name('calendar.edit')->middleware('ManageMiddle');

        Route::post('/update/{id}',[CalendarController::class,'update'])->name('calendar.update')->middleware('ManageMiddle');
    });

    Route::prefix('/bonus_discip')->group(function () {
        Route::get('/',[BonusDiscipController::class,'index'])->name('bonusdiscip.index')->middleware('LoginMiddle');

        Route::get('/add',[BonusDiscipController::class,'add'])->name('bonusdiscip.add')->middleware('ManageMiddle');

        Route::post('/store',[BonusDiscipController::class,'store'])->name('bonusdiscip.store')->middleware('ManageMiddle');

        Route::get('/delete/{id}',[BonusDiscipController::class,'delete'])->name('bonusdiscip.delete')->middleware('ManageMiddle');

        Route::get('/edit/{id}',[BonusDiscipController::class,'edit'])->name('bonusdiscip.edit')->middleware('ManageMiddle');

        Route::post('/update/{id}',[BonusDiscipController::class,'update'])->name('bonusdiscip.update')->middleware('ManageMiddle');
    });

    Route::prefix('/statists')->group(function () {
        Route::get('/',[StatistController::class,'index'])->name('statists.index')->middleware('LoginMiddle');

        Route::get('/add',[StatistController::class,'add'])->name('statists.add')->middleware('ManageMiddle');

        Route::post('/store',[StatistController::class,'store'])->name('statists.store')->middleware('ManageMiddle');

        Route::get('/delete/{id}',[StatistController::class,'delete'])->name('statists.delete')->middleware('ManageMiddle');

        Route::get('/statist/{id}/{employee_id}/{year}/{month}',[StatistController::class,'statist'])->name('statists.statist')->middleware('ManageMiddle');

        Route::post('/resultstatist/{id}',[StatistController::class,'resultstatist'])->name('statists.resultstatist')->middleware('ManageMiddle');
    });

    Route::prefix('/user')->group(function () {
        Route::get('/',[UserController::class,'index'])->name('user.index')->middleware('AdminMiddle');

        Route::get('/add',[UserController::class,'add'])->name('user.add')->middleware('AdminMiddle');

        Route::post('/store',[UserController::class,'store'])->name('user.store')->middleware('AdminMiddle');

        Route::get('/delete/{id}',[UserController::class,'delete'])->name('user.delete')->middleware('AdminMiddle');

        Route::get('/edit/{id}',[UserController::class,'edit'])->name('user.edit')->middleware('AdminMiddle');

        Route::post('/update/{id}',[UserController::class,'update'])->name('user.update')->middleware('AdminMiddle');

        Route::get('/editpassword/{id}',[UserController::class,'editpassword'])->name('user.editpassword')->middleware('AdminMiddle');

        Route::post('/updatepassword/{id}',[UserController::class,'updatepassword'])->name('user.updatepassword')->middleware('AdminMiddle');
    });

    //đang làm chưa thêm vào form
    Route::prefix('/sentform')->group(function () {
        Route::get('/',[SentFormController::class,'index'])->name('sentform.index')->middleware('LoginMiddle');

        Route::get('/add',[SentFormController::class,'add'])->name('sentform.add')->middleware('LoginMiddle');

        Route::post('/store',[SentFormController::class,'store'])->name('sentform.store')->middleware('LoginMiddle');

        Route::get('/delete/{id}',[SentFormController::class,'delete'])->name('sentform.delete')->middleware('LoginMiddle');

        Route::get('/edit/{id}',[SentFormController::class,'edit'])->name('sentform.edit')->middleware('LoginMiddle');

        Route::post('/update/{id}',[SentFormController::class,'update'])->name('sentform.update')->middleware('LoginMiddle');

        Route::get('/confirm/{id}',[SentFormController::class,'confirm'])->name('sentform.cofirm')->middleware('ManageMiddle');

        Route::post('/verify/{id}',[SentFormController::class,'verify'])->name('sentform.verify')->middleware('ManageMiddle');
    });
});

