<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChucvuController;

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

Route::group(['prefix' => '/admin'], function () {
    Route::group(['prefix' => '/home'], function () {
        //điều hướng sang trang home
       Route::view('/', 'home')->name('HomePage');
    });

    Route::group(['prefix' => '/chucvu'], function () {
        
        //danh sách
        //điều hướng sang chức vụ 
       Route::get('/', [ChucvuController::class,'index'])->name('chucvu.index');


       //thêm
       //điều hướng sang trang thêm chức vụ mới
        Route::get('/add', [ChucvuController::class,'add'])->name('chucvu.add');
       //thực hiện việc thêm chức vụ
       Route::post('/store',[ChucvuController::class,'store'])->name('chucvu.store');

        //sửa
         //điều hướng sang sửa chức vụ
         Route::get('/edit/{id}', [ChucvuController::class,'edit'])->name('chucvu.edit');
         //thực hiện lưu thay đổi 
        Route::post('/update/{id}', [ChucvuController::class,'update'])->name('chucvu.update');

        //xóa
         //thực hiện xóa chực vụ
         Route::get('/delete/{id}',[ChucvuController::class,'delete'])->name('chucvu.delete');
    });

});