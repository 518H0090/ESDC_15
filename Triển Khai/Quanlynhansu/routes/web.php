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
use App\Http\Controllers\RestoreController;
use App\Http\Middleware\LoginMiddle;
use App\Http\Middleware\ManageMiddle;
use App\Http\Controllers\AnnouncementController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//
// Route::view('/home', 'home')->name('home')->middleware('LoginMiddle');

Route::get('/',[HomeController::class,'index'])->name('home')->middleware('LoginMiddle');

//read Announcement
Route::get('/read/{id}',[AnnouncementController::class,'read'])->name('announcement.read')->middleware('LoginMiddle');

Route::prefix('/dangnhap')->group(function () {
    Route::get('/',[LoginController::class,'index'])->name('dangnhap.dangnhap');

    Route::post('/check',[LoginController::class,'check'])->name('dangnhap.check');

    Route::get('/logout',[LoginController::class,'logout'])->name('dangnhap.logout');
});

Route::prefix('/All')->group(function () {
    Route::prefix('/department')->group(function () {

        Route::middleware(['Login', 'AdminMiddle'])->group(function () {
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

    });

    Route::prefix('/regency')->group(function () {

        Route::middleware(['Login', 'AdminMiddle'])->group(function () {
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

    });

    Route::prefix('/employee')->group(function () {

        Route::middleware(['Login', 'ManageMiddle'])->group(function () {
            Route::get('/',[EmployeeController::class,'index'])->name('employee.index');

            Route::get('/add',[EmployeeController::class,'add'])->name('employee.add');

            Route::post('/store',[EmployeeController::class,'store'])->name('employee.store');

            Route::get('/delete/{id}',[EmployeeController::class,'delete'])->name('employee.delete');

            Route::get('/edit/{id}',[EmployeeController::class,'edit'])->name('employee.edit');

            Route::post('/update/{id}',[EmployeeController::class,'update'])->name('employee.update');

        });

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

        Route::middleware(['Login', 'ManageMiddle'])->group(function () {
            Route::get('/add',[CalendarController::class,'add'])->name('calendar.add');

            Route::post('/store',[CalendarController::class,'store'])->name('calendar.store');

            Route::get('/delete/{id}',[CalendarController::class,'delete'])->name('calendar.delete');

            Route::get('/edit/{id}',[CalendarController::class,'edit'])->name('calendar.edit');

            Route::post('/update/{id}',[CalendarController::class,'update'])->name('calendar.update');

        });

    });

    Route::prefix('/bonus_discip')->group(function () {
        Route::get('/',[BonusDiscipController::class,'index'])->name('bonusdiscip.index')->middleware('LoginMiddle');

        Route::middleware(['Login', 'ManageMiddle'])->group(function () {
            Route::get('/add',[BonusDiscipController::class,'add'])->name('bonusdiscip.add');

            Route::post('/store',[BonusDiscipController::class,'store'])->name('bonusdiscip.store');

            Route::get('/delete/{id}',[BonusDiscipController::class,'delete'])->name('bonusdiscip.delete');

            Route::get('/edit/{id}',[BonusDiscipController::class,'edit'])->name('bonusdiscip.edit');

            Route::post('/update/{id}',[BonusDiscipController::class,'update'])->name('bonusdiscip.update');

        });

    });

    Route::prefix('/statists')->group(function () {
        Route::get('/',[StatistController::class,'index'])->name('statists.index')->middleware('LoginMiddle');

        Route::middleware(['Login', 'ManageMiddle'])->group(function () {
            Route::get('/add',[StatistController::class,'add'])->name('statists.add');

            Route::post('/store',[StatistController::class,'store'])->name('statists.store');

            Route::get('/delete/{id}',[StatistController::class,'delete'])->name('statists.delete');

            Route::get('/statist/{id}/{employee_id}/{year}/{month}',[StatistController::class,'statist'])->name('statists.statist');

            Route::post('/resultstatist/{id}',[StatistController::class,'resultstatist'])->name('statists.resultstatist');

        });

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


    Route::prefix('/restore')->group(function () {
        Route::get('/',[RestoreController::class,'index'])->name('restore.index')->middleware('ManageMiddle');


        Route::middleware(['Login','ManageMiddle'])->group(function () {

            //Employee
            Route::prefix('/EmployeeRestore')->group(function () {

                Route::get('/restoreEmployee',[RestoreController::class,'restoreEmployee'])->name('restore.restoreEmployee');

                Route::get('/restoreEmployeeAction/{id}',[RestoreController::class,'restoreEmployeeAction'])->name('restore.restoreEmployeeAction');
                Route::get('/restoreEmployeeAll',[RestoreController::class,'restoreEmployeeAll'])->name('restore.restoreEmployeeAll');

                Route::get('/deleteEmployeeAction/{id}',[RestoreController::class,'deleteEmployeeAction'])->name('restore.deleteEmployeeAction');
                Route::get('/deleteEmployeeAll',[RestoreController::class,'deleteEmployeeAll'])->name('restore.deleteEmployeeAll');

            });
            //Rengency
            Route::prefix('/RegencyRestore')->group(function () {

                Route::get('/restoreRegency',[RestoreController::class,'restoreRegency'])->name('restore.restoreRegency')->middleware('ManageMiddle');

                Route::get('/restoreRegencyAction/{id}',[RestoreController::class,'restoreRegencyAction'])->name('restore.restoreRegencyAction')->middleware('ManageMiddle');
                Route::get('/restoreRegencyAll',[RestoreController::class,'restoreRegencyAll'])->name('restore.restoreRegencyAll')->middleware('ManageMiddle');

                Route::get('/deleteRegencyAction/{id}',[RestoreController::class,'deleteRegencyAction'])->name('restore.deleteRegencyAction')->middleware('ManageMiddle');
                Route::get('/deleteRegencyAll',[RestoreController::class,'deleteRegencyAll'])->name('restore.deleteRegencyAll')->middleware('ManageMiddle');

            });

            //calendar
            Route::prefix('/calendarRestore')->group(function () {
                Route::get('/restoreCalendar',[RestoreController::class,'restoreCalendar'])->name('restore.restoreCalendar');

                Route::get('/restoreCalendarAction/{id}',[RestoreController::class,'restoreCalendarAction'])->name('restore.restoreCalendarAction');
                Route::get('/restoreCalendarAll',[RestoreController::class,'restoreCalendarAll'])->name('restore.restoreCalendarAll');

                Route::get('/deleteCalendarAction/{id}',[RestoreController::class,'deleteCalendarAction'])->name('restore.deleteCalendarAction');
                Route::get('/deleteCalendarAll',[RestoreController::class,'deleteCalendarAll'])->name('restore.deleteCalendarAll');
            });

            //sentform
            Route::prefix('/sentformRestore')->group(function () {
                Route::get('/restoreFormRestore',[RestoreController::class,'restoreFormRestore'])->name('restore.restoreFormRestore');

                Route::get('/restoreSentFormAction/{id}',[RestoreController::class,'restoreSentFormAction'])->name('restore.restoreSentFormAction');
                Route::get('/restoreSentFormAll',[RestoreController::class,'restoreSentFormAll'])->name('restore.restoreSentFormAll');

                Route::get('/deleteSentFormAction/{id}',[RestoreController::class,'deleteSentFormAction'])->name('restore.deleteSentFormAction');
                Route::get('/deleteSentFormAll',[RestoreController::class,'deleteSentFormAll'])->name('restore.deleteSentFormAll');

            });

            //Bonus Discip
            Route::prefix('/bonusdiscip')->group(function () {
                Route::get('/restoreBonusDiscipRestore',[RestoreController::class,'restoreBonusDiscipRestore'])->name('restore.restoreBonusDiscipRestore');

                Route::get('/restoreBonusDiscipAction/{id}',[RestoreController::class,'restoreBonusDiscipAction'])->name('restore.restoreBonusDiscipAction');
                Route::get('/restoreBonusDiscipAll',[RestoreController::class,'restoreBonusDiscipAll'])->name('restore.restoreBonusDiscipAll');

                Route::get('/deleteBonusDiscipAction/{id}',[RestoreController::class,'deleteBonusDiscipAction'])->name('restore.deleteBonusDiscipAction');
                Route::get('/deleteBonusDiscipAll',[RestoreController::class,'deleteBonusDiscipAll'])->name('restore.deleteBonusDiscipAll');

            });

            //Salary
            Route::prefix('/salary')->group(function () {
                Route::get('/restoreSalaryRestore',[RestoreController::class,'restoreSalaryRestore'])->name('restore.restoreSalaryRestore');

                Route::get('/restoreSalaryAction/{id}',[RestoreController::class,'restoreSalaryAction'])->name('restore.restoreSalaryAction');
                Route::get('/restoreSalaryAll',[RestoreController::class,'restoreSalaryAll'])->name('restore.restoreSalaryAll');

                Route::get('/deleteSalaryAction/{id}',[RestoreController::class,'deleteSalaryAction'])->name('restore.deleteSalaryAction');
                Route::get('/deleteSalaryAll',[RestoreController::class,'deleteSalaryAll'])->name('restore.deleteSalaryAll');

            });

            //User
            Route::prefix('/user')->group(function () {
                Route::get('/restoreUserRestore',[RestoreController::class,'restoreUserRestore'])->name('restore.restoreUserRestore');

                Route::get('/restoreUSerAction/{id}',[RestoreController::class,'restoreUSerAction'])->name('restore.restoreUSerAction');
                Route::get('/restoreUserAll',[RestoreController::class,'restoreUserAll'])->name('restore.restoreUserAll');

                Route::get('/deleteUserAction/{id}',[RestoreController::class,'deleteUserAction'])->name('restore.deleteUserAction');
                Route::get('/deleteUserAll',[RestoreController::class,'deleteUserAll'])->name('restore.deleteUserAll');

            });
        });
    });

    Route::prefix('/announcement')->group(function () {
        Route::middleware(['Login', 'ManageMiddle'])->group(function () {
            //index
            Route::get('/',[AnnouncementController::class,'index'])->name('announcement.index');

            //add
            Route::get('/add',[AnnouncementController::class,'add'])->name('announcement.add');
            //store
            Route::post('/store',[AnnouncementController::class,'store'])->name('announcement.store');

            //delete
            Route::get('/delete/{id}',[AnnouncementController::class,'delete'])->name('announcement.delete');

            //edit
            Route::get('/edit/{id}',[AnnouncementController::class,'edit'])->name('announcement.edit');
            //update
            Route::post('/update/{id}',[AnnouncementController::class,'update'])->name('announcement.update');
        });
    });
});

