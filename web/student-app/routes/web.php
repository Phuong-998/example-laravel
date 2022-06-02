<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LopController;
use App\Http\Controllers\MonhocController;
use App\Http\Controllers\StudentController;
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


Route::prefix('/admin')->as('admin.')->group(function(){
    Route::get('/lop',[LopController::class,'index'])->name('lop');
    Route::get('/add-lop',[LopController::class,'add'])->name('add-lop');
    Route::post('/hadnelAdd-lop',[LopController::class,'hadnelAdd'])->name('hadnelAdd-lop');
    Route::get('/delete-lop',[LopController::class,'delete'])->name('delete-lop');
    Route::get('/update-lop',[LopController::class,'update'])->name('update-lop');
    Route::post('/hadnel-update',[LopController::class,'hadnelUpdate'])->name('hadnel-update');


    Route::get('/monhoc',[MonhocController::class,'index'])->name('monhoc');
    Route::get('/add-monhoc',[MonhocController::class,'add'])->name('add-monhoc');
    Route::post('/hadnelAdd-monhoc',[MonhocController::class,'hadnelAdd'])->name('hadnelAdd-monhoc');
    Route::get('/update-monhoc',[MonhocController::class,'update'])->name('update-monhoc');
    Route::post('/hadnel-updateMonhoc',[MonhocController::class,'hadnelUpdate'])->name('hadnel-updateMonhoc');
    Route::get('/delete-monhoc',[MonhocController::class,'delete'])->name('delete-monhoc');

    Route::get('/home',[StudentController::class,'index'])->name('sinhvien');
    Route::get('/add-sinhvien',[StudentController::class,'add'])->name('add-sinhvien');
    Route::post('/hadnelAdd-sinhvien',[StudentController::class,'hadnelAdd'])->name('hadnelAdd-sinhvien');
    Route::get('/update-sinhvien',[StudentController::class,'update'])->name('update-sinhvien');
    Route::post('/hadnel-updatesinhvien',[StudentController::class,'hadnelUpdate'])->name('hadnel-updatesinhvien');
    Route::get('/delete-sinhvien',[StudentController::class,'delete'])->name('delete-sinhvien');
});
